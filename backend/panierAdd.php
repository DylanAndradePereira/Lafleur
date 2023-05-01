<?php
session_start();
include '../connection.php';

$idProduit = htmlspecialchars($_REQUEST["idProduit"]);
$idPanier = htmlspecialchars($_SESSION['idPanier']);

//Vérification de si le produit est déjà dans le panier
$verif = $dbh->prepare("SELECT * FROM `contenir` 
                        WHERE `idProduit`=:idProduit AND `idPannier`=:idPanier;");
$verif->bindParam(':idProduit', $idProduit);
$verif->bindParam(':idPanier', $idPanier);
$verif->execute();
$nbVerif = $verif->fetch();

//Envoi dans la base de données
if ($nbVerif){
       //Incrémenter la quantité pour ce produit dans le panier
       $quantite = $nbVerif['quantite']+1;

       $stmt = $dbh->prepare("UPDATE `contenir` SET `quantite`=:quantite 
                               WHERE `idProduit`=:idProduit AND `idPannier`=:idPanier;");
       $stmt->bindParam(':quantite', $quantite);
} else {
     //Ajouter le produit dans le panier
     $stmt = $dbh->prepare("INSERT INTO `contenir`(`idProduit`, `idPannier`, `quantite`) 
     VALUES (:idProduit,:idPanier,1)");
}
$stmt->bindParam(':idProduit', $idProduit);
$stmt->bindParam(':idPanier', $idPanier);
$stmt->execute();

//Récupération de la variable comeback
$comeBack = "";
if (isset($_REQUEST['categ'])){
    $comeBack = "?categ=".htmlspecialchars($_REQUEST["categ"]);
} else {
    if (isset($_REQUEST['recherche'])){
        $comeBack = "?recherche=".htmlspecialchars($_REQUEST["recherche"]);
    }
}

//Revenir à la page
header("location: ../shop.php".$comeBack."#article_".$idProduit);   
?>