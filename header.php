<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./css/index.css">
    <title>Lafleur</title>
</head>
<body> 

<?php
session_start();

//Vérif admin
if (isset($_SESSION['admin']) && ($_SESSION['admin'])){
    $admin = true;
} else {
    $admin = false;
}
?>

<header>
    <ul id="navbar">
        <a href="#"><li><img src="./icons/rmbg_logoLaFleur.png"></li></a>
        <a href="./index.php"><li>ACCUEIL</li></a>
        <a href="./shop.php"><li>SHOP</li></a>
        <a href="./profil.php"><li>
            <?php if(isset($_SESSION['email'])){
                echo "PROFIL</li></a>
                <a href='./deconnect.php'><li>DECONNEXION</li></a>
                ";
            } else {
                echo "CONNEXION</li></a>";
            }
            ?>
        <a href="./panier.php"><li>PANIER</li></a>
    </ul>
</header>