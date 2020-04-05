
<?php
require("config.php");
?>
<html>
    <head>
        <link rel="stylesheet" href="CSS/header.css">
        <link rel="stylesheet" href="CSS/footer.css">
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/view.css">

    </head>
    <body>
        <?php
        include("header.php");
        ?>
        <div id="recommend">
            <p id="recommendations"><b>Recommendations</b></p>
        </div>
        <?php
        $id = $_SERVER['QUERY_STRING'];

        $printtitle = "SELECT title FROM videos WHERE id LIKE ".$id; 
        $fetchTitles = mysqli_query($con, $printtitle);
        $title = mysqli_fetch_assoc($fetchTitles)['title'];

        $printlocation = "SELECT location FROM videos WHERE id LIKE ".$id; 
        $fetchlocation = mysqli_query($con, $printlocation);
        $location = mysqli_fetch_assoc($fetchlocation)['location'];

        $printuser = "SELECT user FROM videos WHERE id LIKE ".$id; 
        $fetchusers = mysqli_query($con, $printuser);
        $user = mysqli_fetch_assoc($fetchusers)['user'];

        $printviews = "SELECT views FROM videos WHERE id LIKE ".$id; 
        $fetchviews = mysqli_query($con, $printviews);
        $views = mysqli_fetch_assoc($fetchviews)['views'];

        $views = $views + 1;
        $query2 = "UPDATE videos SET views = $views WHERE id = ".$id.";";
        mysqli_query($con,$query2);

        echo "<div id=\"video\">";
        echo "<video width=\"1040\" height=\"650\" controls>";
        echo "<source src=\"$location\" type=\"video/mp4\">";
        echo "</video>";
        echo "<p id=\"vidtitle\"><b>$title<b></p>";
        echo "<p id=\"numviews\">Views: $views</p>";
        echo "<p id=\"uploadedby\">Uploaded by: <a href=\"./user.php?$user\">$user</a></p>";
        echo "</div>";
        ?>
        <?php
        include("footer.html");
        ?>

    </body>
</html>

