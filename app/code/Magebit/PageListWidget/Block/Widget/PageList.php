<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\PageListWidget\Block\Widget;

use Magento\Cms\Model\ResourceModel\Page\CollectionFactory as PageCollectionFactory;
use Magento\Cms\Model\Page;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

/**
 * This class is a widget block that retrieves and displays a list of CMS pages.
 */
class PageList extends Template implements BlockInterface
{
    /**
     * @var string
     */
    protected $_template = "widget/page_list.phtml";

    /**
     * @param Template\Context $context
     * @param PageCollectionFactory $pageCollectionFactory
     * @param array $data
     */
    public function __construct(
        private readonly Template\Context $context,
        private readonly PageCollectionFactory $pageCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * Retrieve CMS pages based on the display mode.
     *
     * @return Page[] Array of CMS page models.
     */
    public function getPages(): array
    {
        $displayMode = $this->getData('display_mode');

        if ($displayMode === 'specific_page') {
            return $this->getSpecificPages();
        }

        return $this->getAllPages();
    }

    /**
     * Retrieve specific CMS pages.
     *
     * @return Page[] Array of CMS page models.
     */
    private function getSpecificPages(): array
    {
        $selectedPagesValue = $this->getData('selected_page');
        $selectedPages= is_array($selectedPagesValue) ? $selectedPagesValue : explode(',', $selectedPagesValue);
        $selectedPagesArray= array_filter(array_map('trim', $selectedPages));


        $collection = $this->pageCollectionFactory->create()
            ->addFieldToSelect(['title', 'identifier', 'content'])
            ->addFieldToFilter('identifier', ['in' => $selectedPagesArray])
            ->addFieldToFilter('is_active', 1)
            ->setOrder('title', 'ASC');

        return $collection->getItems();
    }

    /**
     * This method returns an array of all active CMS pages
     *
     * @return Page[] Array of CMS page models.
     */
    public function getAllPages(): array
    {
        $collection = $this->pageCollectionFactory->create()
            ->addFieldToSelect(['title', 'identifier', 'content'])
            ->addFieldToFilter('is_active', 1)
            ->setOrder('title', 'ASC');

        return $collection->getItems();
    }
}
