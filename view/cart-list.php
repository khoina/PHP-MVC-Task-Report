<html>
<head>
</head>
<body>
<div class="container-fluid text-center h3 p-4 bg-info text-light">Cart</div>
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
        $total_price = 0;
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
            $total_price += (float)ltrim($value->price, '$');
        }
        ?>
        </tbody>
    </table>
    <?php echo "Total price: " . $total_price; ?>
</div>

</body>
</html>