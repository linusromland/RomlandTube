<!doctype html>
<html>
    <head>
        <?php
        require('config.php');
        require('db.php');
        include('auth_session.php');

        if(isset($_POST['upload'])){
            $loggedinuser = $_SESSION['username'];
            $row = mysqli_fetch_assoc(mysqli_query($con, "SELECT id FROM users WHERE username LIKE"." '%".$loggedinuser."%'"));
            $id = $row['id'];

            echo $loggedinuser;
            echo $id;

            $ok = 0;

            $maxsize = 536870912; // 5MB

            $file_vid = $_FILES['profilepic'];
            $name_vid = $file_vid['name'];
            $target_dir_vid = "../profilepicture/";
            $target_dir_vid_2 = "profilepicture/";

            $target_file_vid = $target_dir_vid . $name_vid;

            $file_thumb = $_FILES['banner'];
            $name_thumb = $file_thumb['name'];
            $target_dir_thumb = "../banner/";
            $target_dir_thumb_2 = "banner/";

            $target_file_thumb = $target_dir_thumb . $name_thumb;

            // Select file type
            $filetype_vid = strtolower(pathinfo($target_file_vid,PATHINFO_EXTENSION));
            $filetype_thumb = strtolower(pathinfo($target_file_thumb,PATHINFO_EXTENSION));

            // Valid file extensions
            $extensions_arr_thumb = array("png", "jpg", "jpeg");
            $extensions_arr_banner = array("png", "jpg", "jpeg");


            //VID
            // Check extension
            if(in_array($filetype_vid,$extensions_arr_thumb) && in_array($filetype_thumb,$extensions_arr_banner)){

                // Check file size
                if(($file_vid['size'] >= $maxsize) || ($file_vid["size"] == 0) || ($file_thumb['size'] >= $maxsize) || ($file_thumb["size"] == 0)) {
                    echo "File too large. File must be less than 5MB.";
                }else{

                    $target_file_vid = $target_dir_vid . $id . "." . $filetype_vid;
                    $target_file_thumb = $target_dir_thumb . $id . "." . $filetype_thumb;


                    if(move_uploaded_file($file_vid['tmp_name'],$target_file_vid) && move_uploaded_file($file_thumb['tmp_name'],$target_file_thumb)){
                        $target_file_vid = $target_dir_vid_2 . $id . "." . $filetype_vid;
                        
                        $target_file_thumb = $target_dir_thumb_2 . $id . "." . $filetype_thumb;
                        
                        // Insert record
                        $query2 = "UPDATE users SET profilepicture = '".$target_file_vid."', banner = '".$target_file_thumb."' WHERE id = ".$id.";";
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
