<?php

declare(strict_types=1);

namespace ethaniccc\ShowPerms;

use pocketmine\permission\PermissionManager;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;

class Main extends PluginBase{

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
        // No 'if' or 'switch' statement needed here, we only have one command
        $permArray = PermissionManager::getInstance()->getPermissions(); //Gets all permissions objects
        $permName_DescArray = [];
        foreach($permArray as $perm)
        {
            $permName_DescArray[] = TextFormat::DARK_PURPLE."Permission: " . TextFormat::GREEN.$perm->getName() . TextFormat::YELLOW . " Description: " . $perm->getDescription(); //Message parsing
        }
        $this->getServer()->getLogger()->info("Here are all of the permission nodes:\n" . implode("\n", $permName_DescArray));
        return true;
    }

}
