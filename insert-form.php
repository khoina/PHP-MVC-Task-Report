<?php
require_once ("controller/GameInsertController.php");
session_start();

//TODO: id must not be duplicate
?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
    $insert_controller = new GameInsertController();
    if(isset($_SESSION["login_name"]) and isset($_SESSION["login_password"])){
        if($_GET["insert_interact"] == "Insert via form"){
            $insert_controller->includeform();
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $insert_controller->addgame();
            }
        }
        if($_GET["insert_interact"] == "Insert via csv"){
            $insert_controller->includecsv();
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $insert_controller->addgame_csv();
            }
        } else
            echo "<div><h3>Invalid Access!</h3></div>";
    }
    else{
        echo "<div class='container-fluid text-center text-danger font-weight-bold h3 p-5'><div>
                You need to login first!</div>";
        echo "<div class='bg-danger mx-auto text-center rounded w-25'><h4><a href='admin-login.php'>To login page</a></h4></div></div>";
    }
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

