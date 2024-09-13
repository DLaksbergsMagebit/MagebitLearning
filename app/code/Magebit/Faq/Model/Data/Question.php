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
        return $this->getData(self::ID);
    }

    /**
     * Setter for Id.
     *
     * @param int|null $id
     * @return void
     */
    public function setId(?int $id): void
    {
        $this->setData(self::ID, $id);
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
