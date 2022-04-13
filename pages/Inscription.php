<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inscription.css">
    <title>GreenCraft</title>
    <link rel="icon" sizes="32x32" type="image/png" href="images/Minecraft Logo.png" />
</head>
<style>
#container{
  width:80%;
  margin:10vh 0 0 10vw;
}

.btn {
  height: 70px;
  width: 70px;
  background: green;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  position: fixed;
  right: 20px;
  bottom: 20px;
  cursor: pointer;
  z-index: 9999;
}
.arrow{
  z-index: 10000;
  width: 70%;
  height: 70%;
}
/* Bordered form */
form {
    width:100%;
    padding: 30px;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
#container h1.title{
    text-shadow:5px 5px 5px green;
    font-family: Redressed;
}
#container h1{
    width: 100%;
    margin: 0 auto;
    padding-bottom: 10px;
    margin-bottom: 10px;
    font-family: Montserrat, sans-serif;
    font-weight: 500;
    font-size: 3rem;}
/* Full-width inputs */
input[type=password]#password {
    width: 70%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 5px;
    position: relative;
    top: 2vh;
    left: 10vw;
}
input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 5px;
}
input[type=email]{
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 5px;
}
.cas{
    display: flex;
}
.champ {
    width: 200px;
    position: relative;
    top: 3vh;
    left: 0.5vw;  
}
.mail {
    display: flex
}
.phone {
    width: 220px;
    height: 35px;
    position: relative;
    top: 2vh;
}

</style>
<header>
        <div id="loader-wrapper">
            <div id="loader"></div>
        
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        
        </div>
        <button class="mobile-nav-bar" aria-controls="menu" aria-expanded="false"></button>
        <nav class="navbar dark-mode" role="navigation">
            <div class="navbar__logo" title="Greencraft_Logo"><a href="../"><img src="../images/1.png" alt="Minecraft" width="100%"></a></div>
                <div>
                    <ul class="navbar__links" style="position: relative; right:33vw">
                        <li class="navbar__link first"><a id="link" href="../">Accueil</a></li>
                        <li class="navbar__link second"><a id="link" href="../pages/Les Commandes">Les Commandes</a></li>
                        <li class="navbar__link third"><a id="link" href="../pages/Règlement">Règlement</a></li>
                        <li class="navbar__link four"><a id="link" href="../pages/Contact">Contact</a></li>
                    </ul>
                </div>
                <button class="burger"><span class="bar"></span></button>
        </nav>
    </header>
        <div class="btn">
        <img src="../images/arrow-up-solid.svg" class="arrow" alt="remonter la page">
        </div>
    </div>
    <div id="container" class="contact">
        <form id="form" class="contact" action="signup.php" method="post">
            <h1 class="title">Inscription</h1>
            <p class="required"><span style="color:red; weigth:bold">*</span>: Champs Obligatoires</p>
            <!-- nom & prénom -->
            <div class="cas">
                <p class="champ">Nom :<span style="color:red; weigth:bold">*</span>     </p>
                    <input type="text" name="Nom" required/>
                <p class="champ">Prénom :<span style="color:red; weigth:bold">*</span>     </p>
                    <input type="text" name="Prénom" required/>
            </div>
            <!-- Pseudo In-Game -->
            <div class="cas">
                <p class="champ">Pseudo In-Game :<span style="color:red; weigth:bold">*</span> </p>
                    <input style="width:30%" type="text" name="Pseudo" maxlength=25 required/>
                    <small style="color: red;position:relative;right:37vw;top:6vh">Longueur Max: 25 caractères</small>
            </div>
            <!-- Adresse e-mail -->
            <div class="mail">
                <p class="champ">Adresse e-mail : <span style="color:red; weigth:bold">*</span></p>
                    <input type="email" name="Email" required/>
            </div>
            <!-- Mot de Passe -->
            <div class="password">
                <p class="champ">Mot de Passe :<span style="color:red; weigth:bold">*</span>     </p>
                    <input id="password" type="password" name="password" required/>
                <br>
                <p class="champ" style="width:500px">Confirmation du Mot de Passe :<span style="color:red; weigth:bold">*</span>     </p>
                    <input id="password" type="password" name="confirmation" required/>
            </div>
            <!-- Numéro de Téléphone -->
            <div class="cas">
                <p class="champ">Numéro de téléphone :</p>
                    <input id="input" class="phone" type=    "tel"$ name="Numéro"
                    pattern="[0-9]{2}  [0-9]{2}  [0-9]{2}  [0-9]{2}  [0-9]{2}"
                    maxlength=18 />
                <small style="color: grey;position: relative; top:10vh">Format: 12-34-56-78-90</small>
                </div>
                <!-- Bouton d'envoi -->
                <br>
            <input type="submit" name="submit" />
        </form> 
    </div>
<script src="https://unpkg.com/scrollreveal"></script>
<script>
    var input = document.getElementById("input");
    input.onkeydown = function () {
        if ((input.value.length != 0)&&(input.value.length < 18)) {
            if (input.value.length % 2 == 0) {
                input.value += "  ";
            }
        }
    }
    
</script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="JavaScript/app.js"></script>
<script src="JavaScript/modalWindows.js"></script>
</body>
</html>