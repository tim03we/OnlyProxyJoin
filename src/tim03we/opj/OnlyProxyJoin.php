<?php

namespace tim03we\opj;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\plugin\PluginBase;

class OnlyProxyJoin extends PluginBase implements Listener {

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
    }

    public function onPreLogin(PlayerPreLoginEvent $event) {
        if($this->getConfig()->get("use-proxy") == true) {
            if(!$event->getPlayer()->getAddress() == $this->getConfig()->get("proxy-ip")) {
                $event->setKickMessage($this->getConfig()->get("kick-message"));
                $event->setCancelled(true);
            }
        }
    }
}