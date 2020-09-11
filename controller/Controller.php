<?php
require_once __DIR__."/../model/Database.php";

class Controller
{
    public $db;
    public function __construct(){
        $this->db = new Database();
    }

    //Get all games
    public function viewall(){
        $games = $this->db->getGamesList();

        include 'view/gamelist.php';
    }

    //Find and get a specific game
    public function viewone(){
        $game = $this->db->getGame($_GET['game']);
        include 'view/viewgame.php';
    }
}