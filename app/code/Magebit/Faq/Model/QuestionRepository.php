<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Model;

use Exception;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor;
use Magebit\Faq\Api\QuestionRepositoryInterface;
use Magebit\Faq\Api\Data\QuestionInterface;
use Magebit\Faq\Model\ResourceModel\Question as ObjectResourceModel;
use Magebit\Faq\Model\ResourceModel\Question\CollectionFactory;
use RuntimeException;

readonly class QuestionRepository implements QuestionRepositoryInterface
{
    /**
     * @param QuestionFactory $objectFactory
     * @param ObjectResourceModel $objectResourceModel
     * @param CollectionFactory $collectionFactory
     * @param SearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessor $collectionProcessor
     */
    public function __construct(
        private QuestionFactory               $objectFactory,
        private ObjectResourceModel           $objectResourceModel,
        private CollectionFactory             $collectionFactory,
        private SearchResultsInterfaceFactory $searchResultsFactory,
        private CollectionProcessor           $collectionProcessor
    ) {
    }

    /**
     * Get question by ID.
     *
     * @param int $id
     * @return QuestionInterface
     * @throws NoSuchEntityException
     */
    public function get(int $id): QuestionInterface
    {
        try {
            $object = $this->objectFactory->create();
            $this->objectResourceModel->load($object, $id);

            if (!$object->getId()) {
                throw new NoSuchEntityException(__('Object with id "%1" does not exist.', $id));
            }

            return $object;
        } catch (Exception $e) {
            throw new NoSuchEntityException(__('Unable to load the question. Error: %1', $e->getMessage()));
        }
    }

    /**
     * Save a question.
     *
     * @param QuestionInterface $question
     * @return QuestionInterface
     * @throws CouldNotSaveException
     */
    public function save(QuestionInterface $question): QuestionInterface
    {
        try {
            $this->objectResourceModel->save($question);
        } catch (Exception $e) {
            throw new CouldNotSaveException(__('Cannot save the question. Error: %1', $e->getMessage()));
        }

        return $question;
    }

    /**
     * Retrieve a list of questions based on search criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultsInterface
     */
    /**
     * Retrieve a list of questions based on search criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): SearchResultsInterface
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria)
            ->setItems($collection->getItems())
            ->setTotalCount((int)$collection->getItems());

        return $searchResults;
    }

    /**
     * Deletes the question
     *
     * @param QuestionInterface $question
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(QuestionInterface $question): bool
    {
        try {
            $this->objectResourceModel->delete($question);

            return true;
        } catch (Exception $e) {
            throw new CouldNotDeleteException(__('Cannot delete the question. Error: %1', $e->getMessage()));
        }
    }

    /**
     * Delete question by ID
     *
     * @param int $id Question ID.
     * @return bool True if the question was successfully deleted.
     * @throws CouldNotDeleteException If the question could not be deleted.
     */
    public function deleteById(int $id): bool
    {
        try {
            $question = $this->get($id);

            return $this->delete($question);
        } catch (Exception $e) {
            throw new CouldNotDeleteException(__('Cannot delete the question by ID. Error: %1', $e->getMessage()));
        }
    }
}
