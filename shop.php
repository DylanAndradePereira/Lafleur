<?php include 'header.php'?>
    <main>
        <div id="navCategories">
            <ul>
            <!-- Boucle des catégories -->
            <?php
                require 'connection.php';
                $table = $dbh->query('SELECT * FROM t_categorie');
                $tableProduits = $table->fetchAll();
                
                if (isset($_GET["categ"]) and !empty($_GET["categ"])){
                    $categ = $_GET["categ"];
                }
                foreach ($tableProduits as $ligne) {
                    echo "<a href='shop.php?categ=".$ligne['idCategorie']."' style='text-decoration: none;color: black'>
                        <li";
                        if (isset($categ) && ($categ==$ligne['idCategorie'])){
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
            } else {
                if (isset($categ)){
                    $table = $dbh->prepare('SELECT * FROM t_produit WHERE idCategorie=:categ');
                    $table->bindParam(':categ', $_GET["categ"]);
                    $table->execute();
                } else {
                    $table = $dbh->query('SELECT * FROM t_produit');
                }
            }
            echo '<div id="shop">';
                $tableProduits = $table->fetchAll();
                foreach ($tableProduits as $ligne) {
                    echo '<div class="card">
                            <img src="./images/'.$ligne['Image'].'" alt="'.$ligne['Designation'].'">
                            <h2>'.$ligne['Designation'].'</h2>
                            <p>'.$ligne['Description'].'</p>
                            <form>
                                <button type="submit" id="commande_'.$ligne['idProduit'].'">COMMANDER</button>
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