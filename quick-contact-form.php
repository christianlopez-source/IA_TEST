

<?PHP
$email = $_POST["qemail"];
$nombre = $_POST["qname"];
$mensaje = $_POST["qmessage"];




$body = "Un visitante quiere contactarlo con los siguientes datos:" .
"<br>Nombre: " . $nombre .
"<br>Email: " . $email .
"<br>Mensaje: " . $mensaje;


$user = "$email";
$usersubject = "Gracias";
$userheaders = "From: $email\n";

$usermessage = "Gracias por su interés al registrarse, descargue - aqui -
su versión de prueba. "
;



    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'From: MyCompany <welcome@mycompany.com>' . "\r\n";  


		
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';



// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'cristian.lopez@tecnologicoliceocristiano.edu.ec';                     // SMTP username
    $mail->Password   = 'lavidaesunciclo3012';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($email, $nombre);
    $mail->addAddress('cristian.lopez@tecnologicoliceocristiano.edu.ec');     // Add a recipient
            // Name is optional
   



    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Nuevo Cliente';
    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Mensaje enviado';
} catch (Exception $e) {
    echo "Mensaje no enviado: {$mail->ErrorInfo}";
}

		
?>