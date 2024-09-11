<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magebit\Faq\Controller\Adminhtml\QuestionController;

/**
 * Class Create creates a new FAQ question in the admin panel.
 *
 * @package Magebit\Faq\Controller\Adminhtml\Question
 */
class Create extends QuestionController
{
    /**
     * Execute the action to create a new FAQ question.
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu(self::ACTIVE_MENU);
        $resultPage->addBreadcrumb(__(self::BREADCRUMB_PARENT), __('New'));
        $resultPage->getConfig()->getTitle()->prepend(__(self::PAGE_TITLE));

        return $resultPage;
    }
}
