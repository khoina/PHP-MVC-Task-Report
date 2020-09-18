<?php
require_once __DIR__."/../model/GamesInteractor.php";

class CartController
{
    private $game_interact;
    public function __construct(){
        $this->game_interact = new GamesInteractor();
    }

    public function showlist(){
        $games = array();
        foreach ($_SESSION["cart"] as $id){
            $item = $this->game_interact->getGame($id);
            array_push($games, $item);
        }
        include ("view/cart-list.php");

    }
}