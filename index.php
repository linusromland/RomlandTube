
<?php
require("config.php");
?>

<!doctype html>
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
                <input class="search" type="text" name="search_box" value="Search"required>
                <input type="submit" id="submit">
            </form>
        </div>
        <div id="main">
            <?php 
            $fetchVideos = mysqli_query($con, "SELECT location FROM videos ORDER BY views DESC");
            $fetchId = mysqli_query($con, "SELECT id FROM videos ORDER BY views DESC");
            $fetchThumbs = mysqli_query($con, "SELECT thumb FROM videos ORDER BY views DESC");
            $fetchTitles = mysqli_query($con, "SELECT title FROM videos ORDER BY views DESC");
            $fetchviews = mysqli_query($con, "SELECT views FROM videos ORDER BY views DESC");
            $fetchuser = mysqli_query($con, "SELECT user FROM videos ORDER BY views DESC");
            while($row = mysqli_fetch_assoc($fetchVideos)){
                $vidLocation = $row['location'];
                $thumbLocation = mysqli_fetch_assoc($fetchThumbs)['thumb'];
                $title = mysqli_fetch_assoc($fetchTitles)['title'];
                $user = mysqli_fetch_assoc($fetchuser)['user'];
                $id = mysqli_fetch_assoc($fetchId)['id'];
                $views = mysqli_fetch_assoc($fetchviews)['views'];


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
