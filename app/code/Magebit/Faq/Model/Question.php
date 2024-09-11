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
    const string CACHE_TAG = 'magebit_faq';

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
        return $this->getData(self::ID) === null ? null
            : (int)$this->getData(self::ID);
    }

    /**
     * Getter for Question.
     *
     * @return string|null
     */
    public function getQuestion(): ?string
    {
        return $this->getData(self::QUESTION) === null ? null
            : (string)$this->getData(self::QUESTION);
    }

    /**
     * Setter for Question.
     *
     * @param string|null $question
     *
     * @return self
     */
    public function setQuestion(?string $question): self
    {
        $this->setData(self::QUESTION, $question);
        return $this;
    }

    /**
     * Getter for Answer.
     *
     * @return string|null
     */
    public function getAnswer(): ?string
    {
        return $this->getData(self::ANSWER) === null ? null
            : (string)$this->getData(self::ANSWER);
    }

    /**
     * Setter for Answer.
     *
     * @param string|null $answer
     *
     * @return self
     */
    public function setAnswer(?string $answer): self
    {
        $this->setData(self::ANSWER, $answer);
        return $this;
    }

    /**
     * Getter for Status.
     *
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->getData(self::STATUS) === null ? null
            : (int)$this->getData(self::STATUS);
    }

    /**
     * Setter for Status.
     *
     * @param int|null $status
     *
     * @return self
     */
    public function setStatus(?int $status): self
    {
        $this->setData(self::STATUS, $status);
        return $this;
    }

    /**
     * Getter for Position.
     *
     * @return int|null
     */
    public function getPosition(): ?int
    {
        return $this->getData(self::POSITION) === null ? null
            : (int)$this->getData(self::POSITION);
    }

    /**
     * Setter for Position.
     *
     * @param int|null $position
     *
     * @return self
     */
    public function setPosition(?int $position): self
    {
        $this->setData(self::POSITION, $position);
        return $this;
    }

    /**
     * Getter for UpdatedAt.
     *
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->getData(self::UPDATED_AT) === null ? null
            : (string)$this->getData(self::UPDATED_AT);
    }
}
