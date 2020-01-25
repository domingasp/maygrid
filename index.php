<?php include ("connection.php"); ?>
<?php 
    $stmt = $conn->prepare("SELECT color, post_id FROM Post ORDER BY post_id ASC");
    $stmt->execute();
    $stmt->bind_result($color, $post_id);
?><!DOCTYPE html>
<html>
    <head>
        <meta name = "viewport" content = "width = device-width, initial-scale = 1, maximum-scale = 1">

        <link rel="icon" href="./assets/maygrid_logo.png">
        <link rel = "stylesheet" type = "text/css" href = "./css/all.css">
        <link rel = "stylesheet" type = "text/css" href = "./css/stylesheet.css">
    
        <title>Maygrid</title>
    </head>

    <body>
        <div class="header-main-div">
            <img class="header-logo" src="./assets/maygrid_logo.png" alt="Maygrid logo" />
            <span class="header-span">Pixel Board</span>
        </div>

        <div class="card-board-div" id="card-board-div-ID">

            <?php while ($stmt->fetch()) { ?>
                <a class="card-div-a" href="edit_pixel.php?pixel_id=<?php echo $post_id; ?>&color=<?php echo substr($color, 1); ?>"><div class="card-div" style="background-color: <?php echo $color; ?>"></div></a>
            <?php } ?>

        </div>

        <script src = "./js/script.js"></script>
    </body>
</html>