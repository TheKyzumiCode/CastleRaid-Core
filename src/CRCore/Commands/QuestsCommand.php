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

namespace CRCore\Commands;

use CRCore\Loader;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use jojoe77777\FormAPI;

class QuestsCommand extends PluginCommand {

    public function __construct(Loader $plugin) {
        parent::__construct("quests", $plugin);
        $this->setDescription("Quests Command");
        $this->setPermission("castleraid.quests");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        if ($this->testPermission($sender) and $sender instanceof Player) {
            $this->mainForm($sender);
        }
    }

    public function mainForm(Player $player) {
        $api = $this->getPlugin()->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $sender, array $data) {
            if (isset($data[0])) {
                switch ($data[0]) {
                    case 0:
                        $sender->sendMessage(TextFormat::RED . "Exiting QuestUI...");
                        break;
                    case 1:
                        $sender->sendMessage(TextFormat::RED . "Coming Soon!");
                        break;
                    case 2:
                        $sender->sendMessage(TextFormat::RED . "Coming Soon!");
                        break;
                }
            }
        });
        $form->setTitle("Quest UI");
        $form->setContent(TextFormat::AQUA . "Tap any of the available quests below!");
        $form->addButton(TextFormat::DARK_RED . "Exit");
        $form->addButton(TextFormat::GREEN . "Quest | Knights");
        $form->addButton(TextFormat::GREEN . "Quest | Raiding");
        $form->sendToPlayer($player);
    }
}