<?php
session_start();
require_once('connect.php');

    $category = $pdo->query('SELECT * FROM categories ORDER BY id DESC');

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorie</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <ul>
        <?php while($c = $category->fetch()){?>
        <li>  
            <a href=""><?= $c['categoryName'] ?></a>
            <a href="deleteCategory.php?category_delete=<?= intval($c['id']) ?> ">Supprimer</a>
            <a href="updateCategory.php?category_modifier=<?= intval($c['id']) ?> ">Modifier</a>
        </li>
         <?php } ?>
    </ul>
    
</body>
</html>