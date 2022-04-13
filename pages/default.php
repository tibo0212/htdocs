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
                    <ul class="navbar__links">
                        <li class="navbar__link first"><a id="link" href="../">Accueil</a></li>
                        <li class="navbar__link second"><a id="link" href="../pages/Les Commandes">Les Commandes</a></li>
                        <li class="navbar__link third"><a id="link" href="../pages/Règlement">Règlement</a></li>
                        <li class="navbar__link four"><a id="link" href="../pages/Contact">Contact</a></li>
                    </ul>
                </div>
            <?php
            session_start();
            if ((isset($_SESSION['username'])||(isset($_COOKIE['logged_user'])))) {
                if(isset($_COOKIE['logged_user'])) {
                    // afficher un logo & un message de bienvenu à partir du cookie
                    echo '<div class="username">';
                    if($_SERVER!="localhost"){
                        echo '<center><a href="/?deconnexion=true"><img src="../images/account.png" alt="Mon compte" title="se déconnecter"></a>';
                        echo '<p class="username">';
                        echo "Bonjour ", $_COOKIE['logged_user'];
                        echo '</center>';
                        echo "</p>";
                        echo "</div>";
                    }
                    else{
                        echo '<center><a href="/?deconnexion=true"><img src="images/account.png" alt="Mon compte" title="se déconnecter"></a>';
                        echo '<p class="username">';
                        echo "Bonjour ", $_COOKIE['logged_user'];
                        echo '</center>';
                        echo "</p>";
                        echo "</div>";
                    }                    if(isset($_GET['deconnexion']) && ($_GET['deconnexion'])) {
                        session_unset();
                        setcookie(
                            'logged_user',
                            "",
                            [
                                'expires' => time() + 365*24*3600,
                                'secure' => true,
                                'httponly' => true,
                            ]
                        );  
                        header("location:../");
                    }
                    }
                else{
                    // sinon crée un cookie qui notera le pseudo de l'utilisateur pendant une année
                    $user = $_SESSION['username'];
                    setcookie(
                        'logged_user',
                        "$user",
                        [
                            'expires' => time() + 365*24*3600,
                            'secure' => true,
                            'httponly' => true,
                        ]
                    );                    // afficher un logo & un message de bienvenu
                    echo '<div class="username">';
                    if($_SERVER!="localhost"){
                        echo '<center><a href="/?deconnexion=true"><img src="../images/account.png" alt="Mon compte" title="se déconnecter"></a>';
                        echo '<p class="username">';
                        echo "Bonjour ", $user;
                        echo '</center>';
                        echo "</p>";
                        echo "</div>";
                    }
                    else{
                        echo '<center><a href="/?deconnexion=true"><img src="images/account.png" alt="Mon compte" title="se déconnecter"></a>';
                        echo '<p class="username">';
                        echo "Bonjour ", $user;
                        echo '</center>';
                        echo "</p>";
                        echo "</div>";
                    }
                    if(isset($_GET['deconnexion']) && ($_GET['deconnexion']))
                    {
                        session_unset();
                        setcookie(
                            'logged_user',
                            "",
                            [
                                'expires' => time() + 365*24*3600,
                                'secure' => true,
                                'httponly' => true,
                            ]
                        );
                        header("location:../");
                    }
                }
                }

            else {
                // si aucun utilisateur n'est connecté, alors proposer un bouton de connexion
                echo '<button class="modal-btn modal-trigger">Connexion</button>';
            }
            ?>
                <button class="burger"><span class="bar"></span></button>
        </nav>
    </header>
    <div class="modal-container">
        <div class="overlay modal-trigger"></div>
            <div class="modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="dialogDesc">
                <button aria-label="close modal" class="close-modal modal-trigger">X</button>
                <div id="container">
                    <!-- zone de connexion -->

                    <form action="../pages/verification" method="POST">
                            <h1 id="modalTitle">Connexion</h1>
                            <label><strong>Pseudo/Email</strong></label>
                            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                            <label><strong>Mot de passe</strong></label>
                            <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                            <a class="inscription" href="../pages/Inscription">Pas encore inscrit ?!</a>
                            <input type="submit" id='submit' value='LOGIN' >
                            <?php
                            if(isset($_GET['erreur'])){
                                $err = $_GET['erreur'];
                                if($err==1 || $err==2){
                                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                                    }
                            }
                            ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="btn">
        <img src="../images/arrow-up-solid.svg" class="arrow" alt="remonter la page">
        </div>
    </div>