<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit
 * @license   MIT
 */

declare(strict_types=1);

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
     */
    public function getId();

    /**
     * Get the question text.
     */
    public function getQuestion();

    /**
     * Set the question text.
     *
     * @param string|null $question
     */
    public function setQuestion(?string $question);

    /**
     * Get the answer text.
     */
    public function getAnswer();

    /**
     * Set the answer text.
     *
     * @param string|null $answer
     */
    public function setAnswer(?string $answer);

    /**
     * Get the status of the question.
     */
    public function getStatus();

    /**
     * Set the status of the question.
     *
     * @param int|null $status
     */
    public function setStatus(?int $status);

    /**
     * Get the position of the question in the list.
     */
    public function getPosition();

    /**
     * Set the position of the question in the list.
     *
     * @param int|null $position
     */
    public function setPosition(?int $position);

    /**
     * Get the last updated date of the question.
     */
    public function getUpdatedAt();
}
