<?php
$username = 'redcraft971';
$db_username = 'root';
$db_password = 'tomate';
$db_name     = 'mysql';
$db_host     = '127.0.0.1';
$db = new PDO('mysql:host=127.0.0.1;dbname=mysql', 'root', 'tomate')
      or die('could not connect to database');

$reponse = $db->query('SELECT Pseudo,Email FROM utilisateur WHERE Pseudo="$username"');

if($donnees = $reponse->fetch()){
    while ($donnees = $reponse->fetch()){
        echo $donnees['Email'] . ' appartient à ' . $donnees['Pseudo'] . '<br />';
    }
}
else{
    
}

