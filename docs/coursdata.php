<?php
// On doit d'abord créer un objet PDO avec les informations de connexion
$pdo = new PDO(
    'mysql:dbname=videogame;host=127.0.0.1:3306;charset=UTF8',
    // charset permet de transmettre proprement les caractères UTF-8
    'root', // login
    'root', // password
    // le tableau qui précise d'afficher les erreurs
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]
);

//  On souhaite ajouter un jeu :
// $sql = "
//     INSERT INTO `videogame` (`title`, `editor`, `release_date`)
//     VALUES ('Jurassic Park', 'Lucas Arts', '1996-08-04');
// ";


//  On exécute la requête :
// $result = $pdo->exec($sql);
// $result contient un entier avec le nombre de ligne concernées par la requête SQL
// ou alors il contient FALSE en cas d'erreur
// On ne le fait pas ici mais on pourrait tester la valeur de $result pour être sûr que tout fonctionne

// On peut aussi récupérer tous les jeux avec une requête SELECT dans la méthode query()

// $sql = '
//     SELECT *
//     FROM videogame;
// ';

//  La méthode query() retourne un objet PDOStatement qui contient nos résultats de requête
// $results = $pdo->query($sql);

// On utilise fetchAll en lui précisant de nous retourner un tableau associatif de tous les résultats
//$videogameList = $results->fetchAll(PDO::FETCH_ASSOC);

// On boucle sur $videogameList pour afficher la liste des jeux

//  echo '<ul>';
// foreach ($videogameList as $videogame) {
//     echo '<li>' . $videogame['title'] . '</li>';
// }
// echo '</ul>';