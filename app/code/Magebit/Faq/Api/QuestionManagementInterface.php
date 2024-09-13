<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */


namespace Magebit\Faq\Api;

interface QuestionManagementInterface
{
    /**
     * Enable a question by its ID.
     *
     * @param int $id
     * @return bool
     */
    public function enableQuestion(int $id): bool;

    /**
     * Disable a question by its ID.
     *
     * @param int $id
     * @return bool
     */
    public function disableQuestion(int $id): bool;
}
