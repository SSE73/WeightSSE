<?php

namespace XLite\Module\XCExample\WeightSSE\View;

/**
 * @ListChild (list="product.details.common.product-attributes.elements", zone="customer", weight="101")
 */

class WeightAttributes extends \XLite\View\Product\Details\Customer\Widget
{
    protected function getDefaultTemplate()
    {
        return 'modules/XCExample/WeightSSE/weight_label.twig';
    }

    public function getYesnoSelectbox()
    {
        return \XLite\Core\Config::getInstance()->XCExample->WeightSSE->yesno_selectbox;
    }

    /**
     * Return the specific widget service name to make it visible as specific CSS class
     *
     * @return null|string
     */
    public function getFingerprint()
    {
        return 'widget-fingerprint-common-attributes';
    }

    /**
     * Check if widget is visible
     *
     * @return boolean
     */
    protected function isVisible()
    {
        return parent::isVisible()
            && $this->hasAttributes();
    }

    /**
     * Check - product has visible attributes or not
     *
     * @return boolean
     */
    protected function hasAttributes()
    {
        return 0 < $this->getProduct()->getWeight()
            || 0 < strlen($this->getProduct()->getSku());
    }

    /**
     * Return SKU of product
     *
     * @return string
     */
    protected function getSKU()
    {
        return $this->getProduct()->getSKU();
    }

    /**
     * Return weight of product
     *
     * @return float
     */
    protected function getWeight()
    {
        $weight = $this->getClearWeight();

        foreach ($this->getAttributeValues() as $av) {
            if (is_object($av)) {
                $weight += $av->getAbsoluteValue('weight');
            }
        }

        return 0 < $weight ? $weight : 0;
    }

    /**
     * Get clear product weight
     *
     * @return float
     */
    protected function getClearWeight()
    {
        return $weight = $this->getProduct()->getClearWeight();
    }

    /**
     * Get cache parameters
     *
     * @return array
     */
    protected function getCacheParameters()
    {
        $list = parent::getCacheParameters();

        $cart = \XLite\Model\Cart::getInstance();

        $productId = $this->getProduct()->getId();

        $list[] = $productId;
        $list[] = $cart->getItemsFingerprintByProductId($productId);

        return $list;
    }


}