<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Magebit\Faq\Model\ResourceModel\Question as ResourceModel;
use Magebit\Faq\Api\Data\QuestionInterface;

class Question extends AbstractModel implements QuestionInterface, IdentityInterface
{
    /**
     * @var string
     */
    private const CACHE_TAG = 'magebit_faq';

    /**
     * @var string
     */
    protected $_eventPrefix = 'magebit_faq_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * Return cache tags for questions
     *
     * @return array
     */
    public function getIdentities(): array
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Getter for Id.
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return (int)$this->getData(self::ID);
    }

    /**
     * Getter for Question.
     *
     * @return string|null
     */
    public function getQuestion(): ?string
    {
        return $this->getData(self::QUESTION);
    }

    /**
     * Setter for Question.
     *
     * @param string|null $question
     * @return void
     */
    public function setQuestion(?string $question): void
    {
        $this->setData(self::QUESTION, $question);
    }

    /**
     * Getter for Answer.
     *
     * @return string|null
     */
    public function getAnswer(): ?string
    {
        return $this->getData(self::ANSWER);
    }

    /**
     * Setter for Answer.
     *
     * @param string|null $answer
     * @return void
     */
    public function setAnswer(?string $answer): void
    {
        $this->setData(self::ANSWER, $answer);
    }

    /**
     * Getter for Status.
     *
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Setter for Status.
     *
     * @param int|null $status
     * @return void
     */
    public function setStatus(?int $status): void
    {
        $this->setData(self::STATUS, $status);
    }

    /**
     * Getter for Position.
     *
     * @return int|null
     */
    public function getPosition(): ?int
    {
        return $this->getData(self::POSITION);
    }

    /**
     * Setter for Position.
     *
     * @param int|null $position
     * @return void
     */
    public function setPosition(?int $position): void
    {
        $this->setData(self::POSITION, $position);
    }

    /**
     * Getter for UpdatedAt.
     *
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->getData(self::UPDATED_AT);
    }
}
