<div class="usernav" style="position: fixed; z-index: 1000; width: 100%;">
    <?php
        $sql2 = "SELECT COUNT(*) AS count FROM friendship 
                 WHERE friendship.user2_id = {$_SESSION['user_id']} AND friendship.friendship_status = 0";
        $query2 = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_assoc($query2);
    ?>
    <ul> <!-- Ensure there are no enter escape characters.-->
        <li><a href="home.php">Inicio</a></li>
        <li><a href="requests.php">Solicitudes de seguimiento (<?php echo $row['count'] ?>)</a></li><li><a href="profile.php">Perfil</a></li>
        <li><a href="friends.php">Amigos</a></li>
        <li><a href="logout.php">Salir</a></li>
    </ul>
    <div class="globalsearch">
        <form method="get" action="search.php" onsubmit="return validateField()"> <!-- Ensure there are no enter escape characters.-->
            <select name="location">
                <option value="emails">Correos</option>
                <option value="names">Nombres</option>
                <option value="hometowns">Ciudades</option>
                <option value="posts">Publicaciones</option>
            </select><input type="text" placeholder="Buscar..." name="query" id="query"><input type="submit" value="Buscar..." id="querybutton">
        </form>
    </div>
</div>
<br><br><br>
<div id="divider" style="width: 100%; float: left; height: 300px; background-color: transparent; margin-top: 0px;"></div>

<script>
function validateField(){
    var query = document.getElementById("query");
    var button = document.getElementById("querybutton");
    if(query.value == "") {
        query.placeholder = 'Escribe algo!';
        return false;
    }
    return true;
}
</script>