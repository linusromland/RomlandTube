<html>
<head>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
<?php
    include "backend/config.php";
    readfile("header.html");
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

        
    echo "<video controls>";
    echo "<source src=\"$location\" type=\"video/mp4\">";
    echo "</video>";
    echo "<h1>$title</h1>";
    echo "<p>Views: $views</p>";
    echo "<p>Uploaded by <a href=\"./user.php?$user\">$user</a></p>";
?>
</body>
</html>

