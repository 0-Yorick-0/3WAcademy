<?php
    // Inclusion du fichier header.php
    require_once 'app/config/include/header.php';
?>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php
            // Inclusion du header
            include 'app/config/include/nav.php';
        ?>
        <main id="home">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="jumbotron">
                            <h1 class="text-center">Programme de session PHP</h1>
                            <hr>
                            <h2 class="text-center"><small>Quelques petites règles simple :</small></h2>
                            <ol>
                                <li>Pratiquez souvent et ça viendra automatiquement</li>
                                <li>Amusez vous à développer des petites choses qui vous amuse.</li>
                                <li>Si vous bloquez sur quelque chose, faites une pause parfois c'est une erreur tellement idiote qu'on ne l'apperçoit pas tout de suite...</li>
                                <li>Ne ré-inventez pas la roue. Dîtes vous bien que ce que vous pensez certains y ont déjà pensé et que l'information se trouve sur internet.</li>
                                <li>Entraidez-vous, partager ces connaissances c'est très bien. Corriger son collègue c'est apprendre de ces erreurs.</li>
                                <li>Ne faîtes surtout pas l'erreur de vouloir tout apprendre, c'est impossible... Les langages évoluent sans cesse.</li>
                                <li>Ne faîtes jamais confiance à l'utilisateur qui inscrira quoi que ce soit. Une saisie peut vous détruire des heures de boulots...</li>
                                <li>Vos données doivent être sauvegarder sans cesse. Gardez toujours une copie propre à l'abri. (Git est magique pour ça).</li>
                            </ol>
                            <hr>
                            <div class="alert alert-info">
                                <p>Ci-dessous, un lien vers le ChangeLog de la dernière version de PHP :<br />
                                <a href="http://php.net/ChangeLog-7.php#7.1.1">Version 7.1.1 du 19 Janvier 2017</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Fin container main -->
        </main>
        <?php
            // inclusion du footer
            include 'app/config/include/footer.php';
        ?>
