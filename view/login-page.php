

<html>
<head>
</head>
<body>
<div class="container-fluid text-center h3 p-4 bg-dark text-light">Administrator Login Page</div>
<div class="container w-50 p-4 rounded bg-light mx-auto mt-2 mb-2">
    <div class="mx-auto w-50">
<form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <div>
        <div><?php echo $err_message?></div>
        <div>Login name: <div class="text-center"><input type="text" name="login_name"></div></div>
        <div>Password: <div class="text-center"><input type="password" name="login_password"></div></div>
    </div>
    <div class="text-center"><input type="submit" value="Sign in"></div>
</form>
    </div>
</div>


</body>
</html>
