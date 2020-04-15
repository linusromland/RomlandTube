
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
            $fetchVideos = mysqli_query($con, "SELECT location FROM videos ORDER BY views DESC");
            $fetchId = mysqli_query($con, "SELECT id FROM videos ORDER BY views DESC");
            $fetchThumbs = mysqli_query($con, "SELECT thumb FROM videos ORDER BY views DESC");
            $fetchTitles = mysqli_query($con, "SELECT title FROM videos ORDER BY views DESC");
            $fetchviews = mysqli_query($con, "SELECT views FROM videos ORDER BY views DESC");
            $fetchuser = mysqli_query($con, "SELECT user FROM videos ORDER BY views DESC");
            //            the actuall loop that prints the right things
            for ($x = 0; $x <= 2; $x++) {
                $row = mysqli_fetch_assoc($fetchVideos);
                $vidLocation = $row['location'];
                $thumbLocation = mysqli_fetch_assoc($fetchThumbs)['thumb'];
                $title = mysqli_fetch_assoc($fetchTitles)['title'];
                $user = mysqli_fetch_assoc($fetchuser)['user'];
                $id2 = mysqli_fetch_assoc($fetchId)['id'];
                $views = mysqli_fetch_assoc($fetchviews)['views'];
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

        $printtitle = "SELECT title FROM videos WHERE id LIKE ".$id; 
        $fetchTitles = mysqli_query($con, $printtitle);
        $title = mysqli_fetch_assoc($fetchTitles)['title'];

        $printlocation = "SELECT location FROM videos WHERE id LIKE ".$id; 
        $fetchlocation = mysqli_query($con, $printlocation);
        $location = mysqli_fetch_assoc($fetchlocation)['location'];

        $printthumb = "SELECT thumb FROM videos WHERE id LIKE ".$id; 
        $fetchthumb = mysqli_query($con, $printthumb);
        $thumb = mysqli_fetch_assoc($fetchthumb)['thumb'];

        $printuser = "SELECT user FROM videos WHERE id LIKE ".$id; 
        $fetchusers = mysqli_query($con, $printuser);
        $user = mysqli_fetch_assoc($fetchusers)['user'];

        $printviews = "SELECT views FROM videos WHERE id LIKE ".$id; 
        $fetchviews = mysqli_query($con, $printviews);
        $views = mysqli_fetch_assoc($fetchviews)['views'];

        $printdate = "SELECT uploaddate FROM videos WHERE id LIKE ".$id; 
        $fetchdate = mysqli_query($con, $printdate);
        $date = mysqli_fetch_assoc($fetchdate)['uploaddate'];

        $printprofilepicture = "SELECT profilepicture FROM users WHERE username like '".$user."'"; 
        $fetchprofilepicture = mysqli_query($con, $printprofilepicture);
        $profilepicture = mysqli_fetch_assoc($fetchprofilepicture)['profilepicture'];

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

