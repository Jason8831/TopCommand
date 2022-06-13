<?php

namespace Jason8831\Top\Commands;

use Jason8831\Top\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;
use pocketmine\utils\Config;
use pocketmine\world\Position;

class Top extends Command
{

    public function __construct(string $name, Translatable|string $description = "", Translatable|string|null $usageMessage = null, array $aliases = [])
    {
        parent::__construct($name, $description, $usageMessage, $aliases);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        $config = new Config(Main::getInstance()->getDataFolder() . "config.yml", Config::YAML);

        if ($sender instanceof Player) {
            if ($sender->hasPermission("top.use")) {
                    $top = $sender->getWorld()->getHighestBlockAt($sender->getPosition()->getX(), $sender->getPosition()->getZ());
                    $sender->teleport(new Position($sender->getPosition()->getX(), $top + 4, $sender->getPosition()->getZ(), $sender->getWorld()));
                    $sender->sendMessage($config->get("TopMessage"));
                } else {
                    $sender->sendMessage($config->get("NoPermissionCommand"));
            }
        }
    }
}