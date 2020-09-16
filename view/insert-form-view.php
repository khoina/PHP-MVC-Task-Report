<html>
<head>
</head>
<body>
<div class="container-fluid text-center h3 p-4 bg-dark text-light">Product Insert Form</div>
<div class="container-fluid">
    <div class="container text-center mx-auto bg-light rounded">
        <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="input_id">Game Id:</label>
                <input type="text" name="input_id" id="input_id" aria-describedby="IDHelp"
                       placeholder="Game ID" required>
                <small id="IDHelp" class="form-text text-muted">The ID must be different with existed IDs</small>
            </div>
            <div class="form-group">
                <label for="input_image">Game Thumbnail:</label>
                <input type="file" name="input_image" id="input_image">
            </div>
            <div class="form-group">
                <label for="input_name">Game Title:</label>
                <input type="text" name="input_name" id="input_name" aria-describedby="NameHelp"
                       placeholder="Game Title" required>
                <small id="NameHelp" class="form-text text-muted">The game's title</small>
            </div>
            <div class="form-group">
                <label for="input_developer">Developer:</label>
                <input type="text" name="input_developer" id="input_developer" aria-describedby="DevHelp"
                       placeholder="Developer" required>
                <small id="DevHelp" class="form-text text-muted">The game's developer</small>
            </div>
            <div class="form-group">
                <label for="input_publisher">Publisher:</label>
                <input type="text" name="input_publisher" id="input_publisher" aria-describedby="PublisherHelp"
                       placeholder="Publisher" required>
                <small id="PublisherHelp" class="form-text text-muted">The game's publisher</small>
            </div>
            <div class="form-group">
                <label for="input_price">Price:</label>
                <input type="number" step="0.01" name="input_price" id="input_price" aria-describedby="PriceHelp"
                       placeholder="Price" required>
                <small id="PriceHelp" class="form-text text-muted">The game's price ($USD)</small>
            </div>
            <input type="submit" value="submit" name="upload">
        </form></div>
</div>
</body>
</html>
