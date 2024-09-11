<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Question extends AbstractDb
{
    protected string $_eventPrefix = 'magebit_faq_resource_model';

    protected function _construct(): void
    {
        $this->_init('magebit_faq', 'id');
        $this->_useIsObjectNew = true;
    }
}
