
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
            <form>
                <?php

                $title = $_GET['search'];
                echo "<input class=\"search\" type=\"text\" name=\"search\" value=\"$title\" placeholder=\"Search\">";
                ?>
                <input type="submit" id="submit">
            </form>
        </div>
        <div id="main">
            <?php
            $title = $_GET['search'];
            $fetchVideos = mysqli_query($con, "SELECT * FROM videos WHERE title LIKE"." '%".$title."%' ORDER BY views DESC LIMIT 30");

            while($row = mysqli_fetch_assoc($fetchVideos)){
                $vidLocation = $row['location'];
                $thumbLocation = $row['thumb'];
                $title = $row['title'];
                $user = $row['user'];
                $id = $row['id'];
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
