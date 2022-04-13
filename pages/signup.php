<?php
//Include required PHPMailer files
	require '../includes/PHPMailer.php';
	require '../includes/SMTP.php';
	require '../includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
if ( (isset( $_POST['submit'] )) && ($_POST['password']==$_POST['confirmation']) ) {
    /* récupérer les données du formulaire en utilisant 
       la valeur des attributs name comme clé 
      */
	  $nom = $_POST['Nom'];
	  $prénom = $_POST['Prénom'];
	  $email = $_POST['Email'];
	  $pseudo = $_POST['Pseudo'];
	  $number_phone = $_POST['Numéro'];
	  $password = $_POST['password'];

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
			$mail->Subject = "Nouvel Utilisateur sur Greencraft.fr";
		//Set sender email
			$mail->setFrom('greencraft.webmaster@gmail.com');
		//Enable HTML
			$mail->isHTML(true);
		//Email body
			$mail->Body = '
			<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
			<head>
				<meta charset="utf-8"> <!-- utf-8 works for most cases -->
				<meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn\'t be necessary -->
				<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
				<meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
				<title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->
			
				<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
			
				<!-- CSS Reset : BEGIN -->
				<style>
			
					/* What it does: Remove spaces around the email design added by some email clients. */
					/* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
					html,
			body {
				margin: 0 auto !important;
				padding: 0 !important;
				height: 100% !important;
				width: 100% !important;
				background: #f1f1f1;
			}
			
			/* What it does: Stops email clients resizing small text. */
			* {
				-ms-text-size-adjust: 100%;
				-webkit-text-size-adjust: 100%;
			}
			
			/* What it does: Centers email on Android 4.4 */
			div[style*="margin: 16px 0"] {
				margin: 0 !important;
			}
			
			/* What it does: Stops Outlook from adding extra spacing to tables. */
			table,
			td {
				mso-table-lspace: 0pt !important;
				mso-table-rspace: 0pt !important;
			}
			
			/* What it does: Fixes webkit padding issue. */
			table {
				border-spacing: 0 !important;
				border-collapse: collapse !important;
				table-layout: fixed !important;
				margin: 0 auto !important;
			}
			
			/* What it does: Uses a better rendering method when resizing images in IE. */
			img {
				-ms-interpolation-mode:bicubic;
			}
			
			/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
			a {
				text-decoration: none;
			}
			
			/* What it does: A work-around for email clients meddling in triggered links. */
			*[x-apple-data-detectors],  /* iOS */
			.unstyle-auto-detected-links *,
			.aBn {
				border-bottom: 0 !important;
				cursor: default !important;
				color: inherit !important;
				text-decoration: none !important;
				font-size: inherit !important;
				font-family: inherit !important;
				font-weight: inherit !important;
				line-height: inherit !important;
			}
			
			/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
			.a6S {
				display: none !important;
				opacity: 0.01 !important;
			}
			
			/* What it does: Prevents Gmail from changing the text color in conversation threads. */
			.im {
				color: inherit !important;
			}
			
			/* If the above doesn\'t work, add a .g-img class to any image in question. */
			img.g-img + div {
				display: none !important;
			}
			
			/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
			/* Create one of these media queries for each additional viewport size you\'d like to fix */
			
			/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
			@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
				u ~ div .email-container {
					min-width: 320px !important;
				}
			}
			/* iPhone 6, 6S, 7, 8, and X */
			@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
				u ~ div .email-container {
					min-width: 375px !important;
				}
			}
			/* iPhone 6+, 7+, and 8+ */
			@media only screen and (min-device-width: 414px) {
				u ~ div .email-container {
					min-width: 414px !important;
				}
			}
			
			
				</style>
			
				<!-- CSS Reset : END -->
			
				<!-- Progressive Enhancements : BEGIN -->
				<style>
			
					.primary{
				background: #17bebb;
			}
			.bg_white{
				background: #ffffff;
			}
			.bg_light{
				background: #f7fafa;
			}
			.bg_black{
				background: #000000;
			}
			.bg_dark{
				background: rgba(0,0,0,.8);
			}
			.email-section{
				padding:2.5em;
			}
			
			/*BUTTON*/
			.btn{
				padding: 10px 15px;
				display: inline-block;
			}
			.btn.btn-primary{
				border-radius: 5px;
				background: #17bebb;
				color: #ffffff;
			}
			.btn.btn-white{
				border-radius: 5px;
				background: #ffffff;
				color: #000000;
			}
			.btn.btn-white-outline{
				border-radius: 5px;
				background: transparent;
				border: 1px solid #fff;
				color: #fff;
			}
			.btn.btn-black-outline{
				border-radius: 0px;
				background: transparent;
				border: 2px solid #000;
				color: #000;
				font-weight: 700;
			}
			.btn-custom{
				color: rgba(0,0,0,.3);
				text-decoration: underline;
			}
			
			h1,h2,h3,h4,h5,h6{
				font-family: "Poppins", sans-serif;
				color: #000000;
				margin-top: 0;
				font-weight: 400;
			}
			
			body{
				font-family: "Poppins", sans-serif;
				font-weight: 400;
				font-size: 15px;
				line-height: 1.8;
				color: rgba(0,0,0,.4);
			}
			
			a{
				color: #17bebb;
			}
			
			table{
			}
			/*LOGO*/
			
			.logo h1{
				margin: 0;
			}
			.logo h1 a{
				color: #17bebb;
				font-size: 24px;
				font-weight: 700;
				font-family: "Poppins", sans-serif;
			}
			
			/*HERO*/
			.hero{
				position: relative;
				z-index: 0;
			}
			
			.hero .text{
				color: rgba(0,0,0,.3);
			}
			.hero .text h2{
				color: #000;
				font-size: 34px;
				margin-bottom: 0;
				font-weight: 200;
				line-height: 1.4;
			}
			.hero .text h3{
				font-size: 24px;
				font-weight: 300;
			}
			.hero .text h2 span{
				font-weight: 600;
				color: #000;
			}
			
			.text-author{
				bordeR: 1px solid rgba(0,0,0,.05);
				max-width: 50%;
				margin: 0 auto;
				padding: 2em;
			}
			.text-author img{
				border-radius: 50%;
				padding-bottom: 20px;
			}
			.text-author h3{
				margin-bottom: 0;
			}
			ul.social{
				padding: 0;
			}
			ul.social li{
				display: inline-block;
				margin-right: 10px;
			}
			
			/*FOOTER*/
			
			.footer{
				border-top: 1px solid rgba(0,0,0,.05);
				color: rgba(0,0,0,.5);
			}
			.footer .heading{
				color: #000;
				font-size: 20px;
			}
			.footer ul{
				margin: 0;
				padding: 0;
			}
			.footer ul li{
				list-style: none;
				margin-bottom: 10px;
			}
			.footer ul li a{
				color: rgba(0,0,0,1);
			}
			
			
			@media screen and (max-width: 500px) {
			
			
			}
			
			
				</style>
			
			
			</head>
			
			<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
				<center style="width: 100%; background-color: #f1f1f1;">
				<div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
				  &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
				</div>
				<div style="max-width: 600px; margin: 0 auto;" class="email-container">
					<!-- BEGIN BODY -->
				  <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
					  <tr>
					  <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
						  <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
							  <tr>
								  <td class="logo" style="text-align: center;">
									<h1><a href="#"><div style="height: 24px; width: 24px; display: block; background: url("https://lh3.googleusercontent.com/pw/AM-JKLXenzE-czQHf6lvlM4lz_YoXNF71fiBS-3qV9cif2b4AZo61av6EoH3eDTjNcQMKEvh66REFJN7t-vKh_NPOp6BruBnrBz-cC6ZP0XhIBkVTglUWLmYBAXgCcVqT1OzSQC4-CQA8fDt0Y_15xjDE7Metw=w416-h73-no?authuser=0"); background-size: contain;"></div></a></h1>
								  </td>
							  </tr>
						  </table>
					  </td>
					  </tr><!-- end tr -->
							<tr>
					  <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
						<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td style="padding: 0 2.5em; text-align: center; padding-bottom: 3em;">
									<div class="text">
									<h1>Nouvel Utilisateur sur Greencraft.fr !</h1>
									</div>
								</td>
							</tr>
							<tr>
								  <td style="text-align: center;">
									  <div class="text-author">
										  <img src="images/person_2.jpg" alt="" style="width: 100px; max-width: 600px; height: auto; margin: auto; display: block;">
										  </br><p>Pseudo in-game: '.$pseudo.' <br> Adresse Email : '.$email.'
										  <span class="position"></span>
										   <p><a href="#" class="btn btn-primary">Accept Request</a></p>
										   <p><a href="#" class="btn-custom">Ignore Request</a></p>
									   </div>
								  </td>
								</tr>
						</table>
					  </td>
					  </tr><!-- end tr -->
				  <!-- 1 Column Text + Button : END -->
				  </table>
				  <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
					  <tr>
					  <td valign="middle" class="bg_light footer email-section">
						<table>
							<tr>
							<td valign="top" width="33.333%" style="padding-top: 20px;">
							  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
								<tr>
								  <td style="text-align: left; padding-right: 10px;">
									  <h3 class="heading">About</h3>
									  <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
								  </td>
								</tr>
							  </table>
							</td>
							<td valign="top" width="33.333%" style="padding-top: 20px;">
							  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
								<tr>
								  <td style="text-align: left; padding-left: 5px; padding-right: 5px;">
									  <h3 class="heading">Contact Info</h3>
									  <ul>
												<li><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
												<li><span class="text">+2 392 3929 210</span></a></li>
											  </ul>
								  </td>
								</tr>
							  </table>
							</td>
							<td valign="top" width="33.333%" style="padding-top: 20px;">
							  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
								<tr>
								  <td style="text-align: left; padding-left: 10px;">
									  <h3 class="heading">Useful Links</h3>
									  <ul>
												<li><a href="#">Home</a></li>
												<li><a href="#">About</a></li>
												<li><a href="#">Services</a></li>
												<li><a href="#">Work</a></li>
											  </ul>
								  </td>
								</tr>
							  </table>
							</td>
						  </tr>
						</table>
					  </td>
					</tr><!-- end: tr -->
					<tr>
					  <td class="bg_light" style="text-align: center;">
						  <p>No longer want to receive these email? You can <a href="#" style="color: rgba(0,0,0,.8);">Unsubscribe here</a></p>
					  </td>
					</tr>
				  </table>
			
				</div>
			  </center>
			</body>
			</html>';
		//Add recipient
			$mail->addAddress('belaiseclement@gmail.com');
		//Send it to database
		$serveur = "127.0.0.1";
		$dbname = "mysql";
		$user = "root";
		$pass = "tomate";

		if(($nom != null) || ($prénom != null)||($pseudo!=null)||($email!=null)||($password!=null)){
			try{
				//On se connecte à la BDD
				$serveur = "127.0.0.1";
				$dbname = "mysql";
				$user = "root";
				$pass = "tomate";
				$dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
				$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				// On traite les données reçues
				$pseudo_test = $dbco->query('SELECT Pseudo FROM utilisateur WHERE Pseudo IN ($pseudo);');
				$email_test = $dbco->query('SELECT Email FROM utilisateur WHERE Email IN ($email);');
				$resultun = $pseudo_test->fetch();
				$resultdeux = $email_test->fetch();
				echo $resultun==true;
				echo $pseudo;
				echo "$resultdeux";
				if(($resultun==false)&&($resultdeux==false)){
						//On insère les données reçues
						$dbco->exec("INSERT INTO `utilisateur`(`Nom`, `Prénom`, `Pseudo`, `email`,`Numéro`,`mot_de_passe`)
						VALUES('$nom', '$prénom', '$pseudo', '$email', '$number_phone', '$password')");
						echo 'Entrée ajoutée dans la table';

						//Finally send email
						if ($mail->send()) {
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
							echo "<center><p>Bienvenue parmi-nous. Redirection vers la page d'accueil en cours...</p><br>";
							echo '<progress id="progressBar" value="2" max="200">75%</progress></center>';
							echo '<script src="../JavaScript/redirection.js"></script>';
							echo '</body>';
						}
						else{
							echo "Erreur:";
						};
				}
				else{
					if($resultun==true){
						if($resultdeux==true){
							echo "Cet email est déja utilisé";
							echo "Ce pseudo est déja utilisé";
						}
					}
					elseif($resultdeux==true){
						echo "Cet email est déja utilisé";
					}
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
						<a href="../">Go back to Home Page</a>
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
}
else{
	if(isset( $_POST['submit'] )!=true){
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
	elseif(($_POST['password']!=$_POST['confirmation'])){
		echo "confirmation du mot de passe différente du mot de passe";
	}
}
?>