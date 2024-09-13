<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magebit\Faq\Controller\Adminhtml\QuestionController;
use Magento\Framework\View\Result\Page;


/**
 * Class Index displays the list of FAQ questions in the admin panel.
 *
 * @package Magebit\Faq\Controller\Adminhtml\Question
 */
class Index extends QuestionController
{
    /**
     * Execute the action to display the list of FAQ questions.
     */
    public function execute(): Page
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu(self::ACTIVE_MENU);
        $resultPage->addBreadcrumb(__(self::BREADCRUMB_PARENT), __('Index'));
        $resultPage->getConfig()->getTitle()->prepend(__(self::BREADCRUMB_PARENT));

        return $resultPage;
    }
}
