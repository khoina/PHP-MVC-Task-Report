<?php
require_once __DIR__."/../model/LoginsInteractor.php";

class AdminLoginController
{
    private $login_interact;
    public $error;
    public function __construct(){
        $this->login_interact = new LoginsInteractor();
    }

    //Do a login page
    public function loginpage(){
        $error ="";
        include("view/login-page.php");
    }

    //Do a login action
    public function login($name, $password){
        if(empty(trim($name))){
            $error = "Please enter login name.";
        }
        elseif(empty(trim($password))){
            $error = "Please enter password.";
        }
        elseif(preg_match('/[^a-z]/i',$name) and preg_match('/[^0-9]/i',$name)){
            $error = "Username is invalid!";
        }
        else{
            $error ="";
        }
        $login_result = $this->login_interact->getLogin($name, $password);
        if(sizeof($login_result) > 0){
            include("view/admin-page.php");
        }
        else {
            $error = "Wrong username or password.";
            include("view/login-page.php");
        }
    }
}