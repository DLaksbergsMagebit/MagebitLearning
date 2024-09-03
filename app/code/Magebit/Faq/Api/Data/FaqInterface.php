<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

namespace Magebit\Faq\Api\Data;

interface FaqInterface
{
    const ID = 'id';
    const QUESTION = 'question';
    const ANSWER = 'answer';
    const STATUS = 'status';
    const POSITION = 'position';
    const UPDATED_AT = 'updated_at';

    public function getId();
    public function getQuestion();
    public function setQuestion($question);
    public function getAnswer();
    public function setAnswer($answer);
    public function getStatus();
    public function setStatus($status);
    public function getPosition();
    public function setPosition($position);
    public function getUpdatedAt();
}
