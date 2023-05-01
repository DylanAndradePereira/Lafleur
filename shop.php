<?php include 'header.php'?>
    <main>
        <div id="navCategories">
            <ul>
            <!-- Affichage des catégories -->
            <?php
                require 'connection.php';
                $table = $dbh->query('SELECT * FROM t_categorie');
                $tableProduits = $table->fetchAll();
                
                if (isset($_GET["categ"]) and !empty($_GET["categ"])){
                    //Si l'utilisateur a cherché par catégorie, on crée une variable categ
                    $categ = htmlspecialchars($_GET["categ"]);
                }

                //BOUCLE DES CATEGORIES
                foreach ($tableProduits as $ligne) {
                    echo "<a href='shop.php?categ=".$ligne['idCategorie']."' style='text-decoration: none;color: black'>
                    <li";
                    if (isset($categ) && ($categ==$ligne['idCategorie'])){
                        //Si l'utilisateur a sélectionné cette catégorie, on la mets en valeur
                        echo ' style="border:solid black"';                
                    }
                    echo ">".$ligne['libelle']."</li></a>";
                } 
            ?>
            </ul>
        </div>

        <form class="rechercheShop">
            <input type="text" name="recherche" id="recherche" 
                <?php
                    if(isset($_GET["recherche"]) and !empty($_GET["recherche"])){
                        //Si l'utilisateur a cherché quelque chose, on le remets dans la barre de recherche
                        $recherche= htmlspecialchars($_GET["recherche"]);
                        echo 'value="'.$recherche.'"';
                    }
                ?>
                style="width:100%;height:auto;padding-left:20px">
            <button type="submit"></button>
        </form>
        <!-- Boucle des articles -->
        <?php
            if(isset($recherche)){
                //Articles selon une recherche
                $table = $dbh->prepare('SELECT * FROM t_produit WHERE Designation LIKE CONCAT("%", :recherche, "%")');
                $table->bindParam(':recherche', $recherche);
                $table->execute();
                $comeBack = 'recherche';
            } else {
                if (isset($categ)){
                    //Articles selon une catégorie
                    $table = $dbh->prepare('SELECT * FROM t_produit WHERE idCategorie=:categ');
                    $table->bindParam(':categ', $_GET["categ"]);
                    $table->execute();
                    $comeBack = 'categ';
                } else {
                    //Tous les articles
                    $table = $dbh->query('SELECT * FROM t_produit');
                }
            }

            echo '<div id="shop">';
                $tableProduits = $table->fetchAll();
                foreach ($tableProduits as $ligne) {
                    //Affichage de chaque article demandé
                    echo '<div class="card" id="article_'.$ligne['idProduit'].'">
                            <img src="./images/'.$ligne['Image'].'" alt="'.$ligne['Designation'].'">
                            <h2>'.$ligne['Designation'].'</h2>
                            <p>'.$ligne['Description'].'</p>
                            <form action="backend/panierAdd.php">';

                                if (isset($comeBack)){
                                    echo '<input type="hidden" name="'.$comeBack.'" value=';
                                    switch ($comeBack) {
                                        case 'categ':
                                            echo $categ.'>';
                                            break;
                                        case 'recherche':
                                            echo '"'.$recherche.'">';
                                            break;
                                    }
                                    
                                }
                                //Le bouton pour commander
                                echo '<button type="submit" name="idProduit" value='.$ligne['idProduit'].'>COMMANDER</button>
                            </form>
                        </div>';

                } 
                if(($table -> rowCount()) == 0){ 
                    echo "<div style='font-size: 2vw;'>Aucun résultat</div>";
                }
            ?>         
        </div>
    </main>
<!--  -->

<?php include 'footer.php'?>
</body>
</html>