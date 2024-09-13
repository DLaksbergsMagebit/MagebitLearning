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

/**
 * Class DateGrid for formatting date columns in the grid
 *
 * @package Magebit\Faq\Ui\Component\Listing\Column
 */
class DateGrid extends Column
{
    private const DATE_FORMAT = "M d, Y h:i:s A";
    private const EMPTY_DATE = '0000-00-00 00:00:00';

    /**
     * Constructor
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param array $components
     * @param array $data
     */
    public function __construct(
        protected              $context,
        UiComponentFactory     $uiComponentFactory,
        protected              $components = [],
        private readonly array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare and format the data source for date columns.
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource): array
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item[$this->getData('name')])) {
                    $dateValue = $item[$this->getData('name')];
                    if (!empty($dateValue) && $dateValue !== self::EMPTY_DATE) {
                        $item[$this->getData('name')] = date(self::DATE_FORMAT, strtotime($dateValue));
                    }
                }
            }
        }

        return $dataSource;
    }
}
