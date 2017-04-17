<main id="cours-php">
    <div class="container-fluid">
        <div class="row">
            <div class="well">
                <h1 class="text-center">Cours PHP & MySQL - Jour 13-14</h1>
                <p class="text-center"><small>Chaque lien, permet l'ouverture d'une pop'up avec le contenu à l'intérieur.</small></p>
            </div>
        </div>
    </div> <!-- Fin container-fluid -->
    <div class="container-fluid">
        <div class="well">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-4 col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4>PDO / MySQLi</h4>
                                </div>
                                <div class="panel-body">
                                    <ul>
                                        <li>MySQLi c'est quoi ?</li>
                                        <li>Un objet.. C'est quoi un objet ?</li>
                                        <li>PDO</li>
                                        <li>Connexion à la BDD</li>
                                        <li>Attention aux grosse erreurs</li>
                                    </ul>
                                </div>
                                <div class="panel-footer">
                                    <button type="button" class="btn btn-info btn-block btn-sm" data-toggle="modal" data-target="#php-mysql1">Voir le cours</button>
                                </div>
                            </div>
                        </div> <!-- Fin col-sm-4 col-md-3 col-lg-2 col-lg-offset-1 -->
                        <div class="col-sm-4 col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4>Comprendre les Exceptions</h4>
                                </div>
                                <div class="panel-body">
                                    <ul>
                                        <li>Comprendre le concept</li>
                                        <li>Capturer une erreur de saisi</li>
                                        <li>L'avantage de la POO..</li>
                                    </ul>
                                </div>
                                <div class="panel-footer">
                                    <button type="button" class="btn btn-info btn-block btn-sm" data-toggle="modal" data-target="#php-mysql2">Voir le cours</button>
                                </div>
                            </div>
                        </div> <!-- Fin col-sm-4 col-md-3 col-lg-2 col-lg-2 -->   
                        <div class="col-sm-4 col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4>La méthode QUERY</h4>
                                </div>
                                <div class="panel-body">
                                    <ul>
                                        <li>Méthode query</li>
                                        <li>Les danger de query</li>
                                        <li>query et fetch</li>
                                        <li>query et fetchAll</li>
                                        <li>La boucle while</li>
                                    </ul>
                                </div>
                                <div class="panel-footer">
                                    <button type="button" class="btn btn-info btn-block btn-sm" data-toggle="modal" data-target="#php-mysql3">Voir le cours</button>
                                </div>
                            </div>
                        </div> <!-- Fin col-sm-4 col-md-3 col-lg-2 col-lg-2 -->   
                        <div class="col-sm-4 col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4>La méthode PREPARE</h4>
                                </div>
                                <div class="panel-body">
                                    <ul>
                                        <li>Méthode prepare</li>
                                        <li>une requête avec un marqueur</li>
                                        <li>une requête nommé</li>
                                        <li>query et fetch</li>
                                        <li>query et fetchAll</li>
                                        <li>La boucle foreach</li>
                                    </ul>
                                </div>
                                <div class="panel-footer">
                                    <button type="button" class="btn btn-info btn-block btn-sm" data-toggle="modal" data-target="#php-mysql4">Voir le cours</button>
                                </div>
                            </div>
                        </div> <!-- Fin col-sm-4 col-md-3 col-lg-2 col-lg-2 --> 
                    </div> <!-- Fin row -->
                    <div class="row">
                        <div class="col-sm-12 col-lg-10 col-lg-offset-1">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h4>Exercices</h4>
                                </div>
                                <div class="panel-body">
                                    <ol>
                                        <hr>
                                        <li>Expliquez très brievement pourquoi utitiliser PDO ?</li>
                                        <li>Simplifiez votre connexion à PDO</li>
                                            <ul>
                                                <li>En procédurale</li>
                                                <li>En POO</li>
                                                <li>Expliquez laquel de ces 2 méthodes est pour vous la plus simple.</li>
                                            </ul>
                                        <li>Via la méthode query, afficher toutes les données d'un producteurs</li>
                                        <li>Via la méthode query encore, afficher toutes les données d'un revendeurs mais cette fois proprement dans un tableau</li>
                                        <li>Via la méthode query, afficher uniquement le client qui à l'id 5</li>
                                        <li>Via la méthode prepare, afficher toutes les données d'un revendeurs avec des marqueurs</li>
                                        <li>Via la méthode prepare, afficher toutes les données d'un clients avec des variables nommés</li>
                                        <li>Via la méthode prepare, afficher uniquement les produits correspondant au revendeur avec l'id 2</li>
                                        <h5>------------------------------ Bonus POO uniquement ------------------------------</h5>
                                        <li>Concevoir une classe voiture avec des propriétés qui seront de type privée. 
                                            <ul>
                                                <li>Une vitesse définit à 0</li>
                                                <li>Une marque</li>
                                                <li>Une couleur</li>
                                                <li>Un nombre de roue. Définit à 5</li>
                                            </ul>
                                        </li>
                                        <li>Instancier un nouvel objet</li>
                                        <li>L'ajout d'une méthode public pour lire les informations de mon véhicule</li>
                                        <li>L'ajout d'une méthode public pour ré-écrire les informations de mon véhicule</li>
                                        <h5>------------------------------ Bonus (Café offert)------------------------------</h5>
                                        <li>Se renseigner sur les bonnes pratique et ainsi respecter la convention d'écriture du PHP-FIG</li>
                                        <li>Concevoir un constructeur qui serait issue d'une classe parente.</li>
                                        <li>Définir une classe trotinette qui serait une classe final</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  <!-- Fin col-sm-12 -->
            </div>  <!--  Fin row-->
        </div>  <!-- Fin div.well -->
    </div> <!-- Fin container-fluid -->
</main>

        <!-- ============================================================================================ -->
        <!-- ================== MODAL PHP & MySQL -->
        <!-- ============================================================================================ -->
        <!-- Modal php-mysql1-->
        <div class="modal fade" id="php-mysql1" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><span class="glyphicon glyphicon-usd"></span></span> PDO / MySQLi</h4>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li>MySQLi c'est quoi ?</li>
                            <li>Un objet.. C'est quoi un objet ?</li>
                            <li>PDO</li>
                            <li>Connexion à la BDD</li>
                            <li>Attention aux grosse erreurs</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal php-mysql2-->
        <div class="modal fade" id="php-mysql2" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><span class="glyphicon glyphicon-usd"></span> Comprendre les Exceptions</h4>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li>Comprendre le concept</li>
                            <li>Capturer une erreur de saisi</li>
                            <li>L'avantage de la POO..</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal php-mysql3-->
        <div class="modal fade" id="php-mysql3" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><span class="glyphicon glyphicon-cog"></span> La méthode QUERY</h4>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li>Méthode query</li>
                            <li>Les danger de query</li>
                            <li>query et fetch</li>
                            <li>query et fetchAll</li>
                            <li>La boucle while</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal php-mysql4-->
        <div class="modal fade" id="php-mysql4" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><span class="glyphicon glyphicon-log-in"></span> La méthode PREPARE</h4>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li>Méthode prepare</li>
                            <li>une requête avec un marqueur</li>
                            <li>une requête nommé</li>
                            <li>query et fetch</li>
                            <li>query et fetchAll</li>
                            <li>La boucle foreach</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>