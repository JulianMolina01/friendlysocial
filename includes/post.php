<?php

echo '<div class="post" style="height: auto; width: 50%; border-radius: 5px;" class="minimalist-div">';
if($row['post_public'] == 'Y') {
    echo '<p class="public">';
    echo 'Publico';
}else {
    echo '<p class="public">';
    echo 'Privado';
}
echo '<br>';
echo '<span class="postedtime">' . $row['post_time'] . '</span>';
echo '</p>';
echo '<div>';
include 'profile_picture.php';
echo '<a class="profilelink" href="profile.php?id=' . $row['user_id'] .'">' . $row['user_firstname'] . ' ' . $row['user_lastname'] . '<a>';
echo "<hr style='width: 100%;'>";
echo'</div>';
echo '<br>';
echo '<p class="caption">' . $row['post_caption'] . '</p>';
echo '<center>'; 
$target = glob("data/images/posts/" . $row['post_id'] . ".*");
$target2 = glob("data/pdf/posts/" . $row['post_id'] . ".*");
if($target) {
    echo '<img src="' . $target[0] . '" style="max-width:580px">'; 
    echo '<br><br>';
}
if($target2) {
    echo '<iframe src="' . $target2[0] . '" style="width:100%;height: 700px; float: left; border: 0px;"></iframe>';
    echo '<br><br>';
}
echo '</center>';

//======================== Me gusta y Reportar ===================/
echo "<div style='background-color: transparent; width: 100%; height: 40px;'>";
    echo "<ul style='width: auto; float: right;'>";
        echo "<li style='float: left; margin-right: 20px;'><a href='#' style='color: red;'>Me gusta (100)</a></li>";
        echo "<li style='float: left;'><a href='#'>Reportar</a></li>";
    echo "</ul>";
echo "</div>";

//================ Caja de comentarios =============//
echo "<div style='background-color: transparent; width: 100%; height: auto'>";
    echo "<textarea placeholder='Escribe un comentario...'></textarea>";
    echo "<input type='submit' value='Comentar' name='comment' style='width: auto; float: right;'>";
echo "</div>";

echo '</div>';

?>