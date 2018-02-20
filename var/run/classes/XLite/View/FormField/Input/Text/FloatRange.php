<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\View\FormField\Input\Text;

/**
 * Float range
 */
class FloatRange extends \XLite\View\FormField\Input\Text\ARange
{
    /**
     * Returns input widget class name
     *
     * @return string
     */
    protected function getInputWidgetClass()
    {
        return 'XLite\View\FormField\Input\Text\FloatInput';
    }

    /**
     * Returns end widget class
     *
     * @return string
     */
    protected function getEndWidgetClass()
    {
        return 'XLite\View\FormField\Input\Text\FloatWithInfinity';
    }

    /**
     * Returns default begin value
     *
     * @return mixed
     */
    protected function getDefaultBeginValue()
    {
        return 0;
    }
}
