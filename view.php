
<?php
require("config.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <!--       imports all the right css-->
        <link rel="stylesheet" href="CSS/header.css">
        <link rel="stylesheet" href="CSS/footer.css">
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/view.css">

        <!--        CSS And JavaScript for Videoplayer-->
        <link rel="stylesheet" href="https://cdn.plyr.io/3.5.10/plyr.css">

        <title>View - RomlandTube</title>

    </head>
    <body>
        <?php
        include("header.php");
        ?>
        <div id="recommend">
            <p id="recommendations"><b>Recommendations</b></p>
            <!--            php stuff for importing and showing the recommended videos-->
            <?php 
            $id = $_SERVER['QUERY_STRING'];
            $fetchVideos = mysqli_query($con, "SELECT * FROM videos ORDER BY views DESC");
            //            the actuall loop that prints the right things
            for ($x = 0; $x <= 2; $x++) {
                $row = mysqli_fetch_assoc($fetchVideos);
                $vidLocation = $row['location'];
                $thumbLocation = $row['thumb'];
                $title = $row['title'];
                $user = $row['user'];
                $id2 = $row['id'];
                $views = $row['views'];
                if($id2 != $id){
                    echo "<div class=\"vid\">";
                    echo "<a class=\"vida\" href=\"./view.php?$id2\"><img src='".$thumbLocation."' alt='".thumbnail."'><br></a>";
                    echo "<a href=\"view.php?$id2\" id=\"rectext\"><b>".$title."</b></a>";
                    echo "</div>";
                }
                else{
                    $x--;
                }
            }
            ?>
        </div>
        <!--        where it connects to the database to get the correct information for the video-->
        <?php
        $id = $_SERVER['QUERY_STRING'];

        $printtitle = "SELECT * FROM videos WHERE id LIKE ".$id; 
        $fetch = mysqli_query($con, $printtitle);
        $row = mysqli_fetch_assoc($fetch);
        $title = $row['title'];
        $location = $row['location'];
        $thumb = $row['thumb'];
        $user = $row['user'];
        $views = $row['views'];
        $date = $row['uploaddate'];

        $printprofilepicture = "SELECT profilepicture FROM users WHERE username like '".$user."'";  
        $profilepicture = mysqli_fetch_assoc(mysqli_query($con, $printprofilepicture))['profilepicture'];

        echo "<div id=\"video\">";
        echo "<video poster=\"$thumb\" id=\"player\" playsinline controls>";
        echo "<source src=\"$location\" type=\"video/mp4\">";
        echo "</video>";
        echo "<a id=\"profilepicture\" href=\"./user.php?$user\"><img src=\"$profilepicture\" width='25' height='25' alt='".$profilepicture."'><br></a>";
        echo "<div id=\"vidinfo\">";
        echo "<p id=\"vidtitle\"><b>$title</b></p>";
        echo "<p id=\"numviews\">Views: $views</p>";
        echo "<p id=\"uploadedby\">Uploaded by: <a href=\"./user.php?$user\">$user</a></p>";
        echo "<p id=\"uploadedby\" class=\"date\">$date</p>";
        echo "</div>";
        echo "</div>";
        $views = $views + 1;
        $query2 = "UPDATE videos SET views = $views WHERE id = ".$id.";";
        mysqli_query($con,$query2);
        include("footer.html");
        ?>
        <script src="https://cdn.plyr.io/3.5.10/plyr.js"></script>

    </body>
</html>

