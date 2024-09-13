<?php
/**
 * Create a new FAQ question in the admin panel.
 *
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magebit\Faq\Controller\Adminhtml\QuestionController;
use Magento\Framework\Controller\ResultInterface;

/**
 * Controller for creating a new FAQ question.
 *
 * @package Magebit\Faq\Controller\Adminhtml\Question
 */
class Create extends QuestionController
{
    /**
     * Execute the action to create a new FAQ question.
     *
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu(self::ACTIVE_MENU);
        $resultPage->addBreadcrumb(__(self::BREADCRUMB_PARENT), __('New Question'));
        $resultPage->getConfig()->getTitle()->prepend(__(self::PAGE_TITLE));

        return $resultPage;
    }
}
