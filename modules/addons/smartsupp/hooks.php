<?php
/**
 * WHMCS Smartsupp Addon Module
 * @author GoDilley // ThatNode
 * @param $vars
 */

include_once(__DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use SmartsuppWHMCS\SmartsuppWidget;

/**
 * @param $vars
 * @return string
 */
function smartsupWidgetCode($vars)
{
    $widget = new SmartsuppWidget();
    if (!$widget->isModuleEnabled()) {
        return "";
    }

    $widgetScript = $widget->getWidgetScript();

    if ($widgetScript === false) {
        return "";
    }

    return $widgetScript;
}

add_hook("ClientAreaFooterOutput", 1, "smartsupWidgetCode");
