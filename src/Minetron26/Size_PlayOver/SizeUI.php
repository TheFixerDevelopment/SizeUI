<?php

namespace Minetron26\Size_PlayOver;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat as T;

class SizeUI extends PluginBase implements Listener{
	
	public function onEnable(){
		$this->getLogger()->info("Plugin SizeUI_for_PlayOver of Minetron26 Activado!");
	}
	
	public function onDisable(){
		$this->getLogger()->info("Plugin SizeUI_for_PlayOver Desactivado!");
	}

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
		switch($command->getName()){
			case "size":
			if($sender instanceof Player)       {
				           $this->openMyForm($sender);
					 } else {
						     $sender->sendMessage("Use this command in game");
						      return true;
					 }
			break;
		}
	    return true;
	}
	
	public function openMyForm($player){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $player, int $data = null){
			    $result = $data;
			    if($result === null){
				      return true;
				}
				switch($result){
					case "0";
					         $player->setScale("0.3");
				             $player->sendMessage(T::WHITE."[".T::AQUA."Play".T::YELLOW."Over".T::WHITE."]".T::GREEN."Size a cambiado a". T::RED ." MINI!");
					break;
					
					case "1";
					         $player->setScale("1.0");
				             $player->sendMessage(T::WHITE."[".T::AQUA."Play".T::YELLOW."Over".T::WHITE."]".T::GREEN."Size a cambiado a". T::WHITE ." NORMAL!");
					break;
					
					case "2";
					         $player->setScale("1.70");
				             $player->sendMessage(T::WHITE."[".T::AQUA."Play".T::YELLOW."Over".T::WHITE."]".T::GREEN."Size a cambiado a". T::YELLOW ." GRANDE!");
					break;
					
					case "3";
					         $player->setScale("3.0");
				             $player->sendMessage(T::WHITE."[".T::AQUA."Play".T::YELLOW."Over".T::WHITE."]".T::GREEN."Size a cambiado a". T::AQUA ." MEGAGRANDE!");
					break;
					}
					
			
			});
			$form->setTitle("SizeUI");
			$form->setContent(T::GREEN."Cambia tu Size!:");
			$form->addButton("Mini");
			$form->addButton("Normal");
			$form->addButton("Grande");
			$form->addButton("MegaGrand");
			$form->sendToPlayer($player);
			return $form;
		}
}