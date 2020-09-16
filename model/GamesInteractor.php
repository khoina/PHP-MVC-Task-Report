<?php
require_once ("Database.php");
require_once("Games.php");

class GamesInteractor
{
//Uses query to return all games from the database's table "Games"
    public function getGamesList()
    {
        $games_list = array();
        try {
            $db = new Database();
            $db->connect();
            $query = $db->getConnection()->prepare("SELECT * FROM Games");
            $query->execute();
            foreach ($query->fetchAll() as $data) {
                $item = new Games($data[0], $data[1], $data[2], $data[3], "$" . $data[4], $data[5]);
                array_push($games_list, $item);
            }
        } catch (PDOException $pdo_exception) {
            echo "Error: " . $pdo_exception->getMessage() . "\n";
        }
        $db->disconnect();
        return $games_list;
    }

    //Find and return a specific game
    public function getGame($id)
    {
        $games_list = $this->getGamesList();
        foreach ($games_list as $key => $value) {
            if ($value->id == $id)
                return $value;
        }
    }

    //Insert a game into the Database
    public function addGame(Games $item){
        try {
            $db = new Database();
            $db->connect();
            //The INSERT query
            $query ="INSERT INTO Games VALUES ('". $item->id."','". $item->name ."',
                                            '". $item->developer ."','". $item->publisher ."',
                                            ". $item->price .",'". $item->image ."');";
            $db->getConnection()->exec($query);
            echo "New item added successfully";
        } catch (PDOException $pdo_exception) {
            echo "Error: " . $pdo_exception->getMessage() . "\n";
        }
        $db->disconnect();
    }
}