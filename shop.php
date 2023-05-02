<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>shop</title>
</head>
<body>
    <main>
        <section>
            
            <?php

                include "connection.php";
                $sql='SELECT * FROM t_produit;';
                if(isset($_GET["recherche"]) and !empty($_GET["recherche"])){
                    $recherche= htmlspecialchars($_GET["recherche"]);
                    $sql='SELECT * FROM t_produit WHERE Designation LIKE "%'.$recherche.'%";';
                }
                $table = $dbh->query($sql);
                ?>

                <form method="get">
                    <input type="search" name="recherche" id="recherche" placeholder="Recherche..." onfocusout="verif()" />
                    <input type="submit" value="Valider" />
                    <div id="erreurRecherche"></div>
                </form>

                <?php
                    if($table -> rowCount() > 0){ ?>
                        <form action="info-produit.php" method="get">
                        <ul>
                            <?php
                                while($ligne = $table->fetch()) 
                                    {
                                        echo
                                            "<li>
                                                <a href='info-produit.php?id=".$ligne["idProduit"]."><a/> 
                                                <a href='info-produit.php?id=".$ligne["idProduit"]."' >
                                                    <h2>".$ligne = utf8_encode($ligne["Designation"])."</h2>
                                                    <p>". $ligne["prix"].'€ </p>
                                                    <img src = "images/'.$ligne["Image"].'" >
                                                </a>
                                            </li>';
                                    }
                                $table->closeCursor();
                                ?>
                        </ul>
                        </form><?php
                    }else { ?>
                        <div>Aucun résultat pour: <?  $recherche ?> ...</div>
                        <?php } ?>
        </section>
    </main>
</body>
    <script>
        function verif(){
            var Recherche = document.getElementById("recherche").value;
            var regex =/^[a-zA-Z\séèêëàâùûîïôöç\'\"\.]{0,50}$/;
            if (Recherche.match(regex)){
                erreurRecherche.innerHTML = "";
            }else{
                erreurRecherche.innerHTML = "<font color = red style=\"font-size:80%\"> Attention, merci d'entre des caractères valide !</font>";
            }
        }
    </script>
</html>