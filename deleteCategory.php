<?php
session_start();
require_once('connect.php');

    $id = $_REQUEST["category_delete"];
    $id = intval($id);
    $req = $pdo->prepare("DELETE FROM category WHERE id = $id ");
    $req->execute();  
    
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression</title>
</head>

<body>
    <h1>Votre catégorie à bien été supprimée</h1>

    <a href="Acceuil.php"> Revenir à l'accueil</a>
</body>
</html>