<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Ui\Component\Listing\Column;

use Magento\Framework\Data\OptionSourceInterface;
/**
* Class Status changes 1 and 0 to enabled and disabled
 *
 * @package Magebit\Faq\Ui\Component\Listing\Column
 */
class Status implements OptionSourceInterface
{
    /**
     * Retrieve status options array.
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => 1, 'label' => __('Enabled')],
            ['value' => 0, 'label' => __('Disabled')]
        ];
    }
}
