<?php

namespace Kay313\ClanInter;

use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\plugin\PluginBase;
use Kay313\ClanInter\libs\jojoe77777\FormAPI\SimpleForm;
use Kay313\ClanInter\libs\jojoe77777\FormAPI\CustomForm;
use Kay313\ClanInter\forms\CIForm;
use Kay313\ClanInter\forms\CERForm;
use Kay313\ClanInter\forms\CEForm;
use Kay313\ClanInter\forms\CAForm;
use Kay313\ClanInter\forms\CKForm;
use Kay313\ClanInter\forms\COForm;
use Kay313\ClanInter\forms\CCForm;

class Main extends PluginBase implements Listener{

    public function onEnable(){

        $this->getServer()->getLogger()->info("ClanMenü wurde aktiviert!");

    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
		if($cmd->getName() == "c"){
			$this->c($sender);
		}
		return true;
	}

	

	public function c($player) {
        $form = new SimpleForm(function (Player $player, int $data = null){
 

            $result = $data;
            if($result === null){
                return true;
            }
            switch($result){
            case 0:
            break;

            case 1:
            if ($data == 1) {
                $player->sendForm(new CIForm());
            }
            break;

            case 2:
            if ($data == 2) {
                $player->sendForm(new CERForm());
            }
            break;

            case 3:
            $player->getServer()->getCommandMap()->dispatch($player, "clan delete ".$data[0]);
            break;

            case 4: 
            if ($data == 4) {
                $player->sendForm(new CEForm());
            }
            break; 

            case 5:
            if ($data == 5) {
                $player->sendForm(new CAForm());
            }
            break;

            case 6: 
            $player->getServer()->getCommandMap()->dispatch($player, "clan leave ".$data[0]);
            break; 

            case 7:
            if ($data == 7) {
                $player->sendForm(new CKForm());
            }
            break;

            case 8:
            if ($data == 8) {
                $player->sendForm(new COForm());
            }
            break;

            case 9:
            if ($data == 9) {
                $player->sendForm(new CCForm());
            }
            break;


            }

 

        });

 

        $form->setTitle("§l§1Clansystem");
        $form->setContent("§aWähle etwas aus");
        $form->addButton("§4Schließen");
        $form->addButton("§3Info \n§r§3Siehe Infos über einen Clan");
        $form->addButton("§3Erstellen \n§r§3Erstelle einen Clan");
        $form->addButton("§3Löschen \n§r§3Lösche deinen Clan");
        $form->addButton("§3Einladen \n§r§3Lade jemanden in deinen Clan ein");
        $form->addButton("§3Akzeptieren \n§r§3Nehme eine Einladung an");
        $form->addButton("§3Verlassen \n§r§3Verlasse einen Clan");
        $form->addButton("§3Kick \n§r§3Kicke jemanden aus deinem Clan");
        $form->addButton("§3Chef \n§r§3Mache jemanden zum Clanchef");
        $form->addButton("§3Chat \n§r§3Schreibe in den Clanchat");
        $form->sendToPlayer($player);
        return $form;

			}

		}
