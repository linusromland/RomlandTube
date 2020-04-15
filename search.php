<?php
require("config.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/header.css">
        <link rel="stylesheet" href="CSS/videos.css">
        <link rel="stylesheet" href="CSS/footer.css">
        <title>Videos - RomlandTube</title>
    </head>
    <body>
        <?php 
        include("header.php");?>
        <div id="searchdiv">
            <form >
                <?php

                $title = $_GET['search'];
                echo "<input class=\"search\" type=\"text\" name=\"search_box\" value=\"$title\" required>";
                ?>
                <input type="submit" id="submit">
            </form>
        </div>

        <div id="main">
            <?php 

            

            while($row = mysqli_fetch_assoc($fetchid)){
                $id = $row['id'];
                $thumbLocation = $row['thumb'];
                $title = $row['title'];
                $user = $row['user'];
                $views = $row['views'];


                echo "<div class=\"vid\">";
                echo "<a href=\"./view.php?$id\"><img src='".$thumbLocation."' width='344' height='215' alt='".thumbnail."'><br></a>";
                echo "<a href=\"view.php?$id\"><b>".$title."</b></a>";
                echo "<p id=\"views\">".$views." Views</p>";
                echo "<p id=\"upby\"><b>Uploaded by</b> <a href=\"./user.php?$user\">$user</a></p>";
                echo "</div>";
            }
            ?>
        </div>
        <?php 
        include("footer.html");?>
    </body>
</html>
