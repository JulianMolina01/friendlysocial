<?php 
require 'functions/functions.php';
session_start();
if (isset($_SESSION['user_id'])) {
    header("location:home.php");
}
session_destroy();
session_start();
ob_start(); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Friendly</title>
    <link rel="stylesheet" type="text/css" href="resources/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <style>
        #main_body{
            /*background-image: url("images/bg1.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;*/
            background-color: #FFFFFF;
        }
        .container{
            margin: 40px auto;
            width: 400px;
        }
        .content {
            /*padding: 30px;
            background-color: white;
            box-shadow: 0 0 5px #4267b2;*/
        }
        h1{
            color: #000000;
        }
    #signin {
      width: 100%;
      padding: 40px;
      background: rgba(255,255,255,.5);
      box-sizing: border-box;
      box-shadow: 0 15px 25px rgba(0,0,0,.6);
      border-radius: 10px;
    }

    #signin h2 {
      margin: 0 0 30px;
      padding: 0;
      color: #fff;
      text-align: center;
    }

    #signin .user-box {
      position: relative;
    }

    #signin .user-box input {
      width: 100%;
      padding: 10px 0;
      font-size: 16px;
      color: #fff;
      margin-bottom: 30px;
      border: none;
      border-bottom: 1px solid #fff;
      outline: none;
      background: transparent;
    }
    #signin .user-box label {
      position: absolute;
      top:0;
      left: 0;
      padding: 10px 0;
      font-size: 16px;
      color: #fff;
      pointer-events: none;
      transition: .5s;
    }

    #signin .user-box input:focus ~ label,
    #signin .user-box input:valid ~ label {
      top: -20px;
      left: 0;
      color: #03e9f4;
      font-size: 12px;
    }

    #signin form a {
      position: relative;
      display: inline-block;
      padding: 10px 20px;
      color: #03e9f4;
      font-size: 16px;
      text-decoration: none;
      text-transform: uppercase;
      overflow: hidden;
      transition: .5s;
      margin-top: 40px;
      letter-spacing: 4px
    }

    #signin a:hover {
      background: #03e9f4;
      color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 5px #03e9f4,
                  0 0 25px #03e9f4,
                  0 0 50px #03e9f4,
                  0 0 100px #03e9f4;
    }

    #signin a span {
      position: absolute;
      display: block;
    }




    #signup {
      width: 100%;
      padding: 40px;
      background: rgba(255,255,255,.5);
      box-sizing: border-box;
      box-shadow: 0 15px 25px rgba(0,0,0,.6);
      border-radius: 10px;
    }

    #signup h2 {
      margin: 0 0 30px;
      padding: 0;
      color: #000000;
      text-align: center;
    }

    #signup .user-box {
      position: relative;
    }

    #signup .user-box input {
      width: 100%;
      padding: 10px 0;
      font-size: 16px;
      color: #fff;
      margin-bottom: 30px;
      border: none;
      border-bottom: 1px solid #fff;
      outline: none;
      background: transparent;
    }
    #signup .user-box label {
      position: absolute;
      top:0;
      left: 0;
      padding: 10px 0;
      font-size: 16px;
      color: #fff;
      pointer-events: none;
      transition: .5s;
    }

    #signup .user-box input:focus ~ label,
    #signup .user-box input:valid ~ label {
      top: -20px;
      left: 0;
      color: #03e9f4;
      font-size: 12px;
    }

    #signup form a {
      position: relative;
      display: inline-block;
      padding: 10px 20px;
      color: #03e9f4;
      font-size: 16px;
      text-decoration: none;
      text-transform: uppercase;
      overflow: hidden;
      transition: .5s;
      margin-top: 40px;
      letter-spacing: 4px
    }

    #signup a:hover {
      background: #03e9f4;
      color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 5px #03e9f4,
                  0 0 25px #03e9f4,
                  0 0 50px #03e9f4,
                  0 0 100px #03e9f4;
    }

    #signup a span {
      position: absolute;
      display: block;
    }
        </style>
        <link rel="stylesheet" href="public/css/navegador.css">
        <link rel="stylesheet" href="public/css/servicios.css">
        <link rel="shortcut icon" href="public/img/R.jpeg" />
        <style type="text/css">
            h3 a{
                color: #FFFFFF;
                text-decoration: none;
            }
            h3 a:hover{
                color: #FFFFFF;
                text-decoration: none;
            }
            .productos-categoria{
                text-align: center;
            }
    </style>
</head>
<body id="main_body">
    <?php include 'includes/navbar1.php'; ?>
    <br><br><br><br>
    <h1 style="color: #000000;" id="ingresar">Friendly</h1>
    <div class="container">
        <div class="tab">
            <button class="tablink active" onclick="openTab(event,'signin')" id="link1">Ingresar</button>
            <button class="tablink" onclick="openTab(event,'signup')" id="link2">Crear cuenta</button>
        </div>
        <div class="content">
            <div class="tabcontent" id="signin">
                <form method="post" onsubmit="return validateLogin()">
                    <label>Correo<span>*</span></label><br>
                    <input type="text" name="useremail" id="loginuseremail">
                    <div class="required"></div>
                    <br>
                    <label>Contraseña<span>*</span></label><br>
                    <input type="password" name="userpass" id="loginuserpass">
                    <div class="required"></div>
                    <br><br>
                    <input type="submit" value="Ingresar" name="login">
                </form>
            </div>
            <div class="tabcontent" id="signup">
                <form method="post" onsubmit="return validateRegister()">
                    <!--Package One-->
                    <h2>Crear cuenta</h2>
                    <hr>
                    <!--First Name-->
                    <label>Nombre<span>*</span></label><br>
                    <input type="text" name="userfirstname" id="userfirstname">
                    <div class="required"></div>
                    <br>
                    <!--Last Name-->
                    <label>Apellido<span>*</span></label><br>
                    <input type="text" name="userlastname" id="userlastname">
                    <div class="required"></div>
                    <br>
                    <!--Nickname-->
                    <label>Apodo (No es obligatorio)</label><br>
                    <input type="text" name="usernickname" id="usernickname">
                    <div class="required"></div>
                    <br>
                    <!--Password-->
                    <label>Contraseña<span>*</span></label><br>
                    <input type="password" name="userpass" id="userpass">
                    <div class="required"></div>
                    <br>
                    <!--Confirm Password-->
                    <label>Confirmar contraseña<span>*</span></label><br>
                    <input type="password" name="userpassconfirm" id="userpassconfirm">
                    <div class="required"></div>
                    <br>
                    <!--Email-->
                    <label>Correo<span>*</span></label><br>
                    <input type="text" name="useremail" id="useremail">
                    <div class="required"></div>
                    <br>
                    <!--Birth Date-->
                    Fecha de nacimiento<span>*</span><br>
                    <select name="selectday">
                    <?php
                    for($i=1; $i<=31; $i++){
                        echo '<option value="'. $i .'">'. $i .'</option>';
                    }
                    ?>
                    </select>
                    <select name="selectmonth">
                    <?php
                    echo '<option value="1">Enero</option>';
                    echo '<option value="2">Febrero</option>';
                    echo '<option value="3">Marzo</option>';
                    echo '<option value="4">Abril</option>';
                    echo '<option value="5">Mayo</option>';
                    echo '<option value="6">Junio</option>';
                    echo '<option value="7">Julio</option>';
                    echo '<option value="8">Augosto</option>';
                    echo '<option value="9">Septiembre</option>';
                    echo '<option value="10">Octubre</option>';
                    echo '<option value="11">Noviembre</option>';
                    echo '<option value="12">Diciembre</option>';
                    ?>
                    </select>
                    <select name="selectyear">
                    <?php
                    for($i=2017; $i>=1900; $i--){
                        if($i == 1996){
                            echo '<option value="'. $i .'" selected>'. $i .'</option>';
                        }
                        echo '<option value="'. $i .'">'. $i .'</option>';
                    }
                    ?>
                    </select>
                    <br><br>
                    <!--Gender-->
                    <input type="radio" name="usergender" value="M" id="malegender" class="usergender">
                    <label>Hombre</label>
                    <input type="radio" name="usergender" value="F" id="femalegender" class="usergender">
                    <label>Mujer</label>
                    <div class="required"></div>
                    <br>
                    <!--Hometown-->
                    <label>Ciudad / Estado + País</label><br>
                    <input type="text" name="userhometown" id="userhometown">
                    <br>
                    <!--Package Two-->
                    <h2>Información adicional</h2>
                    <hr>
                    <!--Marital Status-->
                    <input type="radio" name="userstatus" value="S" id="singlestatus">
                    <label>Soltero o  Soltera</label>
                    <br>
                    <input type="radio" name="userstatus" value="E" id="engagedstatus">
                    <label>Comprometido o Comprometida</label>
                    <br>
                    <input type="radio" name="userstatus" value="M" id="marriedstatus">
                    <label>Casado o Casada</label>
                    <br><br>
                    <!--About Me-->
                    <label>Acerca de mi (Descripción breve)</label><br>
                    <textarea rows="12" name="userabout" id="userabout"></textarea>
                    <br><br>
                    <input type="submit" value="Crear cuenta" name="register">
                </form>
            </div>
        </div>
    </div>

<!--Seccion de Conocenos-->
<div class="servicios-contenedor" id="servicios">
    <h1>Conocenos</h1>
    <div class="contenedor">
        <div class="servicio" data-aos="fade-right">
                <figure>
                        <img src="public/img/conocenos1.jpeg" alt="">
                </figure>
                <div class="contenido">
                    <h3>Conoce a nuevas personas</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime, eius minus. Aut voluptates voluptatum aperiam aspernatur amet nobis, ex animi.</p>
                    <a href="#"></a>
                </div>
        </div>
        <div class="servicio" data-aos="fade-right">
                <figure>
                    <img src="public/img/conocenos2.jpg" alt="">
                </figure>
                <div class="contenido">
                    <h3>Mantente conectado</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos rerum blanditiis cumque accusamus tenetur? Sit eveniet laborum obcaecati? Expedita, explicabo.</p>
                    <a href="#"></a>
                </div>
        </div>
        <div class="servicio" data-aos="fade-right">
                <figure>
                    <img src="public/img/conocenos3.jpg" alt="">
                </figure>
                <div class="contenido">
                    <h3>Mantente informado</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos rerum blanditiis cumque accusamus tenetur? Sit eveniet laborum obcaecati? Expedita, explicabo.</p>
                    <a href="#"></a>
                </div>
        </div>
        <div class="servicio" data-aos="fade-right">
                <figure>
                    <img src="public/img/conocenos4.jpeg" alt="">
                </figure>
                <div class="contenido">
                    <h3>Aprende y ayuda a los demas</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, cumque.</p>
                    <a href="#"></a>
                </div>
        </div>
    </div>
</div>

<!--servicios-->

<div class="productos-contenedor" id="productos">
    <h1>Nuestro servicios</h1>
    <div class="contenedor-producto">
        <div class="productos-categoria" data-aos="fade-right">
                <img src="public/img/servicio1.jpeg" alt="">
                <h3>mantente <br>conectado</h3>
        </div>
        <div class="productos-categoria" data-aos="fade-right">
                <img src="public/img/servicio2.jpeg" alt="">
                <h3>Aprende nuevos temas</h3>
        </div>
        <div class="productos-categoria" data-aos="fade-right">
                <img src="public/img/servicio3.jpeg" alt="">
                <h3>Busca o brinda apoyo</h3>
        </div>
        <div class="productos-categoria" data-aos="fade-right">
                <img src="public/img/servicio4.png" alt="">   
                <h3>Comparte tu conocimiento</h3>
        </div>
        <div class="productos-categoria" data-aos="fade-right">
                <img src="public/img/servicio5.jpeg" alt="">
                <h3>Interactua con otras partes del mundo</h3>
        </div>
        <div class="productos-categoria" data-aos="fade-right">
                <img src="public/img/servicio6.jpeg" alt="">
                <h3>Networking</h3>
        </div>
        <div class="productos-categoria" data-aos="fade-right">
                <img src="public/img/servicio7.jpeg" alt="">
                <h3>Busca amigos</h3>
        </div>
        <div class="productos-categoria" data-aos="fade-right">
                <img src="public/img/servicio8.png" alt="">
                <h3>Habla con profesionales</h3>
        </div>
    </div>
</div>


    <script src="resources/js/main.js"></script>
</body>
</html>

<?php

function customEncrypt($string) {
    $binary = implode('', array_map(function($char) {
        return str_pad(decbin(ord($char)), 8, '0', STR_PAD_LEFT);
    }, str_split($string)));

    $encoded = base64_encode($string);
    $result = $binary . $encoded;
    $encrypted = substr($result, 0, 255);
    return $encrypted;
}

$conn = connect();
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // A form is posted
    if (isset($_POST['login'])) { // Login process
        $useremail = $_POST['useremail'];
        $userpass = customEncrypt($_POST['userpass']);
        $query = mysqli_query($conn, "SELECT * FROM users WHERE user_email = '$useremail' AND user_password = '$userpass'");
        if($query){
            if(mysqli_num_rows($query) == 1) {
                $row = mysqli_fetch_assoc($query);
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['user_firstname'] . " " . $row['user_lastname'];
                $_SESSION['user_email'] = $row['user_email'];
                header("location:home.php");
            }
            else {
                ?> <script>
                    document.getElementsByClassName("required")[0].innerHTML = "Credenciales no validas";
                    document.getElementsByClassName("required")[1].innerHTML = "Credenciales no validas";
                </script> <?php
            }
        } else{
            echo mysqli_error($conn);
        }
    }
    if (isset($_POST['register'])) { // Register process
        // Retrieve Data
        $userfirstname = htmlentities($_POST['userfirstname']);
        $userlastname = htmlentities($_POST['userlastname']);
        $usernickname = htmlentities($_POST['usernickname']);
        $userpassword = customEncrypt(htmlentities($_POST['userpass']));
        $useremail = htmlentities($_POST['useremail']);
        $userbirthdate = htmlentities($_POST['selectyear']) . '-' . htmlentities($_POST['selectmonth']) . '-' . htmlentities($_POST['selectday']);
        $usergender = htmlentities($_POST['usergender']);
        $userhometown = htmlentities($_POST['userhometown']);
        $userabout = htmlentities($_POST['userabout']);
        if (isset($_POST['userstatus'])){
            $userstatus = htmlentities($_POST['userstatus']);
        }
        else{
            $userstatus = NULL;
        }
        // Check for Some Unique Constraints
        $query = mysqli_query($conn, "SELECT user_nickname, user_email FROM users WHERE user_nickname = '$usernickname' OR user_email = '$useremail'");
        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            if($usernickname == $row['user_nickname'] && !empty($usernickname)){
                ?> <script>
                document.getElementsByClassName("required")[4].innerHTML = "Este apodo ya existe.";
                </script> <?php
            }
            if($useremail == $row['user_email']){
                ?> <script>
                document.getElementsByClassName("required")[7].innerHTML = "Este correo ya existe.";
                </script> <?php
            }
        }
        // Insert Data
        $sql = "INSERT INTO users(user_firstname, user_lastname, user_nickname, user_password, user_email, user_gender, user_birthdate, user_status, user_about, user_hometown)
                VALUES ('$userfirstname', '$userlastname', '$usernickname', '$userpassword', '$useremail', '$usergender', '$userbirthdate', '$userstatus', '$userabout', '$userhometown')";
        $query = mysqli_query($conn, $sql);
        if($query){
            $query = mysqli_query($conn, "SELECT user_id FROM users WHERE user_email = '$useremail'");
            $row = mysqli_fetch_assoc($query);
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_email'] = $row['user_email'];
            header("location:home.php");
        }
    }
}
//ngrok http --domain=snail-charmed-safely.ngrok-free.app 80
?>