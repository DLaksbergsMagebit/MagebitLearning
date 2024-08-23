<?php

namespace MageMastery\PageListWidget\Block\Widget;

use Magento\Cms\Model\ResourceModel\Page\Collection as PageCollection;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class PageList extends Template implements BlockInterface
{
    protected $_template = "widget/page_list.phtml";

}
