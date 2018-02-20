<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\View\Upgrade\Step\Prepare;


/**
 * PharPopup
 */
class PharPopup extends \XLite\View\AView
{
    /**
     * @inheritdoc
     */
    protected function getDefaultTemplate()
    {
        return 'upgrade/step/prepare/buttons/parts/phar_popup.twig';
    }
}