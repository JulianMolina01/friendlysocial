<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['profile']) || isset($_POST['post'])){
        $filename = basename($_FILES["fileUpload"]["name"]);
        $filetype = pathinfo($filename, PATHINFO_EXTENSION); // get file extension and check its type.
        if($filetype != "png" && $filetype != "jpg" && $filetype!= "jpeg" && $filetype != "gif" && $filetype != "pdf"){
            echo 'Only JPG, JPEG, PNG, GIF, and PDF formats are allowed.';
        }
        if(exif_imagetype($_FILES["fileUpload"]["tmp_name"]) || $filetype == "pdf"){ // Check if the file is actually an image or PDF.
            if(isset($_POST['profile'])){
                $success = 0;
                $filepath = "data/images/profiles/" . $_SESSION['user_id'] . '.' . $filetype;
                if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $filepath)){
                    $sql5 = "INSERT INTO posts (post_caption, post_public, post_time, post_by)
                            VALUES ('" . $row['user_firstname'] . " " . $row['user_lastname'] . " ha cambiado su foto de perfil.', 'N', NOW(), {$_SESSION['user_id']})";
                    $query5 = mysqli_query($conn, $sql5);
                    $last_id = mysqli_insert_id($conn);

                    if($filetype == "pdf"){ // Handle PDF files
                        $filepath2 = "data/pdf/posts/" . $last_id . '.' . $filetype;
                        copy($filepath, $filepath2);
                    } else { // Handle image files
                        $filepath2 = "data/images/posts/" . $last_id . '.' . $filetype;
                        copy($filepath, $filepath2);
                    }

                    if(!$query5)
                        echo mysqli_error($conn);
                    else
                        $success = 1;
                }
                if($success == 1) // Fix the comparison operator here
                    header("location:profile.php?id=" . $_SESSION['user_id']);
            }
            else if(isset($_POST['post'])){
                $filepath = "data/images/posts/" . $last_id . '.' . $filetype;
                if($filetype == "pdf"){ // Handle PDF files
                    $filepath = "data/pdf/posts/" . $last_id . '.' . $filetype;
                }
                if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $filepath)){
                    header("refresh:5; url=home.php");
                }
            }
        }
    }
}
?>
