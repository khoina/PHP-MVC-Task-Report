<html>
<head>
</head>
<body>
<div class="container-fluid text-center h3 p-4 bg-info text-light">Product Info</div>
<div class="container-fluid">
    <div class="container text-center mx-auto bg-light rounded">
        <?php
        echo "<div class='m-3'><img src='resources/". $game->image ."' 
                    alt='Placeholder Pic' class='img-thumbnail' width='200' height='200'></div>";
        echo "Title: " . $game->name . "<br>";
        echo "Developer: " . $game->developer . "<br>";
        echo "Publisher: " . $game->publisher . "<br>";
        ?></div>
</div>


</body>
</html>
