<?php
//Include required PHPMailer files
	require '../includes/PHPMailer.php';
	require '../includes/SMTP.php';
	require '../includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
if ( isset( $_POST['submit'] ) ) {
    /* récupérer les données du formulaire en utilisant 
       la valeur des attributs name comme clé 
      */
    $pseudo = $_POST['pseudo']; 
    $email = $_POST['email']; 
    $Object = $_POST['Object'];
    $message = $_POST['message'];

}
//Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "greencraft.webmaster@gmail.com";
//Set gmail password
	$mail->Password = "tomatedu971";
//Email subject
	$mail->Subject = "Contact Greencraft.fr";
//Set sender email
	$mail->setFrom('greencraft.webmaster@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Email body
	$mail->Body = "<h1>Nouveau Message d'un Visiteur</h1></br><p>Pseudo in-game: $pseudo <br> Adresse Email : $email <br> Objet du message : $Object <br> Corps du message :<br><textarea readonly cols=40 rows=15>$message</textarea></p>";
//Add recipient
	$mail->addAddress('belaiseclement@gmail.com');
//Send it to database
$serveur = "127.0.0.1";
$dbname = "mysql";
$user = "root";
$pass = "tomate";

if(($pseudo != null) || ($email != null)||($Object!=null)||($message!=null)){

	$pseudo = $_POST['pseudo']; 
	$email = $_POST['email']; 
	$Object = $_POST['Object'];
	$message = $_POST['message'];
	try{
		//On se connecte à la BDD
		$dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
		$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//On insère les données reçues
		$sth = $dbco->prepare("
			INSERT INTO `Contact_Form`(`Pseudo in-game`, `Adresse e-mail`, `Objet`, `Message`)
			VALUES(:pseudo, :email, :objet, :message)");
		$sth->bindParam(':pseudo',$pseudo);
		$sth->bindParam(':email',$email);
		$sth->bindParam(':objet',$Object);
		$sth->bindParam(':message',$message);
		$sth->execute();

		//Finally send email
		if ( $mail->send() ) {
			echo '<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>Traitement en cours...</title>
				<link rel="stylesheet" href="../css/redirection.css">
				
			</head>';
			header ("refresh:5.5;url=../");
			echo '<center><div class="loader"></div></center> ';
			echo "<center><p>Nous avons recu votre message. Redirection vers la page d'accueil en cours...</p><br>";
			echo '<progress id="progressBar" value="2" max="200">75%</progress></center>';
			echo '<script src="../JavaScript/redirection.js"></script>';
			echo '</body>';
		}
		else{
			echo "Erreur:";
		}
	}
	catch(PDOException $e){
		echo '<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Unstarted DataBase</title>
		</head>
		<style>
		   html, body { padding: 0; margin: 0; width: 100%; height: 100%; }
		   * {box-sizing: border-box;}
		   body { text-align: center; padding: 0; background: green; color: #fff; font-family: Open Sans; }
		   h1 { font-size: 50px; font-weight: 100; text-align: center;}
		   body { font-family: Open Sans; font-weight: 100; font-size: 20px; color: #fff; text-align: center; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; -webkit-box-align: center; -ms-flex-align: center; align-items: center;}
		   article { display: block; width: 700px; padding: 50px; margin: 0 auto; }
		   a { color: #fff; font-weight: bold;}
		   a:hover { text-decoration: none; }
		   svg { width: 75px; margin-top: 1em; }
		   img { position: relative; top:25px;}
		   h1 {
			  width: 65vw;
			  position: relative;
			  left: -20vh;
		   }
		</style>
		<article>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 202.24 202.24"><defs><style>.cls-1{fill:#fff;}</style></defs><title>Asset 3</title><g id="Layer_2" data-name="Layer 2"><g id="Capa_1" data-name="Capa 1"><path class="cls-1" d="M101.12,0A101.12,101.12,0,1,0,202.24,101.12,101.12,101.12,0,0,0,101.12,0ZM159,148.76H43.28a11.57,11.57,0,0,1-10-17.34L91.09,31.16a11.57,11.57,0,0,1,20.06,0L169,131.43a11.57,11.57,0,0,1-10,17.34Z"/><path class="cls-1" d="M101.12,36.93h0L43.27,137.21H159L101.13,36.94Zm0,88.7a7.71,7.71,0,1,1,7.71-7.71A7.71,7.71,0,0,1,101.12,125.63Zm7.71-50.13a7.56,7.56,0,0,1-.11,1.3l-3.8,22.49a3.86,3.86,0,0,1-7.61,0l-3.8-22.49a8,8,0,0,1-.11-1.3,7.71,7.71,0,1,1,15.43,0Z"/></g></g></svg>
			<h1>Base de données non démarrée !</h1>
			<div>
				<p>&mdash;<img src="../images/greencraft&co.png" alt="greencraft"> &mdash;</p>
				<br>
				<br>
				<a href=/.php">Go back to Home Page</a>
			</div>
		</article>
		</body>
		</html>';
	}

	//Closing smtp connection
		$mail->smtpClose();
}		
else {
	echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accès Interdit</title>
</head>
<style>
  html, body { padding: 0; margin: 0; width: 100%; height: 100%; }
  * {box-sizing: border-box;}
  body { text-align: center; padding: 0; background: green; color: #fff; font-family: Open Sans; }
  h1 { font-size: 50px; font-weight: 100; text-align: center;}
  body { font-family: Open Sans; font-weight: 100; font-size: 20px; color: #fff; text-align: center; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; -webkit-box-align: center; -ms-flex-align: center; align-items: center;}
  article { display: block; width: 700px; padding: 50px; margin: 0 auto; }
  a { color: #fff; font-weight: bold;}
  a:hover { text-decoration: none; }
  svg { width: 75px; margin-top: 1em; }
    img { position: relative; top:25px;}
</style>

<article>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 202.24 202.24"><defs><style>.cls-1{fill:#fff;}</style></defs><title>Asset 3</title><g id="Layer_2" data-name="Layer 2"><g id="Capa_1" data-name="Capa 1"><path class="cls-1" d="M101.12,0A101.12,101.12,0,1,0,202.24,101.12,101.12,101.12,0,0,0,101.12,0ZM159,148.76H43.28a11.57,11.57,0,0,1-10-17.34L91.09,31.16a11.57,11.57,0,0,1,20.06,0L169,131.43a11.57,11.57,0,0,1-10,17.34Z"/><path class="cls-1" d="M101.12,36.93h0L43.27,137.21H159L101.13,36.94Zm0,88.7a7.71,7.71,0,1,1,7.71-7.71A7.71,7.71,0,0,1,101.12,125.63Zm7.71-50.13a7.56,7.56,0,0,1-.11,1.3l-3.8,22.49a3.86,3.86,0,0,1-7.61,0l-3.8-22.49a8,8,0,0,1-.11-1.3,7.71,7.71,0,1,1,15.43,0Z"/></g></g></svg>
    <h1>Accès Interdit!</h1>
    <div>
        <p>&mdash;<img src="../images/greencraft&co.png" alt="greencraft"> &mdash;</p>
        <br>
        <br>
        <a href=/.php">Go back to Home Page</a>
    </div>
</article>
</body>
</html>';
}

?>