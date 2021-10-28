<?php

// Inclusion du fichier s'occupant de la connexion à la DB (TODO)
require __DIR__.'/inc/db.php'; // Pour __DIR__ => http://php.net/manual/fr/language.constants.predefined.php
// Rappel : la variable $pdo est disponible dans ce fichier
//          car elle a été créée par le fichier inclus ci-dessus

// Initialisation de variables (évite les "NOTICE - variable inexistante")
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
    // TODO #3 exécuter la requête qui insère les données
    // TODO #3 une fois inséré, faire une redirection vers la page "index.php" (fonction header)
    // --- START OF YOUR CODE ---


    // --- END OF YOUR CODE ---
}

// Liste des consoles de jeux
// TODO #4 (optionnel) récupérer cette liste depuis la base de données
// --- START OF YOUR CODE ---
$platformList = [  
    1 => 'PC',
    2 => 'MegaDrive',
    3 => 'SNES',
    4 => 'PlayStation'
];


// --- END OF YOUR CODE ---

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