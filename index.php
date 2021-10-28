<?php

// Inclusion du fichier s'occupant de la connexion à la DB (TODO)
require __DIR__.'/inc/db.php'; // Pour __DIR__ => http://php.net/manual/fr/language.constants.predefined.php
// Rappel : la variable $pdo est disponible dans ce fichier

$videogameList = [];
$platformList = [];
$name = '';
$editor = '';
$release_date = '';
$platform = '';

// Si le formulaire a été soumis
if (!empty($_POST)) {
    // Récupération des valeurs du formulaire dans des variables
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $editor = isset($_POST['editor']) ? $_POST['editor'] : '';
    $release_date = isset($_POST['release_date']) ? $_POST['release_date'] : '';
    $platform = isset($_POST['platform']) ? intval($_POST['platform']) : 0;

    // TODO #3 (optionnel) valider les données reçues (ex: donnée non vide)
    // --- START OF YOUR CODE ---

    // --- END OF YOUR CODE ---

    // Insertion en DB du jeu video
    $insertQuery = "
        INSERT INTO videogame (name, editor, release_date, platform_id)
        VALUES ('{$name}', '{$editor}', '{$release_date}', {$platform})
    ";
    //#3 exécuter la requête qui insère les données
    $pdo->exec($insertQuery);

    //3 une fois inséré, faire une redirection vers la page "index.php" (fonction header)
    //Sans la redirection, le navigateur se souvient que la page a été générée depuis l'envoi d'un formulaire
    // Donc, si on recharge la page, le navigateur propose de renvoyer le formulaire. Actuellement, ça nous ferait ajouter le même jeu une nouvelle fois
    // Pour éviter ça, on redirige l'utilisateur sur index.php, mais cette fois, la page sera chargée en GET, ce qui élimine le problème expliqué
    header('Location: index.php');


    // --- END OF YOUR CODE ---
}
// Liste des consoles de jeux
//#4 (optionnel) récupérer cette liste depuis la base de données

// $platformList = [  
//     1 => 'PC',
//     2 => 'MegaDrive',
//     3 => 'SNES',
//     4 => 'PlayStation'
// ];
$result = $pdo->query('SELECT * FROM platform');
$fetchPlatform  = $result ->fetchAll(PDO::FETCH_ASSOC);
// on va faire une boucle , et initialiser platformList en tt que tableau vide, ca va
// ressembler a ce qu'il y aplus haut sauf qu'il sera dynamiquement cree à partir 
//de la base de données
//$platformList = [];initialiser deja en haut d epage
foreach($fetchPlatform as $resultatPlatform){
    $platformList[$platform['id']] = $platform['name'];
}

$sql = '
    SELECT * 
    FROM videogame
';

// Si un tri a été demandé, on réécrit la requête
if (!empty($_GET['order'])) {
    // Récupération du tri choisi
    $order = trim($_GET['order']);
    if ($order == 'name') {
       
        $sql = '
            SELECT * 
            FROM videogame
            ORDER BY name ASC
        ';
    }
    else if ($order == 'editor') {
       
        $sql = '
            SELECT * 
            FROM videogame
            ORDER BY editor ASC
        '; 
    }
}

// $pdo est un objet de la classe PDO
// $result est un objet de la classe PDOStatement (un résultat de requête)
// $videogameList est un tableau avec tous les résultats

// On peut faire le code du commentaire précédent en une seule ligne
$videogameList = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

//var_dump($videogameList);
// Inclusion du fichier s'occupant d'afficher le code HTML
// Je fais cela car mon fichier actuel est déjà assez gros, donc autant le faire ailleurs (pas le métier hein ! ;) )
require __DIR__.'/view/videogame.php';