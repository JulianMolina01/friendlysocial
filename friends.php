<?php 
require 'functions/functions.php';
session_start();
// Check whether user is logged on or not
if (!isset($_SESSION['user_id'])) {
    header("location:index.php");
}
// Establish Database Connection
$conn = connect();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Friendly | Amigos</title>
    <link rel="stylesheet" type="text/css" href="resources/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <style>
    .frame a{
        text-decoration: none;
        color: #4267b2;
    }
    .frame a:hover{
        text-decoration: underline;
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
    </style>
</head>
<body>
    <div class="container">
        <?php include 'includes/navbar.php'; ?>
        <h1>Amigos (Con quienes compartes conocimientos)</h1>
        <?php
            echo '<center>'; 
            $sql = "SELECT users.user_id, users.user_firstname, users.user_lastname, users.user_gender
                    FROM users
                    JOIN (
                        SELECT friendship.user1_id AS user_id
                        FROM friendship
                        WHERE friendship.user2_id = {$_SESSION['user_id']} AND friendship.friendship_status = 1
                        UNION
                        SELECT friendship.user2_id AS user_id
                        FROM friendship
                        WHERE friendship.user1_id = {$_SESSION['user_id']} AND friendship.friendship_status = 1
                    ) userfriends
                    ON userfriends.user_id = users.user_id";
            $query = mysqli_query($conn, $sql);
            $width = '168px';
            $height = '168px';
            if($query){
                if(mysqli_num_rows($query) == 0){
                    echo '<div class="post">';
                    echo 'No tienes amigos con quien compartir conocimientos aún.';
                    echo '</div>';
                } else {
                    while($row = mysqli_fetch_assoc($query)){
                    echo '<div class="frame">';
                    echo '<center>';
                    include 'includes/profile_picture.php';
                    echo '<br>';
                    echo '<a href="profile.php?id=' . $row['user_id'] . '">' . $row['user_firstname'] . ' ' . $row['user_lastname'] . '</a>';
                    echo '<br><br><a href="remove_friend.php?f='. $row['user_id'] .'&m='. $_SESSION['user_id'] .'" style="color: brown;">Eliminar</a>';
                    echo '</center>';
                    echo '</div>';
                    }
                }
            }
            echo '</center>';
        ?>
    </div>
</body>
</html>