
<?php
require("config.php");
?>

<!doctype html>
<html>
  <body>
            <?php readfile("header.html");?>

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

 
       echo "<div >";
       echo "<a href=\"./view.php?$id\"><img src='".$thumbLocation."' controls width='320px' height='200px'></video><br></a>";
       echo "<a href=\"view.php?$id\"><b>".$title."</b></a>";
        echo "<p>Views ".$views."</p>";
       echo "<p>Uploaded by <a href=\"./user.php?$user\">$user</a></p>";
       echo "</div>";
     }
     ?>
    
  </body>
</html>
