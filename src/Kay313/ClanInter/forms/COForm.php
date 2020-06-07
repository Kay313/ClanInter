<?php

namespace Kay313\ClanInter\forms;

use Kay313\ClanInter\Main;
use jojoe77777\FormAPI\CustomForm;
use pocketmine\Player;
use pocketmine\item\Item;
use pocketmine\command\Command;

class COForm extends CustomForm {

    public function __construct() {

        $callable = function (Player $player, $data) {

            if ($data == null) return;

            $player->getServer()->getCommandMap()->dispatch($player, "clan leader ".$data[0]);

        };

        parent::__construct($callable);

        $this->setTitle("§l§1ClanInter");

        $this->addInput("§3Wear the name of the player who is supposed to be the new Clanowner");
    }

}
