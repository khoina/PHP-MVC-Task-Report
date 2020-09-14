<?php
require_once __DIR__."/../model/GamesInteractor.php";

class HomepageController
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

    //Find and get a specific game
    public function viewone(){
        $game = $this->game_interact->getGame($_GET['game']);
        include 'view/view-game.php';
    }
}