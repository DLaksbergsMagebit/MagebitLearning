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
    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }
    /**
     * Prepare and format the data source for date columns.
     *
     * @param array $dataSource The data source array.
     * @return array The modified data source with formatted dates.
     */
    public function prepareDataSource(array $dataSource): array
    {
        $dateFormat = "M d, Y h:i:s A";

        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item[$this->getData('name')])) {
                    $dateValue = $item[$this->getData('name')];
                    if (!empty($dateValue) && $dateValue !== '0000-00-00 00:00:00') {
                        $item[$this->getData('name')] = date($dateFormat, strtotime($dateValue));
                    }
                }
            }
        }
        return $dataSource;
    }
}
