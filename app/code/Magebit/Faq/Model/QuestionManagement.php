<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Model;

use Exception;
use Magebit\Faq\Api\QuestionManagementInterface;
use Magebit\Faq\Api\QuestionRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;

class QuestionManagement implements QuestionManagementInterface
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;


    public function __construct(
        private readonly QuestionRepositoryInterface $questionRepository,
        private readonly LoggerInterface             $logger
    ) {
    }

    /**
     * Changes the status of the question.
     *
     * @param int $id
     * @param int $status
     * @return bool
     */
    public function changeStatus(int $id, int $status): bool
    {
        try {
            $object = $this->questionRepository->get($id);

            if (!$object->getId()) {
                throw new NoSuchEntityException(__('Object with id "%1" does not exist.', $id));
            }

            $object->setStatus($status);
            $this->questionRepository->save($object);
            return true;
        } catch (NoSuchEntityException $e) {
            $this->logger->error(__('Error changing status: %1', $e->getMessage()));
        } catch (CouldNotSaveException $e) {
            $this->logger->error(__('Could not save question with ID %1: %2', $id, $e->getMessage()));
        } catch (Exception $e) {
            $this->logger->error(__('An unexpected error occurred: %1', $e->getMessage()));
        }

        return false;
    }

    /**
     * Enables the question.
     *
     * @param int $id
     * @return bool
     */
    public function enableQuestion(int $id): bool
    {
        return $this->changeStatus($id, self::STATUS_ENABLED);
    }

    /**
     * Disables the question.
     *
     * @param int $id
     * @return bool
     */
    public function disableQuestion(int $id): bool
    {
        return $this->changeStatus($id, self::STATUS_DISABLED);
    }
}
