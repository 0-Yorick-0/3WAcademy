<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Formation - PHP | 3WA</title>
        <meta name="description" content="Formation sur php à la 3WA by Alain">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS -->
        <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../bower_components/wow/css/libs/animate.css">
        <link rel="stylesheet" href="../public/css/myStyle.css">
        <link rel="stylesheet" href="../public/css/emmet.css">
        <!-- FONT GOOLE -->
        <link href="https://fonts.googleapis.com/css?family=Josefin+Slab|Trirong" rel="stylesheet">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
                <header>
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <!-- navbar-header -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myMenu">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="index.php" class="navbar-brand">Promotion - <span class="text-danger">LYO13</span></a>
                    </div> <!-- Fin navbar.header -->
                    <!-- navbar-collapse -->
                    <div class="collapse navbar-collapse" id="myMenu">
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Menu cours -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cours <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="../cours_php.php" >Cours PHP</a></li>
                                    <li class="divider" role="separator"></li>
                                    <li><a href="../cours_mysql.php">Cours MySQL</a></li>
                                    <li class="divider" role="separator"></li>
                                    <li><a href="../cours_php&mysql.php">Cours PHP & MySQL</a></li>
                                </ul>
                            </li> <!-- Fin menu cours -->
                            <!-- Menu projets -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Projets <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" >Projet PHP - Formulaire à valider</a></li>
                                    <li><a href="#" >Projet PHP - Concevoir ces propres Regex</a></li>
                                    <li><a href="#" >Projet PHP - Afficher les informations d'une image</a></li>
                                    <li><a href="#" >Projet PHP - Créer un chat</a></li>
                                    <li class="divider" role="separator"></li>
                                    <li><a href="#">Projet MySQL - Concevoir sa propre base de donnée</a></li>
                                    <li class="divider" role="separator"></li>
                                    <li><a href="#">Projet PHP & MySQL - Compteur de visite</a></li>
                                    <li><a href="#">Projet PHP & MySQL - Menu dynamique</a></li>
                                    <li><a href="#">Projet PHP & MySQL - Créer son Twitter ?</a></li>
                                    <li><a href="#">Projet PHP & MySQL - Concevoir son espace membre ?</a></li>
                                </ul> <!-- Fin menu projets -->
                            </li>
                            <!-- Menu bonus -->
                                    <li><a href="../bonus/bower.php" >Bower</a></li>
                                    <li><a href="../bonus/github.php">Github</a></li>
                                    <li><a href="../bonus/emmet.php">Emmet</a></li>
                                    <li><a href="../bonus/sass.php">Sass</a></li>
                        </ul>
                    </div> <!-- Fin navbar-collapse -->
                </div> <!-- Fin div.container -->
            </nav>
        </header>

        <main id="emmet">
            <span><img src="http://cepegra-labs.be/webdesign/wp-content/uploads/2015/05/emmet1-1100x250.png" alt="" class="emmet"></span>
            <div class="container-fluid">
                <div class="row">
                    <div class="bg-warning text-center">
                        <h1><span><img src="http://emmet.io/i/logo-large.png" alt="" class="emmet2"></span></h1>
                        <blockquote>
                            <p class="lead"><strong><small>Bower nous permet d'éviter de répéter les mêmes tâches lors de la conception d'un nouveau site... <br />
                            En sommes, c'est un outil de management de librairies pour le web.</small></strong></p>                
                        </blockquote>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-4 well">
                        <h3><span class="glyphicon glyphicon-folder-open"></span> - Création du répertoire</h3>
                        <hr>
                        <p>- Il est évident que pour pouvoir utiliser Bower, il faut un répertoire... </p>
                        <p>- Deux possibilités :</p>
                        <dl>
                            <dt>1 °) Installation classique</dt>
                            <dd>Si vous êtes en locahost, dirigez-vous dans votre outils suivi du répertoire appelé "www" et créer le répertoire avec le nom qu'il vous plaira.</dd>
                            <dt>2 °) Installation via Git</dt>
                            <dd>L'avantage de git c'est que vous pourrez versionner votre projet. Créer un repository sur votre compte git, copier l'adresse de votre repository puis dans l'invite de commande au même endroit que précédemment, utiliser la commande suivante : </p>
                            <hr>
                            <code>git clone URL_A_INDIQUER</code> 
                            <hr>
                            <p>puis valider par la touche entrer. De là faite un : </p>
                            <hr>
                            <code>cd le_nom_de_votre_repository</code>
                            <hr>
                            <p>et valider par entrer.</p></dd>
                        </dl>
                        <p>- Voilà magie vous avez installé un dépôt git que vous allez pouvoir administrer aisément.</p>
                    </div>

                    <div class="col-sm-4 well">
                        <h3><span class="glyphicon glyphicon-save"></span> - Installer Bower</h3> 
                        <hr>
                        <p>- Avant toute chose il faut installer Bower dans le répertoire précédemment créer.</p>
                        <p>- Pour celà, on va utiliser l'invite de commande et saisir quelques lignes de codes.</p>
                        <p>- Dans un premier temps on se rends dans son répertoire qu'on a précédemment créer avec la ligne de code suivante :</p>
                        <hr>
                        <code>
                            cd le_chemin_de_votre_repertoire_ici
                        </code>
                        <hr>
                        <p>- Puis on valide par la touche entrer du clavier.</p>
                        <p>- Une fois qu'on se trouve dans son répertoire, on saisit la ligne de code suivante qui nous permettra d'installer bower dans notre dossier.</p>
                        <hr>
                        <code>
                            npm install -g bower
                        </code>
                        <hr>
                        <p>- Voilà une fois que cette ligne est taper, bower est prêt à être utiliser.</p>
                    </div>

                    <div class="col-sm-4 well">
                        <h3><span class="glyphicon glyphicon-globe"></span> - Installer les dépendances</h3> 
                        <hr>
                        <p>- Maintenant c'est la partie la plus cool qui soit.</p>
                        <p>- Pour installer une dépendance, rien de plus simple, il faut se rendre sur le site : <a href="https://bower.io/search/">bower.io/search/</a> Ici vous n'aurez qu'à taper ce que vous voulez installer.</p>
                        <p>- Méfiez-vous à la colonne "stars" plus le nombre de stars est élevée, mieux c'est. Si vous avez un paquet qui vous intéresse, mais qu'il n'y a que 3 stars, éviter.. autant laissé aux autres les potentiels bug qu'il pourrait y avoir.</p>
                        <p>- Alors une fois que vous avez choisis ce que vous voulez, copier le titre du paquet et rendons nous dans l'invite de commande. (Pour l'exemple je vais choisir bootstrap).</p>
                        <hr>
                        <p><small>Saississons :</small></p><br />
                        <code>
                            bower install bootstrap
                        </code>
                        <hr>
                        <p>- Laissons le faire et regardons le résultat. Magie, un dossier "bower_components" est apparue dans notre répertoire.</p>
                        <p>- Voilà, c'est fini... ce fût très compliquer...</p>
                    </div>
                </div>
            </div>
        </main>
        
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <h5 class="text-center">By Alain - For the promotion LYO13</h5>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Script Jquery -->
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Script Bootstrap -->
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Script wow -->
        <script src="../bower_components/wow/dist/wow.min.js"></script>
        <script>
            new WOW().init();
        </script>
        <!-- Script perso -->
        <script src="../public/js/myScript.js"></script>
    </body>
</html>
