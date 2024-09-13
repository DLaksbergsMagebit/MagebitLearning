<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit
 * @license   MIT
 */


namespace Magebit\Faq\Api;

use Magebit\Faq\Api\Data\QuestionInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

interface QuestionRepositoryInterface
{
    /**
     * Get a specific FAQ question by its ID.
     *
     * @param int $id
     * @return QuestionInterface
     * @throws NoSuchEntityException
     */
    public function get(int $id): QuestionInterface;

    /**
     * Save a FAQ question.
     *
     * @param QuestionInterface $question
     * @return QuestionInterface
     * @throws CouldNotSaveException
     */
    public function save(QuestionInterface $question): QuestionInterface;

    /**
     * Retrieve a list of FAQ questions based on search criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): SearchResultsInterface;

    /**
     * Delete a specific FAQ question.
     *
     * @param QuestionInterface $question
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(QuestionInterface $question): bool;

    /**
     * Delete a FAQ question by its ID.
     *
     * @param int $id
     * @return bool
     * @throws NoSuchEntityException
     * @throws CouldNotDeleteException
     */
    public function deleteById(int $id): bool;
}
