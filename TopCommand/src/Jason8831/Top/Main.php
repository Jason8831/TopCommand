<?php

namespace Jason8831\Top;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener
{

    public Config $config;

    /**
     * @var Main
     */
    private static $instance;

    public function onEnable(): void
    {
        self::$instance = $this;
        $this->getLogger()->info("§f[§l§4Top Commands§r§f]: activée");
        $this->saveResource("config.yml");

        $this->getServer()->getCommandMap()->registerAll("AllCommands", [
            new Commands\Top(name: "top" , description: "permet de ce téléporter à la surface", usageMessage: "top")
        ]);

    }

    public static function getInstance(): self{
        return self::$instance;
    }
}