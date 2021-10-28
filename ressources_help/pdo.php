<?php

// Le constructeur de PDO prend :
//   - le DSN, une chaine de caractère qui représente le type de connexion
//        'mysql:dbname=DATABASENAME;host=localhost'
// $pdo = new PDO('mysql:dbname=oblog;host=localhost', 'explorateur', 'Ereul9Aeng');
//$pdo= new PDO('mysql:dbname=oblog;host=127.0.0.1:3306', 'ophelie','mdp');
// vrai md passe non communiqué :)

// On a un objet de la classe PDO, qui est connecté à la base de données
// et qui permet de faire des requêtes, avec les méthodes ->query() et ->exec()

// On créer la requête dans une variable

//$sql = '
   // SELECT *
  //  FROM post
// ';
//var_dump($pdo, $sql);
// Il existe deux méthodes distinctes,
// exec va exécuter du code et query va aller chercher des données

// Pour une requête SELECT, il faut donc utiliser query()
// query() retourne un objet de la classe PDOStatement
// $result = $pdo->query($sql);
//var_dump($result->fetchAll());// Avec fetchAll on obtient tous les résultats d'un coup
// On précise en argument de qu'elle on souhaite que les données soient réprésentées
// $tableauAssociatif = $result->fetchAll(PDO::FETCH_ASSOC);
// var_dump($tableauAssociatif);
//foreach ($tableauAssociatif as $article) {
    echo $article['title'] . ' - ' . $article['published_date'] . '<br>';
//}
// @question on peut demander à afficher le 4e article quand on a pas ID 4 mais le 4e article a l'ID 7 ?
// Oui :
//$article4 = $tableauAssociatif[3];

//while ($article = $result->fetch(PDO::FETCH_ASSOC)) {
    // echo $article['title'] . ' - ' . $article['published_date'] . '<br>';
// }

 // $sql = "
//     INSERT INTO `category` (`name`)
//     VALUES ('Humour'),('Horreur'),('Et que la lumière soit…')
// ";
 //$result = $pdo->exec($sql);
 //var_dump($result);
