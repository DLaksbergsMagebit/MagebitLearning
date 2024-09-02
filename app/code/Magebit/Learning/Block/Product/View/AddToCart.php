<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Learning\Block\Product\View;

use Magento\Catalog\Block\Product\View as ProductView;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Block\Product\Context;
use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\Framework\Url\EncoderInterface;
use Magento\Framework\Json\EncoderInterface as JsonEncoderInterface;
use Magento\Framework\Stdlib\StringUtils;
use Magento\Catalog\Helper\Product as ProductHelper;
use Magento\Catalog\Model\ProductTypes\ConfigInterface;
use Magento\Framework\Locale\FormatInterface;
use Magento\Customer\Model\Session;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Escaper;
class AddToCart extends ProductView
{
    protected Escaper $escaper;
    protected $priceCurrency;

    public function __construct(
        Context $context,
        EncoderInterface $urlEncoder,
        JsonEncoderInterface $jsonEncoder,
        StringUtils $string,
        ProductHelper $productHelper,
        ConfigInterface $productTypeConfig,
        FormatInterface $localeFormat,
        Session $customerSession,
        ProductRepositoryInterface $productRepository,
        PriceCurrencyInterface $priceCurrency, // Injected PriceCurrencyInterface
        array $data = []
    ) {
        $this->escaper = $context->getEscaper();
        $this->priceCurrency = $priceCurrency; // Assign to class property
        parent::__construct(
            $context,
            $urlEncoder,
            $jsonEncoder,
            $string,
            $productHelper,
            $productTypeConfig,
            $localeFormat,
            $customerSession,
            $productRepository,
            $priceCurrency,
            $data
        );
    }

    public function getProductQty(): int
    {
        $product = $this->getProduct();
        $stockItem = $product->getExtensionAttributes()->getStockItem();
        return $stockItem ? (int)$stockItem->getQty() : 0;
    }

    public function isProductInStock(): bool
    {
        $product = $this->getProduct();
        $stockItem = $product->getExtensionAttributes()->getStockItem();
        return $stockItem ? $stockItem->getIsInStock() : false;
    }

    public function getFormattedPrice(): string
    {
        $product = $this->getProduct();
        $productPrice = $product->getFinalPrice();
        return $this->priceCurrency->format($productPrice, true, false);
    }
}
