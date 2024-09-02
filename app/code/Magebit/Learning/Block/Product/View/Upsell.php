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
use Magento\Catalog\Model\ResourceModel\Product\Link\Product\Collection;
use Magento\Framework\Escaper;
use Magento\Catalog\Block\Product\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Url\EncoderInterface;
use Magento\Framework\Json\EncoderInterface as JsonEncoderInterface;
use Magento\Framework\Stdlib\StringUtils;
use Magento\Catalog\Helper\Product as ProductHelper;
use Magento\Catalog\Model\ProductTypes\ConfigInterface;
use Magento\Framework\Locale\FormatInterface;
use Magento\Customer\Model\Session;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Pricing\PriceCurrencyInterface;

class Upsell extends ProductView
{
    /**
     * @var Escaper
     */
    protected Escaper $escaper;

    /**
     * @param Context $context
     * @param EncoderInterface $urlEncoder
     * @param JsonEncoderInterface $jsonEncoder
     * @param StringUtils $string
     * @param ProductHelper $productHelper
     * @param ConfigInterface $productTypeConfig
     * @param FormatInterface $localeFormat
     * @param Session $customerSession
     * @param ProductRepositoryInterface $productRepository
     * @param PriceCurrencyInterface $priceCurrency
     * @param array $data
     */
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
        PriceCurrencyInterface $priceCurrency,
        array $data = []
    ) {
        $this->escaper = $context->getEscaper();
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

    /**
     * Get upsell products collection
     *
     * @return Collection|null
     * @throws NoSuchEntityException
     */
    public function getUpsellProducts(): ?Collection
    {
        $product = $this->getProduct();
        return $product?->getUpSellProductCollection()
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('status', 1)
            ->addStoreFilter($this->_storeManager->getStore()->getId())
            ->setPageSize(4); // Limit the number of upsell products
    }

    /**
     * Get the product URL
     *
     * @param Product $product
     * @return string
     */
    public function getProductUrls(Product $product): string
    {
        return $this->escaper->escapeUrl($product->getProductUrl());
    }

    /**
     * Get the product image URL
     *
     * @param Product $product
     * @return string
     */
    public function getProductImageUrl(Product $product): string
    {
        return $this->getImage($product, 'product_page_image_small')->getImageUrl();
    }

    /**
     * Get the escaped product name
     *
     * @param Product $product
     * @return string
     */
    public function getProductName(Product $product): string
    {
        return $this->escaper->escapeHtml($product->getName());
    }

    /**
     * Get the reviews summary HTML
     *
     * @param Product $product
     * @return string
     */
    public function getProductReviewsHtml(Product $product): string
    {
        return $this->getReviewsSummaryHtml($product, 'short', true);
    }

    /**
     * Get the product price HTML
     *
     * @param Product $product
     * @return string
     */
    public function getPrice(Product $product): string
    {
        return $this->getProductPrice($product);
    }

    /**
     * Get the add to cart URL
     *
     * @param Product $product
     * @return string
     */
    public function addToCartUrl(Product $product): string
    {
        return $this->escaper->escapeUrl($this->getAddToCartUrl($product));
    }
}
