<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

namespace Magebit\Faq\Model;

use Magebit\Faq\Api\FaqRepositoryInterface;
use Magebit\Faq\Api\Data\FaqInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class FaqManagement
{
    /**
     * @var FaqRepositoryInterface
     */
    private FaqRepositoryInterface $faqRepository;

    /**
     * FaqManagement constructor.
     *
     * @param FaqRepositoryInterface $faqRepository
     */
    public function __construct(
        FaqRepositoryInterface $faqRepository
    ) {
        $this->faqRepository = $faqRepository;
    }

    /**
     * Enable a specific FAQ question.
     *
     * @param int $faqId
     * @return FaqInterface
     * @throws NoSuchEntityException
     */
    public function enableQuestion(int $faqId): FaqInterface
    {
        $faq = $this->faqRepository->getById($faqId);
        $faq->setStatus(1); // Assuming 1 is enabled
        return $this->faqRepository->save($faq);
    }

    /**
     * Disable a specific FAQ question.
     *
     * @param int $faqId
     * @return FaqInterface
     * @throws NoSuchEntityException
     */
    public function disableQuestion(int $faqId): FaqInterface
    {
        $faq = $this->faqRepository->getById($faqId);
        $faq->setStatus(0); // Assuming 0 is disabled
        return $this->faqRepository->save($faq);
    }
}
