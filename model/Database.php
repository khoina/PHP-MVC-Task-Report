<?php

class Database
{
    //The properties
    private $servername = "localhost";
    private $username = "sammy";
    private $password = "123456";
    private $connection = null;

    /**
     * @return null
     */
    public function getConnection()
    {
        return $this->connection;
    }

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
}
