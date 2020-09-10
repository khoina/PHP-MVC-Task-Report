<?php
//TODO: switch MySQLi to PDO

class Database
{
    private $servername = "localhost";
    private $username = "sammy";
    private $password = "123456";
    private $dbname = "mvcdemo";
    private $connection;

    public function connect(){
        if ($this->connection === NULL) {
            //Create connection
            $this->connection = new mysqli($this->servername, $this->username, $this->password);

            //Check connection
            if ($this->connection->connect_error) {
                die("Connection failed: " . $this->connection->connect_error);
            }
            echo "Connection successful";
        }
        else echo "Already connected\n";

        $this->connection->close();
    }

    public function disconnect(){
        if (!$this->connection === NULL){
            $this->connection->close();
        }
    }
}

$data = new Database();
$data->connect();