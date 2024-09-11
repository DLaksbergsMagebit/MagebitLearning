<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Model\Data;

use Magebit\Faq\Api\Data\QuestionInterface;
use Magento\Framework\DataObject;

class Question extends DataObject implements QuestionInterface
{
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
     * Setter for Id.
     *
     * @param int|null $id
     *
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->setData(self::ID, $id);
        return $this;
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
