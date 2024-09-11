<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd.
 * @author    Magebit
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magebit\Faq\Model\ResourceModel\Question\CollectionFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * Class Index controller for displaying the FAQ page in the frontend.
 *
 * @package Magebit\Faq\Controller\Index
 */
class Index extends Action
{
    /**
     * @var PageFactory
     */
    protected PageFactory $resultPageFactory;

    /**
     * @var CollectionFactory
     */
    protected CollectionFactory $questionCollectionFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param CollectionFactory $questionCollectionFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        CollectionFactory $questionCollectionFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->questionCollectionFactory = $questionCollectionFactory;
        parent::__construct($context);
    }

    /**
     * Execute the action for rendering the FAQ page.
     *
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Frequently Asked Questions'));
        return $resultPage;
    }
}
