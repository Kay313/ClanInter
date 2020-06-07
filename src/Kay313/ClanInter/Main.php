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
        $this->getServer()->getLogger()->info("ClanInter enabled!");
    }
    public function onDisable(){
	$this->getServer()->getLogger()->info("ClanInter disabled");
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

 

        $form->setTitle("§l§1ClanInter");
        $form->setContent("§aWhat do you want to do?");
        $form->addButton("§4Exit");
        $form->addButton("§3Info \n§r§3See information about a Clan");
        $form->addButton("§3Create \n§r§3Create a new Clan");
        $form->addButton("§3Delete \n§r§3Delete your Clan");
        $form->addButton("§3Invite \n§r§3Invite a Player");
        $form->addButton("§3Accept \n§r§3Accept a Invite");
        $form->addButton("§3Leave \n§r§3Leave a Clan");
        $form->addButton("§3Kick \n§r§3Kick someone from your Clan");
        $form->addButton("§3Owner \n§r§3Make someone the Clanowner");
        $form->addButton("§3Chat \n§r§3Write in the Clanchat");
        $form->sendToPlayer($player);
        return $form;

			}

		}
