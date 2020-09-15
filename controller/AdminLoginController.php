<?php
require_once __DIR__ . "/../model/LoginsInteractor.php";

class AdminLoginController
{
    private $login_interact;
    public $err_message;

    public function __construct()
    {
        $this->login_interact = new LoginsInteractor();
    }

    //Do a login page
    public function loginpage()
    {
        $err_message = "";
        include("view/login-page.php");
    }

    //Validate the login inputs
    public function login_validate($name, $password)
    {
        $error = "";
        if (empty(trim($name))) {
            $error = "Please enter login name.";
        } elseif (empty(trim($password))) {
            $error = "Please enter password.";
        } elseif (preg_match('/[\W]/i', $name)) {
            $error = "Username is invalid!";
        }
        $this->err_message = $error;
    }

    //Do a login action
    public function login($name, $password)
    {
        $this->login_validate($name,$password); //Check password validation
        if($this->err_message != ""){
            //Turn back to the login page along with the error message;
            include ("view/login-page.php");
        } else{
            $login_result = $this->login_interact->getLogin($name, $password);
            if (sizeof($login_result) > 0) {
                //If logged in successfully, save the login infos in the session to keep the logged
                //in status active
                $_SESSION["login_name"] = $name;
                $_SESSION["login_password"] = $password;
                include("view/admin-page.php");
            } else {
                $err_message = "Wrong username or password.";
                include("view/login-page.php");
            }
        }
    }
    public function logout(){
        //kill login session
        $this->err_message = "";
        $_SESSION["login_name"] = null;
        $_SESSION["login_password"] = null;
    }
}