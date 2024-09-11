<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Block\Adminhtml\Button;

use Magento\Backend\Block\Widget\Context;

/**
 * Class GenericButton provides utility methods for generating URLs used in admin buttons.
 *
 * @package Magebit\Faq\Block\Adminhtml\Button
 */
class GenericButton
{
    /**
     * @var Context
     */
    protected Context $context;

    /**
     * @param Context $context
     */
    public function __construct(Context $context)
    {
        $this->context = $context;
    }

    /**
     * Get the admin URL for the given route and parameters.
     *
     * @param string $route
     * @param array $params
     * @return string
     */
    public function getUrl(string $route = '', array $params = []): string
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
