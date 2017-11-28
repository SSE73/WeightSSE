<?php
// vim: set ts=4 sw=4 sts=4 et:

namespace XLite\Module\XCExample\WeightSSE;

/**
 * Main module
 */
abstract class Main extends \XLite\Module\AModule
{
    /**
     * Author name
     *
     * @return string
     */
    public static function getAuthorName()
    {
        return 'Sysylyatin Sergei';
    }

    /**
     * Module name
     *
     * @return string
     */
    public static function getModuleName()
    {
        return 'Change Weight SSE';
    }

    /**
     * Module description
     *
     * @return string
     */
    public static function getDescription()
    {
        return '';
    }

    /**
     * Get module major version
     *
     * @return string
     */
    public static function getMajorVersion()
    {
        return '5.3';
    }

    /**
     * Module version
     *
     * @return string
     */
    public static function getMinorVersion()
    {
        return '0';
    }

    protected static function moveTemplatesInLists()
    {
        $templates = [
            'product/details/common_attributes/common.product-attributes.weight.twig' => [
                static::TO_DELETE  => [
                    ['product.details.common.product-attributes.elements', \XLite\Model\ViewList::INTERFACE_CUSTOMER],
                ],
            ],
        ];

        return $templates;
    }

    public static function showSettingsForm() 
    {
        return true;
    }

}