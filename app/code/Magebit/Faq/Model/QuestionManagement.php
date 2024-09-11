<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Model;

use Magebit\Faq\Api\QuestionManagementInterface;
use Magebit\Faq\Api\QuestionRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class QuestionManagement implements QuestionManagementInterface
{
    const int STATUS_ENABLED = 1;
    const int STATUS_DISABLED = 0;
    protected QuestionRepositoryInterface $questionRepository;

    public function __construct(QuestionRepositoryInterface $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    /**
     * Changes the status of the question
     *
     * @throws NoSuchEntityException
     */
    public function changeStatus(int $id, int $status): void
    {
        $object = $this->questionRepository->get($id);

        if (!$object->getId()) {
            throw new NoSuchEntityException(__('Object with id "%1" does not exist.', $id));
        }

        $object->setStatus($status);
        $this->questionRepository->save($object);
    }

    /**
     * Enables the question
     *
     * @throws NoSuchEntityException
     */
    public function enableQuestion( $id): bool
    {
        $this->changeStatus($id, self::STATUS_ENABLED);
        return true;
    }

    /**
     * Disables the question
     *
     * @throws NoSuchEntityException
     */
    public function disableQuestion( $id): bool
    {
        $this->changeStatus($id, self::STATUS_DISABLED);
        return true;
    }
}
