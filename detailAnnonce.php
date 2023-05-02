<?php include 'header.php'?>
    <main>

    <?php
        include 'connection.php';
        
        $table = $dbh->prepare('SELECT * FROM t_produit WHERE idProduit=:idProduit');
        $table->bindParam(':idProduit', $_REQUEST["produit"]);
        $table->execute();

        $datasProduit = $table->fetch();
    ?>
        <div id="containerDetail">
            <div class="rowPhone row">
                <div class="column leftDetail">

                    <div class="row">
                        <div class="whiteBox">
                            <?php echo $datasProduit['Designation'] ?>
                        </div>
                        <span class="greenBox">
                            <?php echo $datasProduit['prix']."€" ?>
                        </span>
                    </div>

                    <p class="desc"><?php echo $datasProduit['Description'] ?></p>

                    <a href="backPanier/panierAdd.php?idProduit=<?php echo $datasProduit['idProduit'] ?>" >
                         <div class="row">
                            <div class="whiteBox">
                                Ajouter
                                
                            </div>
                            <span class="greenBox">
                                ->
                            </span>
                        </div>
                    </a>
                </div>
        
                <div class="rightDetail">
                    <img src="./images/<?php echo $datasProduit['Image'] ?>" alt=""><!-- src a modifier -->
                </div>
              </div>
        </div>

    </main>
    <?php include 'footer.php'?>
</body>
</html>