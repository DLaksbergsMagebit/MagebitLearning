<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Exception;
use Magebit\Faq\Controller\Adminhtml\QuestionController;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;

/**
 * Class MassEnable controller for mass enabling FAQ questions in the admin panel.
 *
 * @package Magebit\Faq\Controller\Adminhtml\Question
 */
class MassEnable extends QuestionController
{
    /**
     * Execute the action for mass enabling of FAQ questions.
     *
     * @return ResultInterface
     */
    public function execute():ResultInterface
    {
        try {
            $collection = $this->filter->getCollection($this->collectionFactory->create());
            $enabledCount = 0;
            foreach ($collection as $item) {
                $this->questionManager->enableQuestion($item->getId());
                $enabledCount++;
            }
            if ($enabledCount > 0) {
                $this->messageManager->addSuccessMessage(__('%1 question(s) enabled successfully.', $enabledCount));
            }
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (Exception) {
            $this->messageManager->addErrorMessage(__('There was an error while attempting to enable the question(s).'));
        }
        $resultRedirect = $this->resultRedirectFactory->create();

        return $resultRedirect->setUrl($this->_redirect->getRefererUrl());
    }
}
