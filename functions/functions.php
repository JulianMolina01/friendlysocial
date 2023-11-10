<?php
// Establish Connection to Database
function connect() {
    static $conn;
    if ($conn === NULL){ 
        $conn = mysqli_connect('localhost','socialnetwork','123Password123!','socialnetwork');
    }
    return $conn;
}

?>
