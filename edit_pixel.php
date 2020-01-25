<?php include ("connection.php"); ?>
<?php
    if (isset($_GET["pixel_id"]) && isset($_GET["color"])) {
        $pixel_id = $_GET["pixel_id"];
        $color = "#" . $_GET["color"];

        if ($_POST) {
            $post_color = $_POST["post_color"];
            $time_posted = date("Y-m-d H:i:s", time());

            $stmt = $conn->prepare("UPDATE Post SET color = ?, time_posted = ?, original = 0 WHERE post_id = ?");
            $stmt -> bind_param("sss", $post_color, $time_posted, $pixel_id);
            $stmt -> execute();
            $stmt -> close();


            // TODO: Change to actual url
            header("Location: index.php");
            die();
        }
    } else {
        header("Location: index.php");
        die();
    }

?><!DOCTYPE html>
<html>
    <head>
        <meta name = "viewport" content = "width = device-width, initial-scale = 1, maximum-scale = 1">

        <link rel="icon" href="./assets/maygrid_logo.png">
        <link rel = "stylesheet" type = "text/css" href = "./css/all.css">
        <link rel = "stylesheet" type = "text/css" href = "./css/stylesheet.css">
    
        <title>Maygrid</title>
    </head>

    <body onload="editPixelPage()">
        <div class="header-main-div">
            <a href="index.php"><img class="header-logo" src="./assets/maygrid_logo.png" alt="Maygrid logo" /></a>
            <span class="header-span">Edit Pixel</span>
        </div>

        <form class="color-form" method="post" action="edit_pixel.php?pixel_id=<?php echo $pixel_id; ?>&color=<?php echo $color; ?>">
            <label class="color-label" for="post_color">Select Pixel Color:</label>
            <div id="post_color_wrapper">
                <input class="color-input" type="color" name="post_color" id="post_color" value="<?php echo $color; ?>" onfocus="addFocus()" onblur="loseFocus()">
            </div>
            <input class="color-submit-btn" type="submit">
        </form>

        <script src = "./js/script.js"></script>
    </body>
</html>