<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/contacte.css">
    <title>GreenCraft</title>
    <link rel="icon" sizes="32x32" type="image/png" href="../images/Minecraft Logo.png" />
</head>
<body div class="background-image appear">
<style> 
    .background-image{
        background-image: url(../images/contact.png);
        background-size: cover;
        background-repeat: no-repeat;
        height: cover;
    }
    #talkbubble {
      width: 500px;
      height: 150px;
      padding: 20px;
      background: rgba(0,170,0,0.8);
      position: relative;
      top: 18vh;
      left: 50vw;
      -moz-border-radius: 10px;
      -webkit-border-radius: 10px;
      border-radius: 40px;
      z-index: 1000;
    }
    #talkbubble:before {
      content: "";
      position: absolute;
      right: 97.6%;
      top: 77%;
      width: 0;
      height: 0;
      border-top: 13px solid transparent;
      border-right: 26px solid rgba(0,170,0,0.8)    ;
      border-bottom: 13px solid transparent;
    }
</style>
    <?php
    include("../pages/default.php");
    ?>
    <div id="talkbubble">
            <h2 >bonjour! </h2> 
            <h2>Si vous désirez nous contacter afin de nous partager une information</h2>
            <h2>Attaquez-moi !</h2>
        </div>
    <a href="#form" class="swordcursor">
        <img class="img1" src="../images/Zombie-neuf.png" alt="Sans-titre"  />
        </a>
        <div id="container" class="contact">
            <!-- zone de contact -->
            <form id="form" class="contact" action="Traitement.php" method="post">
                <center><h1 class="title">Nous Contacter</h1></center>
                Pseudo in-game :     <input type="text" name="pseudo" required/><br>
                Adresse e-mail :     <input type="email" name="email" required/><br>
                Objet du Message : <input type="text" name="Object" required/><br>
                Message : <br><center><textarea name="message" cols="45" rows="15" required></textarea><br></center>
                <input type="submit" name="submit" /> 
            </form>
            
        </div>
        <center><footer class="contact" style="background-color: green; text-shadow:2px 2px 5px white"><p>
        Greencraft est un serveur PVP Survie Freebuild,
            avec une communauté active et accueillante!
            Rejoins nous > play.greencraft.fr (V-1.18.1)
        </p></footer></center>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://unpkg.com/scrollreveal"></script>
        <script type="text/javascript" src="../JavaScript/app.js"></script>
        <script src="../JavaScript/modalWindows.js"></script>
</body>
</html>