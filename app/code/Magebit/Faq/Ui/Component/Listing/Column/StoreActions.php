<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

/**
 * Class StoreActions adds action buttons (Edit/Delete) to each question
 *
 * @package Magebit\Faq\Ui\Component\Listing\Column
 */
class StoreActions extends Column
{
    /**
     * Constant for id field
     */
    const ID_FIELD = 'id';

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlInterface
     * @param array $components
     * @param array $data
     */
    public function __construct(
        protected                     $context,
        UiComponentFactory            $uiComponentFactory,
        private readonly UrlInterface $urlInterface,
        protected                     $components = [],
        private readonly array        $data = []
    )
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->_urlInterface = $urlInterface;
    }

    /**
     * Adds Edit and Delete action buttons
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource): array
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {

                $name = $this->getData('name');

                if (isset($item[self::ID_FIELD])) {
                    $item[$name]['view'] = [
                        'href' => $this->_urlInterface->getUrl('magebit_faq/question/edit',
                            [self::ID_FIELD => $item[self::ID_FIELD]]),
                        'label' => __('Edit')
                    ];
                    $item[$name]['delete'] = [
                        'href' => $this->_urlInterface->getUrl('magebit_faq/question/delete',
                            [self::ID_FIELD => $item[self::ID_FIELD]]),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete question ' . $item[self::ID_FIELD]),
                            'message' => __('Are you sure?')
                        ]
                    ];
                }
            }
        }

        return $dataSource;
    }
}
