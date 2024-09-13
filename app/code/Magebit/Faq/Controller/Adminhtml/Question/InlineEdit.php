<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magebit\Faq\Controller\Adminhtml\QuestionController as QuestionController;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class InlineEdit processes inline edit requests for FAQ questions in the admin panel.
 *
 * @package Magebit\Faq\Controller\Adminhtml\Question
 */
class InlineEdit extends QuestionController
{
    /**
     * Execute the action for inline editing of FAQ questions.
     *
     * @return Json
     */
    public function execute(): Json
    {
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];
        if ($this->getRequest()->getParam('isAjax')) {
            $postItems = $this->getRequest()->getParam('items', []);
            if (!count($postItems)) {
                $messages[] = __('No data sent!');
                $error = true;
            } else {
                foreach (array_keys($postItems) as $entityId) {
                    try {
                        $question = $this->questionRepository->get($entityId);
                        $question->setData(array_merge($question->getData(), $postItems[$entityId]));
                        $this->questionRepository->save($question);
                    } catch (NoSuchEntityException | LocalizedException $e) {
                        $messages[] = __('Error editing data for entity ID %1: %2', $entityId, $e->getMessage());
                        $error = true;
                    } catch (\Exception $e) {
                        $messages[] = __('Unknown error occurred while editing entity ID %1: %2', $entityId, $e->getMessage());
                        $error = true;
                    }
                }
            }
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error'    => $error
        ]);
    }
}
