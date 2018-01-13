<?php
/**
 * -==+CastleRaid Core+==-
 * Originally Created by QuiverlyRivarly
 * Originally Created for CastleRaidPE
 *
 * @authors: QuiverlyRivarly and iiFlamiinBlaze
 * @contributors: Nick, Potatoe, and Nice.
 */
declare(strict_types=1);

namespace CRCore;

# CRCore Command uses:
use CRCore\Commands\ClearInventoryCommand;
use CRCore\Commands\CustomPots;
use CRCore\Commands\FlyCommand;
use CRCore\Commands\HealCommand;
use CRCore\Commands\InfoCommand;
use CRCore\Commands\MenuCommand;
//use CRCore\Commands\VaultCommand;
use CRCore\Commands\MPShop;
use CRCore\Commands\NickCommand;
# CRCore Task uses:
# CRCore Event uses:
//use CRCore\Events\KillMoney;
use CRCore\Events\EventListener;
use CRCore\Events\PotionListener;
# Base PocketMine uses:
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\scheduler\PluginTask;

class Loader extends PluginBase
{
    # Public variables:
    public $tutorial;

    # Public constants:
    const NO_PERMISSION = TextFormat::BOLD . TextFormat::GRAY . "(" . TextFormat::RED . "!" . TextFormat::GRAY . ")" . TextFormat::RED . "You don't have permission to use this command";
    const CORE_VERSION = "v1.4";

    public function onLoad(): void{
        $this->saveDefaultConfig();
        $this->saveResource("tsconfig.json");
    }

    public function onEnable(): void{
        API::$main = $this;
        new EventListener($this);
        new PotionListener($this);
        $this->getServer()->getCommandMap()->registerAll("CRCore", [new CustomPots($this), new InfoCommand($this), new MenuCommand($this), new MPShop($this), new NickCommand($this), new ClearInventoryCommand($this), new HealCommand($this), new FlyCommand($this),//new VaultCommand($this)
        ]);
    }
}
