<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Block;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Element\Template;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SortOrderBuilder;
use Magebit\Faq\Api\QuestionRepositoryInterface as QuestionRepository;
use Magebit\Faq\Api\Data\QuestionInterface;

/**
 * Block class for fetching and displaying FAQ questions.
 */
class QuestionList extends Template
{
    /**
     * Constructor.
     *
     * @param Context $context
     * @param QuestionRepository $questionRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param FilterBuilder $filterBuilder
     * @param SortOrderBuilder $sortOrderBuilder
     */
    public function __construct(
        private readonly Context               $context,
        private readonly QuestionRepository    $questionRepository,
        private readonly SearchCriteriaBuilder $searchCriteriaBuilder,
        private readonly FilterBuilder         $filterBuilder,
        private readonly SortOrderBuilder      $sortOrderBuilder
    ) {
        parent::__construct($this->context);
    }

    /**
     * Retrieve the list of FAQ questions with 'enabled' status and sorted by position.
     *
     * @return QuestionInterface[]
     */
    public function getQuestions(): array
    {
        $statusFilter = $this->filterBuilder
            ->setField('status')
            ->setValue(1)
            ->setConditionType('eq')
            ->create();

        $sortOrder = $this->sortOrderBuilder
            ->setField('position')
            ->setDirection('ASC')
            ->create();

        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilters([$statusFilter])
            ->setSortOrders([$sortOrder])
            ->create();

        $questions = $this->questionRepository->getList($searchCriteria);

        return $questions->getItems();
    }
}
