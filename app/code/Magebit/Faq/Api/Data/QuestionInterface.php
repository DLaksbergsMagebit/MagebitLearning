<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit
 * @license   MIT
 */


namespace Magebit\Faq\Api\Data;


/**
 * Interface for managing FAQ questions.
 */
interface QuestionInterface
{
    const ID = 'id';
    const QUESTION = 'question';
    const ANSWER = 'answer';
    const STATUS = 'status';
    const POSITION = 'position';
    const UPDATED_AT = 'updated_at';

    /**
     * Get the ID of the question.
     *
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * Get the question text.
     *
     * @return string|null
     */
    public function getQuestion(): ?string;

    /**
     * Set the question text.
     *
     * @param string|null $question
     *
     * @return void
     */
    public function setQuestion(?string $question): void;

    /**
     * Get the answer text.
     *
     * @return string|null
     */
    public function getAnswer(): ?string;

    /**
     * Set the answer text.
     *
     * @param string|null $answer
     *
     * @return void
     */
    public function setAnswer(?string $answer): void;

    /**
     * Get the status of the question.
     *
     * @return int|null
     */
    public function getStatus(): ?int;

    /**
     * Set the status of the question.
     *
     * @param int|null $status
     *
     * @return void
     */
    public function setStatus(?int $status): void;

    /**
     * Get the position of the question in the list.
     *
     * @return int|null
     */
    public function getPosition(): ?int;

    /**
     * Set the position of the question in the list.
     *
     * @param int|null $position
     *
     * @return void
     */
    public function setPosition(?int $position): void;

    /**
     * Get the last updated date of the question.
     *
     * @return string|null
     */
    public function getUpdatedAt(): ?string;
}
