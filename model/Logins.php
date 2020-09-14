<?php

class Logins
{
    private $id;
    public $name;
    public $login;
    private $password;

    /**
     * Logins constructor.
     * @param $id
     * @param $name
     * @param $login
     * @param $password
     */
    public function __construct($id, $name, $login, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }
}