<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style copie.css">
    <title>GreenCraft</title>
    <link rel="icon" sizes="32x32" type="image/png" href="images/Minecraft Logo.png" />
</head>

<body class="appear">
    <?php
    include("pages/default.php");
    if ((isset($_SESSION['username'])||(isset($_COOKIE['logged_user'])))) {
        if(isset($_COOKIE['logged_user'])) {
            // afficher un logo & un message de bienvenu à partir du cookie
            echo '<div class="loader-wrapper">
            <span class="loader"><span class="loader-inner"></span></span>
            <p class="welcome"> Ravi de vous revoir '.$_COOKIE['logged_user'].'</p>
            <div class="caché" style="font-size:0rem;color: white;">'.$_COOKIE['logged_user'].'</div>
            </div>';
        }
        elseif(isset($_SESSION['username'])){
            echo '<div class="loader-wrapper">
            <span class="loader"><span class="loader-inner"></span></span>
            <p class="welcome"> Ravi de vous revoir '.$_SESSION['username'].'</p>
            <div class="caché" style="font-size:0rem;color: white;">'.$_SESSION['username'].'</div>
            </div>';
        }
        else{
            
        }
    }
    ?>
    <section>
        <center>
            <h1 id="titre" style="text-shadow: 3px 4px rgb(0, 190, 0);">Greencraft</h1>
        </center>
        <div class="icones">
                <img class="Iconeun" id="appear" src="images/Freebuild.png" alt="Construire librement !" width="15%">
                <img class="Iconedeux" id="appear" src="images/Creatif.png" alt="" width="15%">
                <img class="Iconetrois" id="appear" src="images/Survie.png" alt="Survivre dans un monde périlleux !" width="15%">
        </div>
        <div class="description">
                <div class="description1" id="appear">Imaginez, recoltez et constuisez librement sans limite</div>
                <div class="description2" id="appear">Courir, sauter et se battre sont des qualites indispensables face aux monstres</div>
                <div class="description3" id="appear">Trop complexe ?<br>passez en creatif pour solidifier votre imagination</div>
        </div>
    </section>
    <footer class="tomate">
    <a href="https://www.instagram.com/greencraft_g/%22%3E" target="_blank"><img id="appear" class="enderman" src="images/enderman.png" alt="enderman"></a>
        <h3 class="follow">Rejoins-nous sur Instagram et decouvre les prochaines fonctionnalites en avant-premieres !</h3>
    </footer>
</body>
<script src="https://unpkg.com/scrollreveal"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript">
    set = document.getElementsByClassName('caché')
    if (set != "") {
        $(window).on("load",function(){
            $(".loader-wrapper").fadeOut(2000);
        });
    }
    </script>
<script type="text/javascript" src="JavaScript/app.js"></script>
<script src="JavaScript/modalWindows.js"></script>
</html>