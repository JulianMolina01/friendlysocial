<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location:index.php");
}
if($_SESSION['user_id'] != $_GET['m']){
	echo "<div style='display: grid; items-align: center; justify-items: center; justify-content: center; margin-top: 10%;'>";
	echo "<h1 style='text-align: center; font-family: Arial;'>Usted está intentando hackear nuestro sitio web <br>";
	echo "Haga uso debido del Sistema. Gracias.</h1>";
	echo "<br><br><br>";
	echo "<a href='home.php' style='width: auto; height: auto; padding: 10px; background-color: steelblue; color: #FFFFFF; text-decoration: none; border-radius: 5px; font-family: Arial;'>Regresar al inicio</a>";
	echo "</div>";
}else{
	if(isset($_GET["f"])&&isset($_GET["m"])){
		// Establish Connection to Database
		static $conn;
		if ($conn === NULL){ 
		    $conn = mysqli_connect('localhost','root','','socialnetwork');
		}

		$f = $_GET['f'];
		$m = $_GET['m'];
		// sql to delete a record
		$sql = "DELETE FROM friendship WHERE user1_id=".$m." AND user2_id=". $f."";

		if ($conn->query($sql) === TRUE) {
		  	
			// Establish Connection to Database
		static $conn;
		if ($conn === NULL){ 
		    $conn = mysqli_connect('localhost','socialnetwork','123Password123!','socialnetwork');
		}

		$f = $_GET['f'];
		$m = $_GET['m'];
		// sql to delete a record
		$sql = "DELETE FROM friendship WHERE user1_id=" . $f . " AND user2_id=".$m . "";

		if ($conn->query($sql) === TRUE) {
		  	
			//Eliminado con exito
			echo "<div style='display: grid; items-align: center; justify-items: center; justify-content: center; margin-top: 10%;'>";
			echo "<h1 style='text-align: center; font-family: Arial; color: green;'>Acabas de eliminar a uno de tus amigos.<br>";
			echo "Si crees que lo has hecho por error, enviale una solicitud otra vez.</h1>";
			echo "<br><br><br>";
			echo "<a href='home.php' style='width: auto; height: auto; padding: 10px; background-color: steelblue; color: #FFFFFF; text-decoration: none; border-radius: 5px; font-family: Arial;'>Regresar al inicio</a>";
			echo "</div>";



		} else {
		  

			//Eliminado sin exito
			echo "<div style='display: grid; items-align: center; justify-items: center; justify-content: center; margin-top: 10%;'>";
			echo "<h1 style='text-align: center; font-family: Arial; color: brown;'>Error al eliminar a tu amigo.<br>";
			echo "Intenta de nuevo más tarde.</h1>";
			echo "<br><br><br>";
			echo "<a href='home.php' style='width: auto; height: auto; padding: 10px; background-color: steelblue; color: #FFFFFF; text-decoration: none; border-radius: 5px; font-family: Arial;'>Regresar al inicio</a>";
			echo "</div>";



		}
           //Working here

		}

			$conn->close();
		}else{
		echo "<div style='display: grid; items-align: center; justify-items: center; justify-content: center; margin-top: 10%;'>";
		echo "<h1 style='text-align: center; font-family: Arial;'>Usted está intentando hackear nuestro sitio web <br>";
		echo "Haga uso debido del Sistema. Gracias.</h1>";
		echo "<br><br><br>";
		echo "<a href='home.php' style='width: auto; height: auto; padding: 10px; background-color: steelblue; color: #FFFFFF; text-decoration: none; border-radius: 5px; font-family: Arial;'>Regresar al inicio</a>";
		echo "</div>";
	}
}
?>
