<?php
//include auth_session.php file on all user panel pages
include("backend/auth_session.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Dashboard - Romland.Space</title>
        <link rel="stylesheet" href="CSS/header.css">
        <link rel="stylesheet" href="CSS/footer.css">
        <link rel="stylesheet" href="CSS/style.css">
    </head>
    <body>
        <?php
        include("header.php");
        ?>
        <div class="form">
            <a href="upload.php">Want to upload a video?</a>
        </div>

        <form method="post" action="backend/uploadpic.php" enctype="multipart/form-data">
            Select Profile Picture:<br>
            <input type="file" name="profilepic" accept="picture/*" required="">
            Select Banner Picture:<br>
            <input type="file" name="banner" accept="picture/*" required="">
            <br><br>Submit:<br>
            <input type="submit" value="Upload" name="upload">
        </form>
        <?php
        include("footer.html");
        ?>
    </body>
</html>
