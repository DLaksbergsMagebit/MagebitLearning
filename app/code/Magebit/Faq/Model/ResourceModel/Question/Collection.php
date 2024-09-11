<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Model\ResourceModel\Question;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magebit\Faq\Model\Question as QuestionModel;
use Magebit\Faq\Model\ResourceModel\Question as QuestionResource;

class Collection extends AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct(): void
    {
        $this->_init(QuestionModel::class, QuestionResource::class);
    }
}

