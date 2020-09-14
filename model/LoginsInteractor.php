<?php

require_once ("Database.php");
require_once ("Logins.php");

class LoginsInteractor
{
//Uses query to find any valid login from the database's table "Employees"
    public function getLogin($name, $password)
    {
        $result = array();
        try {
            $db = new Database();
            $db->connect();
            $query = $db->getConnection()->prepare("SELECT * FROM Employees 
                                                    WHERE EmployeePassword = md5('". $password ."') 
                                                    AND EmployeeLoginName = '". $name ."';");
            $query->execute();
            foreach ($query->fetchAll() as $data) {
                $item = new Logins($data[0], $data[1], $data[2], $data[3]);
                array_push($result, $item);
            }
            $db->disconnect();
        } catch (PDOException $pdo_exception) {
            echo "Error: " . $pdo_exception->getMessage() . "\n";
        }

        return $result;
    }
}

//$li = new LoginsInteractor();

//var_dump($li->getLogin("hekealuv2", "hekea5"));
