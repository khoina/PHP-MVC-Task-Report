<?php
//TODO: switch MySQLi to PDO

require_once("Games.php");

class Database
{
    //The properties
    private $servername = "localhost";
    private $username = "sammy";
    private $password = "123456";
    private $connection = null;

    //Connects to the database
    public function connect(){
        if ($this->connection === null) {
            try {
                //Create connection
                $this->connection = new PDO("mysql:host = $this->servername; dbname=mvcdemo", $this->username, $this->password);

                //Check connection
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //echo "Connection successful\n";
            } catch (PDOException $pdo_exception){
                //echo "Connection failed: " . $pdo_exception->getMessage() . "\n";
            }

        }
        //else echo "Already connected\n";
    }

    //Disconnects from the database
    public function disconnect(){
        if (!is_null($this->connection)){
            $this->connection = null;
            //echo "Disconnected \n";
        } //else
            //echo "There is no current connection to the database \n";
    }

    //Uses query to return all games from the database's table "Games"
    public function getGamesList(){
        $games_list = array();
        try{
            $this->connect();
            $query = $this->connection->prepare("SELECT * FROM Games");
            $query->execute();

            foreach ($query->fetchAll() as $data){
                $item = new Games($data[0], $data[1], $data[2], $data[3], "$" . $data[4], $data[5]);
                array_push($games_list,$item);
            }
        } catch(PDOException $pdo_exception){
            echo "Error: " . $pdo_exception->getMessage() . "\n";
        }
        $this->disconnect();
        return $games_list;
    }

    //Find and return a specific game
    public function getGame($name){
        $games_list = $this->getGamesList();
        foreach ($games_list as $key => $value){
            if ($value->name == $name)
                return $value;
        }
}
}
