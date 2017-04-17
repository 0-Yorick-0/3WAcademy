<main id="cours-php">
    <div class="container-fluid">
        <div class="row">
            <div class="well">
                <h1 class="text-center">Cours MySQL - Jour 10,11,12</h1>
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
                                    <h4>Approfondir SQL</h4>
                                </div>
                                <div class="panel-body">
                                    <ul>
                                        <li>La clause WHERE</li>
                                        <li>Utiliser des Alias</li>
                                        <li>GROUP BY / HAVING</li>
                                        <li>LIMIT</li>
                                        <li>BETWEEN</li>
                                        <li>IN</li>
                                    </ul>
                                </div>
                                <div class="panel-footer">
                                    <button type="button" class="btn btn-info btn-block btn-sm" data-toggle="modal" data-target="#mysql6">Voir le cours</button>
                                </div>
                            </div>
                        </div> <!-- Fin col-sm-4 col-md-3 col-lg-2 col-lg-offset-1 -->
                        <div class="col-sm-4 col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4>Les jointures</h4>
                                </div>
                                <div class="panel-body">
                                    <ul>
                                        <li>JOIN</li>
                                        <li>INNER JOIN</li>
                                        <li>LEFT JOIN</li>
                                        <li>RIGHT JOIN</li>
                                        <li>ALIAS avec les JOINTURES</li>
                                    </ul>
                                </div>
                                <div class="panel-footer">
                                    <button type="button" class="btn btn-info btn-block btn-sm" data-toggle="modal" data-target="#mysql7">Voir le cours</button>
                                </div>
                            </div>
                        </div> <!-- Fin col-sm-4 col-md-3 col-lg-2 col-lg-2 -->   
                        <div class="col-sm-4 col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4>Les dates</h4>
                                </div>
                                <div class="panel-body">
                                    <ul>
                                        <li>DATE</li>
                                        <li>DATETIME / TIMESTAMP</li>
                                        <li>TIME</li>
                                        <li>YEAR / MONTH / DAY</li>
                                        <li>NOW</li>
                                        <li>HOUR / MINUTE / SECOND</li>
                                    </ul>
                                </div>
                                <div class="panel-footer">
                                    <button type="button" class="btn btn-info btn-block btn-sm" data-toggle="modal" data-target="#mysql8">Voir le cours</button>
                                </div>
                            </div>
                        </div> <!-- Fin col-sm-4 col-md-3 col-lg-2 col-lg-2 -->   
                        <div class="col-sm-4 col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4>Les fonctions</h4>
                                </div>
                                <div class="panel-body">
                                    <ul>
                                        <li>AVG</li>
                                        <li>COUNT</li>
                                        <li>DISTINCT</li>
                                        <li>MAX / MIN</li>
                                        <li>AND / OR</li>
                                    </ul>
                                </div>
                                <div class="panel-footer">
                                    <button type="button" class="btn btn-info btn-block btn-sm" data-toggle="modal" data-target="#mysql9">Voir le cours</button>
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
                                        <li>Utiliser la clause WHERE pour afficher des éléments spécifique</li>
                                        <ol>
                                            <li>l'id compris entre 9 et 15</li>
                                            <li>5 recherches par nom ou prénom</li>
                                            <li>Lister tous les nom mais faîtes en sortes qu'ils ne se répètent pas. (Astuce DISTINCT)</li>
                                            <li>Afficher tous les utilisateurs qui sont inférieur à 25 ans</li>
                                            <li>Afficher tous les utilisateurs qui sont supérieur à 18 ans</li>
                                        </ol>
                                        <li>Créer une table achat avec : <span class="text-danger">Attention au one-to-many / many-to-many :D</span></li>
                                        <ol>
                                            <li>producteurs</li>
                                                <ul>
                                                    <li>id</li>
                                                    <li>nom</li>
                                                    <li>adresse</li>
                                                    <li>produit</li>
                                                    <li>revendeur</li>
                                                    <li>date_fabrication</li>
                                                </ul>
                                            <li>revendeurs</li>
                                                <ul>
                                                    <li>id</li>
                                                    <li>nom</li>
                                                    <li>adresse</li>
                                                    <li>producteur</li>
                                                    <li>client</li>
                                                    <li>produit</li>
                                                    <li>categorie</li>
                                                    <li>date_vente</li>
                                                </ul>
                                            <li>clients</li>
                                                <ul>
                                                    <li>id</li>
                                                    <li>nom</li>
                                                    <li>prenom</li>
                                                    <li>plafond</li>
                                                    <li>revendeur</li>
                                                    <li>produits</li>
                                                    <li>date_achat</li>
                                                </ul>
                                            <li>produits</li>
                                                <ul>
                                                    <li>id</li>
                                                    <li>reference</li>
                                                    <li>prix</li>
                                                    <li>categorie</li>
                                                    <li>producteur</li>
                                                    <li>revendeur</li>
                                                    <li>client</li>
                                                </ul>
                                        </ol>
                                        <li>Dans cette nouvelle bdd, concevez :</li>
                                        <ul>
                                            <li>6 enregistrements pour producteurs</li>
                                            <li>3 enregistrements pour revendeurs</li>
                                            <li>5 enregistrements pour clients</li>
                                            <li>15 enregistrements pour produits</li>
                                        </ul>
                                        <li>Afficher maintenant tous les clients qui ont acheté des produits en 2017</li>
                                        <li>Comptez le prix moyen par catégorie de produit.</li>
                                        <li>Afficher le produit le plus chèr chez le revendeur</li>
                                        <li>Afficher le produit le plus moins chèr chez le revendeur</li>
                                        <h5>------------------------------ Bonus ------------------------------</h5>
                                        <li>Découvrez par vous mêmes d'autres fonctionnalités possible sur SQL</li>
                                        <h5>------------------------------ Bonus (Café offert)------------------------------</h5>
                                        <li>Afficher :</li>
                                        <ul>
                                                <li>Goupez par catégorie les produits.</li>
                                                <li>Attention, afficher uniquement le revendeur qui dispose d'un prix inférieur à la moyenne globale des prix de chaque catégorie.</li>
                                            </ul>
                                        <li>Affichez le tout en une seule requête :
                                            <ul>
                                                <li>Le nom de chaque produit qu'un client à acheter chez le revendeur qui dispose d'un id égale à 4</li>
                                                <li>Afficher le nom du revendeur.</li>
                                                <li>Afficher celui qui produit les articles qui ont été acheté par le client.</li>
                                            </ul>
                                        </li>
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