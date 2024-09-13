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
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Controller\ResultInterface;


/**
 * Class Save controller to handle saving FAQ questions in the admin panel.
 * @package Magebit\Faq\Controller\Adminhtml\Question
 */
class Save extends QuestionController
{
    /**
     * Execute the action to save a FAQ question.
     *
     * @return ResultInterface
     */
    public function execute():ResultInterface
    {
        $params = $this->getRequest()->getParams();
        $question = $this->questionFactory->create()->setData($params);

        try {
            $newQuestion = $this->questionRepository->save($question);
            if (isset($params['back']) && $params['back'] === 'continue') {
                return $this->resultRedirectFactory
                    ->create()->setPath('magebit_faq/question/edit', [self::ID_PARAM => $newQuestion->getId()]);
            } else {
                return $this->resultRedirectFactory
                    ->create()->setPath('magebit_faq/question/index');
            }

        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (Exception) {
            $this->messageManager->addErrorMessage(__('An error occurred while saving the question.'));
        }

        return $this->resultRedirectFactory->create()->setPath('magebit_faq/question/edit', [self::ID_PARAM => $question->getId()]);
    }
}
