<?php
/**
 * WHMCS Smartsupp Addon Module
 * @author GoDilley // ThatNode
 */
namespace SmartsuppWHMCS;

use Illuminate\Database\Capsule\Manager as Capsule;
use Smartsupp\ChatGenerator;

class SmartsuppWidget extends SmartsuppBase
{
    /**
     * @var string|null
     */
    private $uid;

    public function __construct()
    {
        $this->uid = $_SESSION['uid'];;
    }

    public function getWidgetScript()
    {
        $apiKey = $this->getApiKey();

        if ($apiKey === false) {
            return false;
        }

        $chat = new ChatGenerator;
        $chat
            ->setKey($apiKey);

        $gaKey = $this->getGAKey();
        if ($gaKey !== false) {
            $chat->setGoogleAnalytics($gaKey);
        }

        $chat = $this->appendClientDetails($chat);

        try {
            return trim($chat->render());
        } catch (\Exception $e) {
            return "";
        }
    }

    /**
     * Appends client specific details if enabled
     *
     * @param ChatGenerator $chat
     * @return ChatGenerator
     */
    private function appendClientDetails(ChatGenerator $chat)
    {
        if (!$this->showClientDetails()) {
            return $chat;
        }

        $client = $this->getCurrentClient();
        if ($client === null) {
            return $chat;
        }

        $name = implode(
            array_filter([$client->firstname, $client->lastname, $client->company ? "({$client->company})" : '']),
            " "
        );

        $chat->setName($name);
        $chat->setEmail($client->email);

        if ($this->showClientDetailsLink() && $clientLink = $this->getClientUrl($client->id)) {
            $chat->setVariable('clientLink', 'Client Link', $clientLink);
        }

        return $chat;
    }

    /**
     * @return null|object
     */
    private function getCurrentClient()
    {
        if (!$this->uid) {
            return null;
        }

        return Capsule::table('tblclients')->WHERE('id', $this->uid)->first();
    }

}