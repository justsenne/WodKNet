<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\QSL\CloudSearch\Core;

use XLite\Model\Product;
use XLite\Module\XC\ProductTags\Model\Tag;


/**
 * CloudSearch store-side API methods
 *
 * @Decorator\Depend ({"XC\ProductTags"})
 */
 class StoreApiProductTags extends \XLite\Module\QSL\CloudSearch\Core\StoreApiReviews implements \XLite\Base\IDecorator
{
    /**
     * Get product attributes data
     *
     * @param $product
     *
     * @return array
     */
    protected function getProductAttributes(Product $product)
    {
        $attributes = parent::getProductAttributes($product);

        $tags = $product->getTags();

        $values = [];
        /** @var Tag $tag */
        foreach ($tags as $tag) {
            $values[] = $tag->getName();
        }

        if ($values) {
            $attributes[] = [
                'id'                => 'XC\ProductTags',
                'name'              => (string) static::t('Tags'),
                'preselectAsFilter' => true,
                'group'             => 'Product Tags module',
                'values'            => $values,
            ];
        }

        return $attributes;
    }
}
