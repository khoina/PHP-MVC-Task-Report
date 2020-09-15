<?php
if(array_key_exists('log_out', $_POST)){
    $this->logout();
    header("Refresh:0");
}
?>
<html>
<head>
</head>
<body>
<div class="container-fluid text-center h3 p-4 bg-dark text-light">Administrator Login Page</div>
<div class="container bg-light mx-auto mt-2 mb-2">
    <form method="post">
        <input type="submit" class="button" name="log_out" value="Log out"></form>
    <div class="h3">Login Info:
    <?php
    $game_controller = new GameController();
    $login_info = $login_result[0];
    echo $login_info->name;

    $game_controller->viewall_table();
    ?>
    </div>
</div>


</body>
</html>
