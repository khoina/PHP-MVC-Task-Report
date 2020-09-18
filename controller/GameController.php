<?php
require_once __DIR__."/../model/GamesInteractor.php";

class GameController
{
    private $game_interact;
    public function __construct(){
        $this->game_interact = new GamesInteractor();
    }

    //Get all games
    public function viewall(){
        $games = $this->game_interact->getGamesList();

        include 'view/game-list.php';
    }

    public function viewall_table(){
        $games = $this->game_interact->getGamesList();

        include "view/game-table.php";
    }

    //Find and get a specific game
    public function viewone(){
        $game = $this->game_interact->getGame($_GET['id']);
        include 'view/view-game.php';
    }

    public function addcart($id){
        array_push($_SESSION["cart"], $id);
        header("Location:index.php");
        $game = $this->game_interact->getGame($id)->price;
        echo $game;
    }
}