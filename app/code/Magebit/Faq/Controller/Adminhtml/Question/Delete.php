<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magebit\Faq\Controller\Adminhtml\QuestionController as QuestionController;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Controller\ResultInterface;

/**
 * Class Delete deletes questions
 *
 * @package Magebit\Faq\Controller\Adminhtml\Question
 */
class Delete extends QuestionController
{
    /**
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $questionId = $this->getRequest()->getParam(self::ID_PARAM);

        if ($questionId) {
            try {
                $this->questionRepository->deleteById((int) $questionId);
                $this->messageManager->addSuccessMessage(__('The question has been deleted.'));
            } catch (NoSuchEntityException $e) {
                $this->messageManager->addErrorMessage(__('The question no longer exists.'));
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('An error occurred while trying to delete the question.'));
            }
        } else {
            $this->messageManager->addErrorMessage(__('We can\'t find a question to delete.'));
        }

        return $resultRedirect->setPath('magebit_faq/question/index');
    }
}
