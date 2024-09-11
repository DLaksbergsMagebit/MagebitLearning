<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magebit\Faq\Controller\Adminhtml\QuestionController;
use Magento\Framework\Exception\LocalizedException;

/**
 * Class MassDelete controller to handle the mass deletion of FAQ questions in the admin panel.
 *
 * @package Magebit\Faq\Controller\Adminhtml\Question
 */
class MassDelete extends QuestionController
{
    /**
     * Execute the action for mass deletion of FAQ questions.
     */
    public function execute()
    {
        try {
            $collection = $this->filter->getCollection($this->collectionFactory->create());
            $deletedCount = 0;
            foreach ($collection as $question) {
                $this->questionRepository->deleteById((int)$question->getId());
                $deletedCount++;
            }
            if ($deletedCount) {
                $this->messageManager->addSuccessMessage(
                    __('A total of %1 record(s) have been deleted.', $deletedCount)
                );
            }
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('There was an error while deleting the record(s).'));
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setUrl($this->_redirect->getRefererUrl());
    }
}
