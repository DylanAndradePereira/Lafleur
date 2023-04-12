<?php

    try {
        $dbh = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    } catch (PDOException $e) {
        die();
    }

?>