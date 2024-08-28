<?php

namespace Magebit\PageListWidget\Block\Widget;

use Magento\Cms\Model\ResourceModel\Page as PageResource;
use Magento\Cms\Model\PageFactory;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

/**
 * This class is a widget block that retrieves and displays a list of CMS pages.
 * @package Magebit\PageListWidget\Block\Widget
 */
class PageList extends Template implements BlockInterface
{
    /**
     * @var string
     */
    protected $_template = "widget/page_list.phtml";

    /**
     * @var PageResource
     */
    protected $pageResource;

    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * PageList constructor.
     * @param Template\Context $context The context of the template.
     * @param PageResource $pageResource The resource model for CMS pages.
     * @param PageFactory $pageFactory The factory for creating CMS page instances.
     * @param array $data Additional data.
     */
    public function __construct(
        Template\Context $context,
        PageResource $pageResource,
        PageFactory $pageFactory,
        array $data = []
    ) {
        $this->pageResource = $pageResource;
        $this->pageFactory = $pageFactory;
        parent::__construct($context, $data);
    }

    /**
     * Retrieve all active CMS pages.
     * This method returns an array of all active CMS pages, ordered by title.
     * @return \Magento\Cms\Model\Page[] Array of CMS page models.
     */
    public function getAllPages()
    {
        $pages = [];
        $connection = $this->pageResource->getConnection();
        $select = $connection->select()
            ->from($this->pageResource->getTable('cms_page'))
            ->where('is_active = ?', 1)
            ->order('title ASC');

        $result = $connection->fetchAll($select);
        foreach ($result as $row) {
            $page = $this->pageFactory->create();
            $page->setData($row);
            $pages[] = $page;
        }

        return $pages;
    }

    /**
     * Retrieve a CMS page by its URL key.
     * @param string $urlKey The URL key of the CMS page.
     * @return \Magento\Cms\Model\Page|null The CMS page model, or null if not found.
     */
    public function getPageByUrlKey($urlKey)
    {
        $page = null;
        $connection = $this->pageResource->getConnection();
        $select = $connection->select()
            ->from($this->pageResource->getTable('cms_page'))
            ->where('identifier = ?', $urlKey)
            ->where('is_active = ?', 1); // Ensure the page is active

        $result = $connection->fetchRow($select);
        if ($result) {
            $page = $this->pageFactory->create();
            $page->setData($result);
        }

        return $page;
    }
}
