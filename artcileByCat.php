<?php

session_start();
require_once('connect.php');
require('function.php');
$catego = selectCategory();

$categories = $pdo->query('SELECT categoryName FROM categories');

$article = $pdo->query('SELECT * FROM article ORDER BY createdAt DESC');

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Blog</title>
</head>

<body>

    <div class="collapse navbar-collapse">
        <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
            <li>
                <p class="nav-pl-0 categoliste">Catégorie</p>
            </li>
            <?php foreach($categories as $value){ ?>
                <li value="<?php echo $value; ?>"><a href="categoryList.php?category=<?= $value['categoryName']; ?>"><?php echo $value['categoryName']; ?></a></li>
            <?php } ?>
            <li>
                <a class="nav-pl-0" href="createArticle.php">Create post</a>
            </li>
        </ul>
    </div>


    </main>
  
</body>

</html>