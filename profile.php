<?php 
require 'functions/functions.php';
session_start();
ob_start();
// Check whether user is logged on or not
if (!isset($_SESSION['user_id'])) {
    header("location:index.php");
}
// Establish Database Connection
$conn = connect();
?>

<?php
if(isset($_GET['id']) && $_GET['id'] != $_SESSION['user_id']) {
    $current_id = $_GET['id'];
    $flag = 1;
} else {
    $current_id = $_SESSION['user_id'];
    $flag = 0;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Friendly | Perfil</title>
    <link rel="stylesheet" type="text/css" href="resources/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <style>
    .post{
        margin-right: 50px;
        float: right;
        margin-bottom: 18px;
    }
    .profile{
        margin-left: 50px;
        background-color: white;
        box-shadow: 0 0 5px #4267b2;
        width: 220px;
        padding: 20px;
    }
    input[type="file"]{
        display: none;
    }
    label.upload{
        cursor: pointer;
        color: white;
        background-color: #4267b2;
        padding: 8px 12px;
        display: inline-block;
        max-width: 80px;
        overflow: auto;
    }
    label.upload:hover{
        background-color: #23385f;
    }
    .changeprofile{
        color: #23385f;
        font-family: Fontin SmallCaps;
    }
    </style>
    <style type="text/css">
        #main_body{
            width: 100%;
            clear: both;
            margin: auto;
        }
        #divider{
            display: none;
        }
        @media only screen and (max-width: 600px) {
            /* Agrega aquí tus reglas de estilo específicas para dispositivos móviles */
            #main_body{
                width: 100%;
                clear: both;
                margin: auto;
            }
            .createpost{
                float: right;
            }
            .profile{
                float: left;
            }
            .usernav{
                display: grid;
                align-items: center;
                justify-items: center;
                justify-content: center;
            }
            .usernav li a{
                width: 100%;
                text-align: center;
            }
            .usernav select{
                width: 100%;
            }
            #divider{
                display: block;
            }
        }
        .minimalist-div {
            background-color: #f2f2f2;
            border: 1px solid #e6e6e6;
            border-radius: 5px;
            padding: 20px;
            margin: 20px;
            box-shadow: 2px 2px 5px #d9d9d9;
            text-align: center;
            line-height: 200px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div style="width: 100%; height: 150px; background-color: #333; float: left; background-image: url('public/img/servicio6.jpeg'); background-repeat: none; background-attachment: fixed; margin-bottom: 20px;">
            <span style="width: 100%; text-align: center; margin-top: 100px; float: left; color: #FFFFFF; font-size: 20px;">Estás visualizando la información del perfil.</span>
        </div>
        <?php include 'includes/navbar.php'; ?>
<div style="width: 80%; float: left;">
        <!--<h1 style="width: 90%; text-align: left; margin-left: 11%;">Perfil</h1>-->
        <?php
        $postsql;
        if($flag == 0) { // Your Own Profile       
            $postsql = "SELECT posts.post_caption, posts.post_time, users.user_firstname, users.user_lastname,
                                posts.post_public, users.user_id, users.user_gender, users.user_nickname,
                                users.user_birthdate, users.user_hometown, users.user_status, users.user_about, 
                                posts.post_id
                        FROM posts
                        JOIN users
                        ON users.user_id = posts.post_by
                        WHERE posts.post_by = $current_id
                        ORDER BY posts.post_time DESC";
            $profilesql = "SELECT users.user_id, users.user_gender, users.user_hometown, users.user_status, users.user_birthdate,
                                 users.user_firstname, users.user_lastname
                          FROM users
                          WHERE users.user_id = $current_id";
            $profilequery = mysqli_query($conn, $profilesql);
        } else { // Another Profile ---> Retrieve User data and friendship status
            $profilesql = "SELECT users.user_id, users.user_gender, users.user_hometown, users.user_status, users.user_birthdate,
                                    users.user_firstname, users.user_lastname, userfriends.friendship_status
                            FROM users
                            LEFT JOIN (
                                SELECT friendship.user1_id AS user_id, friendship.friendship_status
                                FROM friendship
                                WHERE friendship.user1_id = $current_id AND friendship.user2_id = {$_SESSION['user_id']}
                                UNION
                                SELECT friendship.user2_id AS user_id, friendship.friendship_status
                                FROM friendship
                                WHERE friendship.user1_id = {$_SESSION['user_id']} AND friendship.user2_id = $current_id
                            ) userfriends
                            ON userfriends.user_id = users.user_id
                            WHERE users.user_id = $current_id";
            $profilequery = mysqli_query($conn, $profilesql);
            $row = mysqli_fetch_assoc($profilequery);
            mysqli_data_seek($profilequery,0);
            if(isset($row['friendship_status'])){ // Either a friend or requested as a friend
                if($row['friendship_status'] == 1){ // Friend
                    $postsql = "SELECT posts.post_caption, posts.post_time, users.user_firstname, users.user_lastname,
                                        posts.post_public, users.user_id, users.user_gender, users.user_nickname,
                                        users.user_birthdate, users.user_hometown, users.user_status, users.user_about, 
                                        posts.post_id
                                FROM posts
                                JOIN users
                                ON users.user_id = posts.post_by
                                WHERE posts.post_by = $current_id
                                ORDER BY posts.post_time DESC";
                }
                else if($row['friendship_status'] == 0){ // Requested as a Friend
                    $postsql = "SELECT posts.post_caption, posts.post_time, users.user_firstname, users.user_lastname,
                                        posts.post_public, users.user_id, users.user_gender, users.user_nickname,
                                        users.user_birthdate, users.user_hometown, users.user_status, users.user_about, 
                                        posts.post_id
                                FROM posts
                                JOIN users
                                ON users.user_id = posts.post_by
                                WHERE posts.post_by = $current_id AND posts.post_public = 'Y'
                                ORDER BY posts.post_time DESC";
                }
            } else { // Not a friend
                $postsql = "SELECT posts.post_caption, posts.post_time, users.user_firstname, users.user_lastname,
                                    posts.post_public, users.user_id, users.user_gender, users.user_nickname,
                                    users.user_birthdate, users.user_hometown, users.user_status, users.user_about, 
                                    posts.post_id
                            FROM posts
                            JOIN users
                            ON users.user_id = posts.post_by
                            WHERE posts.post_by = $current_id AND posts.post_public = 'Y'
                            ORDER BY posts.post_time DESC";
            }
        }
        $postquery = mysqli_query($conn, $postsql);    
        if($postquery){
            // Posts
            $width = '40px'; 
            $height = '40px';
            if(mysqli_num_rows($postquery) == 0){ // No Posts
                if($flag == 0){ // Message shown if it's your own profile
                    echo '<div style="text-align: center; background-color: transparent; float: right; margin-top: 100px;">';
                    echo 'No tienes publicaciones aún';
                    echo '</div>';
                } else { // Message shown if it's another profile other than you.
                    echo '<div style="text-align: center; background-color: transparent; float: right; margin-top: 100px;">';
                    echo 'No hay publicaciones (Publicas) por mostrar';
                    echo '</div>';
                }
                include 'includes/profile.php';
            } else {
                while($row = mysqli_fetch_assoc($postquery)){
                    include 'includes/post.php';
                }
                // Profile Info
                include 'includes/profile.php';
                ?>
                <br>
                <?php if($flag == 0){?>
                <div class="profile">
                    <center class="changeprofile">Cambiar foto de perfil</center>
                    <br>
                    <form action="" method="post" enctype="multipart/form-data">
                        <center>
                            <label class="upload" onchange="showPath()">
                                <span id="path" style="color: white;">... Buscar</span>
                                <input type="file" name="fileUpload" id="selectedFile">
                            </label>
                        </center>
                        <br>
                        <input type="submit" value="Subir imagen" name="profile">
                    </form>
                </div>
                <br>
                <div class="profile">
                    <center class="changeprofile">Agregar numero de telefono</center>
                    <br>
                    <form method="post" onsubmit="return validateNumber()">
                        <center>
                            <input type="text" name="number" id="phonenum">
                            <div class="required"></div>
                            <br>
                            <input type="submit" value="Agregar" name="phone">
                        </center>
                    </form>
                </div>
                <br>
                <?php } ?>
                <?php
            }
        }
        ?>
</div>
    </div>
</body>
<script>
function showPath(){
    var path = document.getElementById("selectedFile").value;
    path = path.replace(/^.*\\/, "");
    document.getElementById("path").innerHTML = path;
}
function validateNumber(){
    var number = document.getElementById("phonenum").value;
    var required = document.getElementsByClassName("required");
    if(number == ""){
        required[0].innerHTML = "Debes escribir tu numero.";
        return false;
    } else if(isNaN(number)){
        required[0].innerHTML = "El número de telefono solo debe contener digitos."
        return false;
    }
    return true;
}
</script>
</html>
<?php include 'functions/upload.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // A form is posted
    if (isset($_POST['request'])) { // Send a Friend Request
        $sql3 = "INSERT INTO friendship(user1_id, user2_id, friendship_status)
                 VALUES ({$_SESSION['user_id']}, $current_id, 0)";
        $query3 = mysqli_query($conn, $sql3);
        if(!$query3){
            echo mysqli_error($conn);
        }
        header("Location: profile.php?id=" . $current_id);
    } else if(isset($_POST['remove'])) { // Remove
        $sql3 = "DELETE FROM friendship
                 WHERE ((friendship.user1_id = $current_id AND friendship.user2_id = {$_SESSION['user_id']})
                 OR (friendship.user1_id = {$_SESSION['user_id']} AND friendship.user2_id = $current_id))
                 AND friendship.friendship_status = 1";
        $query3 = mysqli_query($conn, $sql3);
        if(!$query3){
            echo mysqli_error($conn);
        }
    } else if(isset($_POST['phone'])) { // Add a Phone Number to Your Profile
        $sql3 = "INSERT INTO user_phone(user_id, user_phone) VALUES ({$_SESSION['user_id']},{$_POST['number']})";
        $query3 = mysqli_query($conn, $sql3);
        if(!$query3){
            echo mysqli_error($conn);
        } 
    }
    //sleep(4);
}
?>
