<main id="cours-php">
            <div class="container-fluid">
                <div class="row">
                    <div class="well">
                        <h1 class="text-center">Cours PHP - Jour 7 et 8</h1>
                        <p class="text-center"><small>Chaque lien, permet l'ouverture d'une pop'up avec le contenu à l'intérieur.</small></p>
                    </div>
                </div>
            </div> <!-- Fin container-fluid -->
            <div class="container-fluid">
                <div class="well">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h4><span class="glyphicon glyphicon-usd"></span> Les superglobales</h4>
                                        </div>
                                        <div class="panel-body">
                                            <ul>
                                                <li>$_GET</li>
                                                <li>$_SERVER</li>
                                                <li>$_POST</li>
                                                <li>$_SESSION</li>
                                                <li>$_COOKIE</li>
                                            </ul>
                                        </div>
                                        <div class="panel-footer">
                                            <button type="button" class="btn btn-info btn-block btn-sm" data-toggle="modal" data-target="#php16">Voir le cours</button>
                                        </div>
                                    </div>
                                </div> <!-- Fin col-sm-4 -->   
                                <div class="col-sm-4">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h4><span class="glyphicon glyphicon-cog"></span> Les REGEX</h4>
                                        </div>
                                        <div class="panel-body">
                                            <ul>
                                                <li>C'est quoi ?</li>
                                                <li>Explication</li>
                                                <li>Tester une regex en HTML</li>
                                                <li>Tester une regex en Javascript</li>
                                                <li>Tester une regex en PHP</li>
                                            </ul>
                                        </div>
                                        <div class="panel-footer">
                                            <button type="button" class="btn btn-info btn-block btn-sm" data-toggle="modal" data-target="#php17">Voir le cours</button>
                                        </div>
                                    </div>
                                </div> <!-- Fin col-sm-4 -->   
                                <div class="col-sm-4">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h4><span class="glyphicon glyphicon-log-in"></span> Htaccess & Htpasswd</h4>
                                        </div>
                                        <div class="panel-body">
                                            <ul>
                                                <li>Htaccess</li>
                                                <li>Htpasswd</li>
                                                <li>La faille traversing</li>
                                                    <ol>
                                                        <li>Avec un index</li>
                                                        <li>Avec un htaccess</li>
                                                    </ol>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="panel-footer">
                                            <button type="button" class="btn btn-info btn-block btn-sm" data-toggle="modal" data-target="#php18">Voir le cours</button>
                                        </div>
                                    </div>
                                </div> <!-- Fin col-sm-4 --> 
                            </div> <!-- Fin row -->
                        </div>  <!-- Fin col-sm-12 -->
                    </div>  <!--  Fin row-->
                    <div class="row">
                        <div class="col-sm-12 col-lg-10 col-lg-offset-1">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h4>Exercices</h4>
                                </div>
                                <div class="panel-body">
                                    <ol>
                                        <hr>
                                        <li>Concevez 2 exemple de $GLOBALS. Comment l'utiliser ?</li>
                                        <li>Afficher le résultat de $_SERVER proprement.</li>
                                        <li>Concevez un petit formulaire sur la methode GET et afficher un résultat classique.</li>
                                        <li>Concevez un formulaire en poste. Extraire les données et affichez les dans une page résultat.</li>
                                        <li>Créer une nouvelle page et faîtes en sorte que votre session garde en mémoire votre nom et prénom.</li>
                                        <li>Créer une nouvelle page et cette fois, faîtes en sorte que votre cookie affiche sur une autre page votre nom, prénom et votre sexe.</li>
                                        <li>Concevoir une régex permettant de contrôler et d'afficher uniquement un numéro de téléphone de type 06/07 sans espace</li>
                                        <li>Concevoir une régex permettant de contrôler et d'afficher uniquement un numéro de téléphone de type 06/07 avec espace</li>
                                        <li>Concevoir une régex permettant de contrôler et d'afficher uniquement un numéro de téléphone de type 08 avec un point</li>
                                        <li>Concevoir une régex permettant de contrôler et d'afficher uniquement un numéro de téléphone de type 08 avec un tirret</li>
                                        <li>Concevoir une régex permettant de contrôler et d'afficher uniquement un numéro de téléphone de type 04 avec espace, point, tirret.</li>
                                        <li>Concevoir une régex permettant de contrôler et d'afficher une image au format .png / .jpeg et .jpg</li>
                                        <li>Concevoir une régex permettant de contrôler et d'afficher Une addresse email.</li>
                                        <li>Concevoir une régex permettant de contrôler et d'afficher Une addresse web.</li>
                                        <h5>------------------------------ Bonus ------------------------------</h5>
                                        <li>Créer un formulaire d'enregistrement avec :</li>
                                        <ol>
                                            <li>Le nom</li>
                                            <li>Le prénom</li>
                                            <li>L'age</li>
                                            <li>Le sexe</li>
                                            <li>Téléphone</li>
                                        </ol>
                                        <li>contrôler l'existence d'une regex directement sur windows</li>
                                        <li>Découverte et utilisation de la fonction preg_match</li>
                                        <li>Utilisation des filtres de PHP. Chercher les filtres disponible sur le site de PHP et indiquez des exemples.</li>
                                        <h5>------------------------------ Bonus (Café offert)------------------------------</h5>
                                        <li>Trouvez comment récupérer les informations d'une image en php. Et afficher les à l'écran.</li>
                                        <li>Conception d'un petit chat. Pour ceux qui connaisse imaginez le nouveau caramail en version grossier ^^"</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  <!-- Fin div.well -->
            </div> <!-- Fin container-fluid -->
        </main>

        <!-- ============================================================================================ -->
        <!-- ================== MODAL PHP -->
        <!-- ============================================================================================ -->
        <!-- Modal php16-->
        <div class="modal fade" id="php16" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><span class="glyphicon glyphicon-usd"></span> Les superglobales</h4>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li>$_GET</li>
                            <li>$_SERVER</li>
                            <li>$_POST</li>
                            <li>$_SESSION</li>
                            <li>$_COOKIE</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal php17-->
        <div class="modal fade" id="php17" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><span class="glyphicon glyphicon-cog"></span> Les REGEX</h4>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li>C'est quoi ?</li>
                            <li>Explication</li>
                            <li>Tester une regex en HTML</li>
                            <li>Tester une regex en Javascript</li>
                            <li>Tester une regex en PHP</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal php18-->
        <div class="modal fade" id="php18" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><span class="glyphicon glyphicon-log-in"></span> Htaccess & Htpasswd</h4>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li>Htaccess</li>
                            <li>Htpasswd</li>
                            <li>La faille traversing</li>
                                <ol>
                                    <li>Avec un index</li>
                                    <li>Avec un htaccess</li>
                                </ol>
                            </li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>