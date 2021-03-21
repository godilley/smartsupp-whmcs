<?php
/**
 * WHMCS Smartsupp Addon Module
 * @author GoDilley // ThatNode
 */
namespace SmartsuppWHMCS;

use Illuminate\Database\Capsule\Manager as Capsule;

class SmartsuppBase
{
    /**
     * If the module is enabled (in config)
     *
     * @return bool
     */
    public function isModuleEnabled()
    {
        return (bool)Capsule::table('tbladdonmodules')
            ->select('value')
            ->WHERE('module', '=', 'smartsupp')
            ->WHERE('setting', '=', 'smartsupp-enable')
            ->WHERE('value', 'on')
            ->count()
        ;
    }

    /**
     * Whether to show current logged in client details
     *
     * @return bool
     */
    public function showClientDetails()
    {
        return (bool)Capsule::table('tbladdonmodules')
            ->select('value')
            ->WHERE('module', '=', 'smartsupp')
            ->WHERE('setting', '=', 'smartsupp-clientdetails')
            ->WHERE('value', 'on')
            ->count()
        ;
    }

    /**
     * Whether to show current logged in client link
     *
     * @return bool
     */
    public function showClientDetailsLink()
    {
        return (bool)Capsule::table('tbladdonmodules')
            ->select('value')
            ->WHERE('module', '=', 'smartsupp')
            ->WHERE('setting', '=', 'smartsupp-clientdetails-link')
            ->WHERE('value', 'on')
            ->count()
        ;
    }

    /**
     * Returns the Smartsupp API Key
     *
     * @return false|string
     */
    protected function getApiKey()
    {
        $apikey = Capsule::table('tbladdonmodules')
            ->select('value')
            ->WHERE('module', '=', 'smartsupp')
            ->WHERE('setting', '=', 'smartsupp-key')
            ->first()
        ;

        if ($apikey === null || !($apikey instanceof \stdClass) || strlen($apikey->value) <= 0) {
            return false;
        }

        return (string)$apikey->value;
    }

    /**
     * Returns GA api key
     *
     * @return false|string
     */
    protected function getGAKey()
    {
        $apikey = Capsule::table('tbladdonmodules')
            ->select('value')
            ->WHERE('module', '=', 'smartsupp')
            ->WHERE('setting', '=', 'smartsupp-key-ga')
            ->first()
        ;

        if ($apikey === null || !($apikey instanceof \stdClass) || strlen($apikey->value) <= 0) {
            return false;
        }

        return (string)$apikey->value;
    }

    /**
     * Returns the url of the client from config
     *
     * @param $id
     * @return false|string
     */
    public function getClientUrl($id)
    {
        $url = Capsule::table('tbladdonmodules')
            ->select('value')
            ->WHERE('module', '=', 'smartsupp')
            ->WHERE('setting', '=', 'smartsupp-clientdetails-link-url')
            ->first()
        ;

        if ($url === null || !($url instanceof \stdClass) || strlen($url->value) <= 0) {
            return false;
        }

        $url = (string)$url->value;
        return (string)str_replace('{$id}', $id, $url);
    }
}