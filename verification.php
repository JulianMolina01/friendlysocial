<?php  
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Verificación en 2 pasos</title>
</head>
<style type="text/css">
    form {
    max-width: 300px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

label {
    font-weight: bold;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

</style>
<body style="display: grid; align-items: center; justify-items: center; justify-content: center; font-family: Arial;">
    <form id="codeform" method="post" action="" style="margin-top: 100px; margin-bottom: 100px;">
        <label for="verification_code">Escriba el código de verificación:</label><br>
        <input type="password" id="verification_code" name="verification_code"><br><br>
        <input type="submit" value="Verificar">
    </form>

    <?php
    
    // Function to send the verification email
    function sendVerificationEmail($receiver_email, $code) {
// Carga los archivos necesarios de PHPMailer
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';


// Crea una nueva instancia de PHPMailer
$phpmailer = new PHPMailer\PHPMailer\PHPMailer(true);

try {
    // Configura el modo para usar SMTP
    $phpmailer->isSMTP();

    // Configuración del servidor SMTP proporcionada
    /*$phpmailer->Host = 'smtp.gmail.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = 'friendlysocial1313@gmail.com';
    $phpmailer->Password = 'etrp qibw hnld rdgo';*/

    
    // Configuración del servidor SMTP proporcionada
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '4475219321d64c';
    $phpmailer->Password = 'd0883092697f82';
    //$phpmailer->Password = '80cfc2ec6b9cbc';
    //ycae ztdc tqbq jtyg

    // Configuración de remitente y destinatario
    $phpmailer->setFrom('friendlysocial1313@gmail.com', 'Friendly Social');
    $phpmailer->addAddress($receiver_email, 'Usuairo');

    // Contenido del correo electrónico
    $phpmailer->isHTML(true);
    $phpmailer->Subject = 'Codigo de verificacion Friendly';
    $phpmailer->Body = 'Este es tu codigo de verificacion: ' . $code;

    // Envía el correo electrónico
    $phpmailer->send();
    echo 'El código se envió a su correo.';
} catch (Exception $e) {
    echo "No se pudo enviar el correo de verificación. Error de correo: {$phpmailer->ErrorInfo}";
}
    }

    // Function to generate a random verification code
    function generateVerificationCode() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < 6; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_input = $_POST["verification_code"];
        $verification_code = $_SESSION['codea']; // Replace with your generated code

        // Time in seconds for 2 minutes
        $expire_time = 120;
        $current_time = time();
        $generated_time = $_SESSION['generated_time']; // Retrieve the time when the verification code was generated

        if ($current_time - $generated_time > $expire_time) {
            echo "El código de verificación expiro, intente de nuevo.";
        } else {
            if ($user_input === $verification_code) {
                header("location:home.php");
            } else {
                session_start();
                session_destroy();
                header("location:index.php");
            }
        }
    } else {
        // Generate the verification code and store the current time when the form is loaded
        $_SESSION['generated_time'] = time();
        $receiver_email = $_SESSION['user_email']; // Replace with the recipient's email
        $verification_code = generateVerificationCode();
        //echo $verification_code;
        $_SESSION['codea'] = $verification_code;
        //echo "Verificando el código que le llego...";
        sendVerificationEmail($receiver_email, $verification_code);
    }
    //https://www.w3docs.com/snippets/php/how-to-configure-xampp-to-send-email-from-localhost-with-php.html
    ?>
</body>
<script type="text/javascript">
    //document.getElementById('verification_code').value = "<?php echo $_SESSION['codea']; ?>";
    /*setTimeout(function(){
        document.getElementById('codeform').submit();
    }, 2000); // 2000 milliseconds = 2 seconds*/
</script>
</html>
