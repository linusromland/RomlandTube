<?php include('b.html');?>
<!doctype html>
<html>
    <head>
        <?php
        require('config.php');
        require('db.php');
        include('auth_session.php');

        if(isset($_POST['upload'])){

            $ok = 0;

            $maxsize = 5368709120; // 5MB

            $title = $_POST['title'];

            $file_vid = $_FILES['video'];
            $name_vid = $file_vid['name'];
            $target_dir_vid = "../profilepicture/";
            $target_dir_vid_2 = "profilepicture/";

            $target_file_vid = $target_dir_vid . $name_vid;

            $file_thumb = $_FILES['thumbnail'];
            $name_thumb = $file_thumb['name'];
            $target_dir_thumb = "../thumbnails/";
            $target_dir_thumb_2 = "thumbnails/";

            $target_file_thumb = $target_dir_thumb . $name_thumb;

            // Select file type
            $filetype_vid = strtolower(pathinfo($target_file_vid,PATHINFO_EXTENSION));
            $filetype_thumb = strtolower(pathinfo($target_file_thumb,PATHINFO_EXTENSION));

            // Valid file extensions
            $extensions_arr_vid = array("mp4");
            $extensions_arr_thumb = array("png","jpg","jpeg","svg");

            //VID
            // Check extension
            if(in_array($filetype_vid,$extensions_arr_vid) && in_array($filetype_thumb,$extensions_arr_thumb) && $title!=null){

                // Check file size
                if(($file_vid['size'] >= $maxsize) || ($file_vid["size"] == 0) || ($file_thumb['size'] >= $maxsize) || ($file_thumb["size"] == 0)) {
                    echo "File too large. File must be less than 5GB.";
                }else{

                    // Upload
                    $query1 = "INSERT INTO videos(title,location,thumb, user, views) VALUES('tmp','tmp','tmp','tmp','0');";
                    mysqli_query($con,$query1);

                    $id = mysqli_insert_id($con);

                    $target_file_vid = $target_dir_vid . $id . "." . $filetype_vid;
                    $target_file_thumb = $target_dir_thumb . $id . "." . $filetype_thumb;

                    if(move_uploaded_file($file_vid['tmp_name'],$target_file_vid) && move_uploaded_file($file_thumb['tmp_name'],$target_file_thumb)){
                        $target_file_vid = $target_dir_vid_2 . $id . "." . $filetype_vid;
                        $target_file_thumb = $target_dir_thumb_2 . $id . "." . $filetype_thumb;
                        // Insert record
                        $query2 = "UPDATE videos SET title = '".$title."',location = '".$target_file_vid."', thumb = '".$target_file_thumb."', user = '".$_SESSION["username"]."' WHERE id = ".$id.";";
                        mysqli_query($con,$query2);
                        echo "Upload successful";
                    }else{
                        echo "Failed to move file";

                    } 
                }

            }else{
                echo "Invalid file extension.";
            }

        }else{
            echo "get outta here, you need you submit form!";
        } 
        ?>
    </head>
</html>
