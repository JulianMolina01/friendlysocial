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
    <title>Friendly | Solicitus de seguimiento</title>
    <link rel="stylesheet" type="text/css" href="resources/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
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
        <h1>Solicitus de seguimiento</h1>
        <?php
        // Responding to Request
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_GET['accept'])) {
                $sql = "UPDATE friendship
                        SET friendship.friendship_status = 1
                        WHERE friendship.user1_id = {$_GET['id']} AND friendship.user2_id = {$_SESSION['user_id']}";
                $query = mysqli_query($conn, $sql);
                if($query){
                    echo '<div class="userquery">';
                    echo 'Has aceptado a ' . $_GET['name'];
                    echo '<br><br>';
                    echo 'Redireccionando en 5 segundos';
                    echo '<br><br>';
                    echo '</div>';
                    echo '<br>';
                    header("refresh:5; url=requests.php" );
                }
                else{
                    echo mysqli_error($conn);
                }
            } else if(isset($_GET['ignore'])) {
                $sql6 = "DELETE FROM friendship
                        WHERE friendship.user1_id = {$_GET['id']} AND friendship.user2_id = {$_SESSION['user_id']}";
                $query6 = mysqli_query($conn, $sql6);
                if($query6){
                    echo '<div class="userquery">';
                    echo 'Has ignorado a ' . $_GET['name'];
                    echo '<br><br>';
                    echo 'Redireccionando en 5 segundos';
                    echo '<br><br>';
                    echo '</div>';
                    echo '<br>';
                    header("refresh:5; url=requests.php" );
                }
            }
        }
        //
        ?>
        <?php
        $sql = "SELECT users.user_gender, users.user_id, users.user_firstname, users.user_lastname
                FROM users
                JOIN friendship
                ON friendship.user2_id = {$_SESSION['user_id']} AND friendship.friendship_status = 0 AND friendship.user1_id = users.user_id";
        $query = mysqli_query($conn, $sql);
        $width = '168px';
        $height = '168px';
        if(!$query)
            echo mysqli_error($conn);
        if($query){
            if(mysqli_num_rows($query) == 0){
                echo '<div class="userquery">';
                echo 'No tienes solicitudes de seguimiento aún.';
                echo '<br><br>';
                echo '</div>';
            }
            while($row = mysqli_fetch_assoc($query)){
                echo '<div class="userquery">';
                include 'includes/profile_picture.php';
                echo '<br>';
                echo '<a class="profilelink" href="profile.php?id=' . $row['user_id'] .'">' . $row['user_firstname'] . ' ' . $row['user_lastname'] . '<a>';
                echo '<form method="get" action="requests.php">';
                echo '<input type="hidden" name="id" value="' . $row['user_id'] . '">';
                echo '<input type="hidden" name="name" value="' . $row['user_firstname'] . '">';
                echo '<input type="submit" value="Aceptar" name="accept">';
                echo '<br><br>';
                echo '<input type="submit" value="Ignorar" name="ignore">';
                echo '<br><br>';
                echo'</form>';
                echo '</div>';
                echo '<br>';
            }
        }
        ?>
    </div>
</body>
</html>