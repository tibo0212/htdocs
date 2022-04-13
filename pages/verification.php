<?php
   try {
      $dbh = new PDO('mysql:host=127.0.0.1;dbname=mysql', 'root', 'tomate');
      foreach($dbh->query('SELECT count(*) FROM utilisateur') as $row) {
         print_r($row);
      }
      $dbh = null;
      session_start();
      if(isset($_POST['username']) && isset($_POST['password'])){
         // connexion à la base de données
         $db_username = 'root';
         $db_password = 'tomate';
         $db_name     = 'mysql';
         $db_host     = '127.0.0.1';
         $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
               or die('could not connect to database');
         
         // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
         // pour éliminer toute attaque de type injection SQL et XSS
         $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
         $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
            if(strpos($username,'@')==false){
                  $requete = "SELECT count(*) FROM utilisateur where 
                     Pseudo = '".$username."' and mot_de_passe = '".$password."' ";
                  $exec_requete = mysqli_query($db,$requete);
                  $reponse      = mysqli_fetch_array($exec_requete);
                  $count = $reponse['count(*)'];
                  if($count!=0) // nom d'utilisateur et mot de passe correctes
                  {
                  session_start();
                  $_SESSION['username'] = $username;
                  header('Location: ../');
                  }
                  else{
                     header('Location: ../?erreur=1'); // utilisateur ou mot de passe incorrect
                  }
            }
            else{
               $requete = "SELECT count(*) FROM utilisateur where 
                     email = '".$username."' and mot_de_passe = '".$password."' ";
                  $exec_requete = mysqli_query($db,$requete);
                  $reponse      = mysqli_fetch_array($exec_requete);
                  $count = $reponse['count(*)'];
                  if($count!=0) // nom d'utilisateur et mot de passe correctes
                  {
                  session_start();
                  $_SESSION['username'] = $username;
                  header('Location: ../');
                  }
                  else{
                     header('Location: ../?erreur=1'); // utilisateur ou mot de passe incorrect
                  }
            }
      }
      else{
        header('Location: ../');
      }
      mysqli_close($db); // fermer la connexion
   } 
   catch (PDOException $e) {
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
              <a href="/">Go back to Home Page</a>
          </div>
      </article>
      </body>
      </html>';
      die();
   }

?>