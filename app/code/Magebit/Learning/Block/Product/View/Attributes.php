<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Learning\Block\Product\View;

use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Block\Product\View\Attributes as BaseAttributes;
use Magento\Catalog\Helper\Output as CatalogHelper;
use Magento\Framework\Escaper;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Magento\Framework\Pricing\PriceCurrencyInterface;

class Attributes extends BaseAttributes
{
    protected Escaper $escaper;
    protected CatalogHelper $catalogHelper;

    public function __construct(
        Context $context,
        Registry $registry,
        PriceCurrencyInterface $priceCurrency,
        CatalogHelper $catalogHelper,
        array $data = []
    ) {
        $this->escaper = $context->getEscaper();
        $this->catalogHelper = $catalogHelper;

        parent::__construct($context, $registry, $priceCurrency, $data);
    }

    /**
     * Get the product attributes to display
     *
     * @return array
     */
    public function getDisplayAttributes(): array
    {
        $product = $this->getProduct();
        $attributes = $product->getAttributes();
        $displayAttributes = ['dimensions', 'color', 'material'];
        $result = [];

        foreach ($displayAttributes as $code) {
            if (isset($attributes[$code])) {
                $attribute = $attributes[$code];
                $result[] = [
                    'label' => $this->escaper->escapeHtml($attribute->getStoreLabel()),
                    'value' => $this->escaper->escapeHtml($attribute->getFrontend()->getValue($product))
                ];
            }
        }

        return $result;
    }

    /**
     * Get the product short description
     *
     * @return string
     * @throws LocalizedException
     */
    public function getShortDescription(): string
    {
        $product = $this->getProduct();
        return $this->catalogHelper->productAttribute(
            $product,
            $product->getData('short_description'),
            'short_description'
        );
    }
}
