<?php include 'header.php'?>

    <main>

        <div id="navCategories">
            <ul>
            <!-- Boucle des catégories -->
            <?php
                require 'connection.php';
                $table = $dbh->query('SELECT * FROM t_categorie');
                $tableProduits = $table->fetchAll();
                foreach ($tableProduits as $ligne) {
                    echo "<li>".$ligne['libelle']."</li>";
                } 
            ?>
            </ul>
        </div>

        <div class="rechercheShop">
            <input type="text" name="" id="">
            <button type="submit"></button>
        </div>

        <div id="shop">
            <!-- Boucle des articles -->
            <?php
                $table = $dbh->query('SELECT * FROM t_produit');
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
            ?>         
        </div>
    </main>
<!--  -->

<?php include 'footer.php'?>
</body>
</html>