<html>
<head>
</head>
<body>
<div class="container-fluid text-center h3 p-4 bg-info text-light">Product Table</div>
<div class="container-fluid text-center mt-4">
    <div>
        <form action="insert-form.php"><input type="submit" name="insert_interact" value="Insert via form">
        <input type="submit" name="insert_interact" value="Insert via csv"></form>

    </div>
   <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Developer</th>
            <th scope="col">Publisher</th>
            <th scope="col">Price</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($games as $key => $value){
            echo "<tr>";
            echo "<th scope='row'>" . $value->id . '</th>>';
            echo "<td><img src='resources/". $value->image ."' 
                    alt='Placeholder Pic' class='img-thumbnail' width='50' height'50'></td>";
            echo "<td>" . $value->name . '</td>';
            echo "<td>" . $value->developer . '</td>';
            echo "<td>" . $value->publisher .'</td>';
            echo "<td>" . $value->price .'</td>';
            echo "</tr>";
        }
        ?>
        </tbody>
    </table></div>

</body>
</html>