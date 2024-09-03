<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

namespace Magebit\Faq\Model\ResourceModel\Question;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magebit\Faq\Model\Faq;
use Magebit\Faq\Model\ResourceModel\Faq as FaqResource;

class Collection extends AbstractCollection
{
    protected function _construct(): void
    {
        $this->_init(Faq::class, FaqResource::class);
    }
}
