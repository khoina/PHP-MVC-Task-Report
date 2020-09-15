<html>
<head>
</head>
<body>
    <div class="container-fluid text-center h3 p-4 bg-info text-light">Product List</div>
    <div class="container-fluid text-center mt-4">
    <div class="row align-center w-auto mx-auto">
    <?php
    foreach($games as $key => $value){
            echo "<div class='col bg-light rounded pl-3 pr-3 m-2'>";
            echo "<img src='resources/". $value->image ."' 
                    alt='Placeholder Pic' class='img-thumbnail' width='200' height'200'>";
            echo '<h3><a href="index.php?game=' . $value->name . '">' . $value->name . '</a></h3><br>';
            echo $value->id . '<br>';
            echo "Developer: " . $value->developer . '<br>';
            echo "Publisher: " . $value->publisher .'<br>';
            echo "<h4>" . $value->price .'<br></h4>';
            echo "</div>";
        }
    ?></div></div>


</body>
</html>
