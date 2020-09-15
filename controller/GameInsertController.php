<?php
require_once __DIR__."/../model/GamesInteractor.php";

class GameInsertController
{
    private $game_interact;
    public function __construct(){
        $this->game_interact = new GamesInteractor();
    }

    public function includeform(){
        include "view/insert-form-view.php";
    }

    public function uploadimg(){
        $target_dir = __DIR__ . "/../resources/";
        $target_file = $target_dir . basename($_FILES["input_image"]["name"]);
        $upload_ok = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if(isset($_POST["upload"])){
            //Check if is an image
            $check = getimagesize($_FILES["input_image"]["tmp_name"]);
            if($check == false){
                echo "The file is not an image!";
                $upload_ok = 0;
            }
        }

        //Check if file is already existed, if yes, try to renae the file
        if(file_exists($target_file)){
            $new_name = rtrim($_FILES["input_image"]["name"],"." . $imageFileType)
                        . "2." . $imageFileType;
            $_FILES["input_image"]["name"] = $new_name;
            $target_file = $target_dir . basename($_FILES["input_image"]["name"]);
        }

        //Check if the file is too large
        if($_FILES["input_image"]["size"] > 500000){
            echo "The file is too large!";
            $upload_ok = 0;
        }

        //Check if the file is supported
        if($imageFileType != "jpg" && $imageFileType != "png") {
            echo "The type of image is unsupported (png or jpg only!)";
            $upload_ok = 0;
        }
        if($upload_ok ==1){
            move_uploaded_file($_FILES["input_image"]["tmp_name"], $target_file);
        }
    }

    public function addgame(){
        $id = $_POST["input_id"];
        $name = $_POST["input_name"];
        $dev = $_POST["input_developer"];
        $publisher = $_POST["input_publisher"];
        $price = $_POST["input_price"];
        $this->uploadimg();
        $img = $_FILES["input_image"]["name"];
        $name = str_replace("'","\'",$name);
        $item = new Games($id,$name,$dev,$publisher,$price,$img);
        $this->game_interact->addGame($item);
    }
}