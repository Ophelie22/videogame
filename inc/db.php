<?php
// On doit d'abord créer un objet PDO avec les informations de connexion
$pdo = new PDO(
    'mysql:dbname=videogame;host=127.0.0.1:3306;charset=UTF8',
    // charset permet de transmettre proprement les caractères UTF-8
    'ophelie', // login
    'pensee', // password
   
);
?>