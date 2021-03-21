<?php
/**
 * WHMCS Smartsupp Addon Module
 * @author GoDilley // ThatNode
 */

if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

include_once(__DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

function smartsupp_config()
{
    return [
        "name" => "Smartsupp WHMCS Module",
        "description" => "A module designed to make it easier for providers to integrate smartsupp into their websites, with no template edits",
        "version" => "1.0.0",
        "author" => "<a href='https://github.com/godilley/'>GoDilley</a> // <a href='https://thatnode.com/'>ThatNode</a>",
        "language" => "english",
        "fields" => [
            "smartsupp-enable" => [
                "FriendlyName" => "Enable module?",
                "Type" => "yesno",
                "Size" => "55",
                "Description" => "A quick way to enable or disable this module on your website ",
                "Default" => "",
            ],
            "smartsupp-key" => [
                "FriendlyName" => "API Key",
                "Type" => "text",
                "Size" => "55",
                "Description" => "Obtained by going to the <a href=\"https://app.smartsupp.com/app/settings/chatbox/chat-code\">Smartsupp settings</a>"
                                    . ", and then 'Chat Bot' and the field described <em>'Some of our older plugins require a Smartsupp key. If that's the case, insert the following key in the plugin settings.'</em>",
                "Default" => "",
            ],
            "smartsupp-key-ga" => [
                "FriendlyName" => "Google Analytics UA Key",
                "Type" => "text",
                "Size" => "55",
                "Description" => "Enabled integration with Google Analytics. This is your tracking id - It starts 'UA-' help finding it can be found here: <a href=\"https://support.google.com/analytics/answer/9539598\">https://support.google.com/analytics/answer/9539598</a>",
                "Default" => "",
            ],
            "smartsupp-clientdetails" => [
                "FriendlyName" => "Show basic client details if logged in?",
                "Type" => "yesno",
                "Size" => "55",
                "Description" => "Do you want basic client details displayed in their chat (requires WHMCS login)?",
                "Default" => "",
            ],
            "smartsupp-clientdetails-link" => [
                "FriendlyName" => "Show link to client if logged in?",
                "Type" => "yesno",
                "Size" => "55",
                "Description" => "Do you want a link to their account in their chat (requires WHMCS login)? <strong>This setting requries the above to be enabled</strong>",
                "Default" => "",
            ],
            "smartsupp-clientdetails-link-url" => [
                "FriendlyName" => 'Admin client summary url',
                "Type" => "text",
                "Size" => "150",
                "Description" => '{$id} will be replaced with the client id.',
                "Default" => "",
            ],
            "smartsupp-clientsonly" => [
                "FriendlyName" => "Only show to clients?",
                "Type" => "yesno",
                "Size" => "55",
                "Description" => "Hide from unregistered users?",
                "Default" => "",
            ],
            "smartsupp-unregonly" => [
                "FriendlyName" => "Only show to unregistered?",
                "Type" => "yesno",
                "Size" => "55",
                "Description" => "Hide from registered users?",
                "Default" => "",
            ],
        ]
    ];
}
