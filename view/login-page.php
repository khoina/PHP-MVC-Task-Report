

<html>
<head>
</head>
<body>
<form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <div>
        <div><?php echo $error?></div>
        <div>Login name: <input type="text" name="login_name"></div>
        <div>Password: <input type="password" name="login_password"></div>
    </div>
    <div><input type="submit"></div>



</body>
</html>
