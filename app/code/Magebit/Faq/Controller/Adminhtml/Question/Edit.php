<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magebit\Faq\Controller\Adminhtml\QuestionController;
use Magento\Framework\Controller\ResultInterface;

/**
 * Class Edit controller for editing FAQ questions in the admin panel.
 *
 * @package Magebit\Faq\Controller\Adminhtml\Question
 */
class Edit extends QuestionController
{
    /**
     * Execute the action for editing a FAQ question.
     *
     * @return ResultInterface
     */
    public function execute():ResultInterface
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu(self::ACTIVE_MENU);
        $resultPage->addBreadcrumb(__(self::BREADCRUMB_PARENT), __('Edit'));
        $resultPage->getConfig()->getTitle()->prepend(__(self::PAGE_TITLE));

        return $resultPage;
    }
}
