<?php
require "connection.php" ;

$sql0=$dbh->query("INSERT INTO `t_pannier`() VALUES ()");

$panier= $dbh->lastInsertId();

$sql=$dbh ->prepare('INSERT INTO t_user VALUES(:mail_login, :nom, :prenom, :adresse, :ville, :codePostal, :motDePasse, :panier) ');
$sql->bindParam(':mail_login', $_REQUEST['email']);
$sql->bindParam(':nom', $_REQUEST['nom']);
$sql->bindParam(':prenom', $_REQUEST['prenom']);
$sql->bindParam(':adresse', $_REQUEST['adresse']);
$sql->bindParam(':ville', $_REQUEST['ville']);
$sql->bindParam(':codePostal', $_REQUEST['codePostal']);
$sql->bindParam(':motDePasse', SHA1($_REQUEST['motDePasse']));
$sql->bindParam(':panier', $panier);

$sql->execute();

header("location: ../profil.php");   
?>
