<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Api;

use Magebit\Faq\Api\Data\QuestionInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

interface QuestionRepositoryInterface
{
    /**
     * Get a specific FAQ question by its ID.
     *
     * @param int $id
     * @throws NoSuchEntityException
     */
    public function get(int $id);

    /**
     * Save a FAQ question.
     *
     * @param QuestionInterface $question
     * @throws CouldNotSaveException
     */
    public function save(QuestionInterface $question);

    /**
     * Retrieve a list of FAQ questions based on search criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Delete a specific FAQ question.
     *
     * @param QuestionInterface $question
     * @throws CouldNotDeleteException
     */
    public function delete(QuestionInterface $question);

    /**
     * Delete a FAQ question by its ID.
     *
     * @param int $id
     * @throws NoSuchEntityException
     * @throws CouldNotDeleteException
     */
    public function deleteById(int $id);
}
