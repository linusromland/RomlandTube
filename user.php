
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/header.css">
        <link rel="stylesheet" href="CSS/user.css">
        <link rel="stylesheet" href="CSS/footer.css">
        <meta charset="utf-8">
    </head>
    <body>
        <div>

            <?php
            include("header.php");
            require("backend/db.php");

            $query = $_SERVER['QUERY_STRING'];
            $fetchUser = mysqli_query($con, "SELECT * FROM users WHERE username LIKE '".$query."'");
            $userRow = mysqli_fetch_assoc($fetchUser);
            $id = $userRow['id'];   
            $username = $userRow['username'];


            $fetchVid = mysqli_query($con, "SELECT * FROM videos WHERE user LIKE '".$username."' order by id");

            $printprofilepicture = "SELECT * FROM users WHERE username like '".$username."'";
            $banner = mysqli_fetch_assoc(mysqli_query($con, $printprofilepicture))['banner'];
            $profilepicture = mysqli_fetch_assoc(mysqli_query($con, $printprofilepicture))['profilepicture'];

            while($row = mysqli_fetch_assoc($fetchVid)){
                $views = $row['views'];
                $numviews +=$views;
                $videos++;
            }


            echo "<div id=\"bannerandpic\">";
            echo "<img id=\"banner\" src=\"$banner\" width='25' height='25' alt='".$banner."'>";
            echo "<img id=\"pic\" src=\"$profilepicture\" width='25' height='25' alt='".$profilepicture."'>";
            echo "<h1 id=\"usertext\">".strtoupper($username)."</h1>";
            echo "<p id=\"numviews\">Videos: ".$videos."<br>Views: ".$numviews."</p>";
            echo "</div>";

            echo "<div id=\"videos\">";
            $fetchVid = mysqli_query($con, "SELECT * FROM videos WHERE user LIKE '".$username."' order by id");

            while($row = mysqli_fetch_assoc($fetchVid)){
                $id = $row['id'];
                $thumbLocation = $row['thumb'];
                $title = $row['title'];
                $views = $row['views'];


                echo "<div class=\"vid\">";
                echo "<a href=\"./view.php?$id\"><img src='".$thumbLocation."' controls width='400px' height='250px'></video><br></a>";
                echo "<a href=\"./view.php?$id\"><b>".$title."</b></a>";
                echo "<p id=\"views\">Views ".$views."</p>";
                echo "</div>";}
            echo "</div>";

            ?>
        </div>
        <?php 
        include("footer.html");?>
    </body>
</html>