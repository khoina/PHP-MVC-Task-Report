<?php
require_once __DIR__."/../model/GamesInteractor.php";

class GameInsertController
{
    private $game_interact;

    public function __construct()
    {
        $this->game_interact = new GamesInteractor();
    }

    public function includeform()
    {
        include "view/insert-form-view.php";
    }

    public function includecsv()
    {
        include "view/insert-csv-view.php";
    }

    public function uploadimg()
    {
        $target_dir = __DIR__ . "/../resources/";
        $target_file = $target_dir . basename($_FILES["input_image"]["name"]);
        $upload_ok = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (isset($_POST["upload"])) {
            //Check if is an image
            $check = getimagesize($_FILES["input_image"]["tmp_name"]);
            if ($check == false) {
                echo "The file is not an image!";
                $upload_ok = 0;
            }
        }

        //Check if file is already existed, if yes, try to renae the file
        if (file_exists($target_file)) {
            $new_name = rtrim($_FILES["input_image"]["name"], "." . $imageFileType)
                . "2." . $imageFileType;
            $_FILES["input_image"]["name"] = $new_name;
            $target_file = $target_dir . basename($_FILES["input_image"]["name"]);
        }

        //Check if the file is too large
        if ($_FILES["input_image"]["size"] > 500000) {
            echo "The file is too large!";
            $upload_ok = 0;
        }

        //Check if the file is supported
        if ($imageFileType != "jpg" && $imageFileType != "png") {
            echo "The type of image is unsupported (png or jpg only!)";
            $upload_ok = 0;
        }
        if ($upload_ok == 1) {
            move_uploaded_file($_FILES["input_image"]["tmp_name"], $target_file);
        }
    }

    public function uploadimg_file(&$file){
        $filetype = pathinfo($file,PATHINFO_EXTENSION);

        //Check if is an image
        $check = getimagesize($file);
        if ($check == false) {
            echo "The file is not an image!";
            return 0;
        }

        //Check if image is too big
        if (filesize($file) > 500000) {
            echo "The image is too big!";
            return 0;
        }

        //Check if image is supported, or give the file an extension if no extension found
        if ($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg") {
            if ($filetype == ""){
                rename($file, $file . ".jpeg");
                $file .= ".jpeg";
            }
            else{
            echo "Image type is unsupported!";
            return 0;
            }
        }
        return 1;
    }

    public function addgame()
    {
        $id = str_replace("'", "\'", $_POST["input_id"]);
        $name = str_replace("'", "\'", $_POST["input_name"]);
        $dev = str_replace("'", "\'", $_POST["input_developer"]);
        $publisher = str_replace("'", "\'", $_POST["input_publisher"]);
        $price = $_POST["input_price"];
        $this->uploadimg();
        $img = $_FILES["input_image"]["name"];
        if(!$this->general_validator($id))
            echo "This ID is already used!";
        else {
            $item = new Games($id, $name, $dev, $publisher, $price, $img);
            $this->game_interact->addGame($item);}
    }

    public function csvtoarray($file)
    {
        //map everything in the csv file into an array
        $csv = array_map('str_getcsv', file('game-import.csv'));
        //array_walk applies a function onto every element in the array
        //In this case, creates $a and combine them with first element (is actually an array of headers)
        //from the $csv array
        array_walk($csv, function (&$a) use ($csv) {
            $a = array_combine($csv[0], $a);
        });
        //arr_shift removes the first element from the array
        array_shift($csv);
        return $csv;
    }

    //Validates the id to prevent id duplication
    public function general_validator($id)
    {
        if ($id == "" or !isset($id)) {
            echo "ID is invalid!";
            return 0;
        }
        if ($this->game_interact->getGame($id)) {
            echo "ID already existed!";
            return 0;
        }
        return 1;
    }

    //Add multiple games via csv file
    public function addgame_csv()
    {
        //A upload directory because the images in the csv file are from URLs
        $upload_dir = __DIR__ . "/../resources/";
        $file_path = $_FILES["input_csv"];

        //Make sure it is a csv file
        if(pathinfo($file_path,PATHINFO_EXTENSION) != ".csv"){
            echo "Must be a file of csv type!";
            return;
        }

        //open the file and read it into array
        $csv_file = fopen($file_path["tmp_name"], "r") or die("Unable to read file!");
        $csv_array = $this->csvtoarray($csv_file);
        //close the file
        fclose($csv_file);

        //echo var_dump($csv_array)

        //Read each every elements available in the array
        foreach ($csv_array as $key => $item) {
            $id = trim($item["GameID"]);
            $name = trim($item["Name"]);
            $dev = trim($item["Developer"]);
            $publisher = trim($item["Publisher"]);
            $price = trim($item["Price"]);
            $img_url = trim($item["Image"]);
            $img_name = basename($img_url);
            //echo var_dump(filesize(file_get_contents($img_url)));

            //Validates id
            if (!$this->general_validator($id)){
                echo "1 item failed to upload \n";
                continue;
            }

            //Try to download the image from the URL
            if (file_put_contents($upload_dir . $img_name, file_get_contents($img_url))) {
                $file = $upload_dir . $img_name;
                //Check if image is valid, if not then delete the file to save space.
                if(!$this->uploadimg_file($file)){
                    echo "Image failed to upload";
                    unlink($file);
                    $img_name = null;
                } else
                    echo "Image added successfully ";
            } else
                $img_name = null;

            //Add the item to the database if everything is OK
            $newitem = new Games($id,$name,$dev,$publisher,$price,basename($file));
            $this->game_interact->addGame($newitem);
        }
        //echo var_dump($csv_array);
    }
}
