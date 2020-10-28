<?php

session_start();
require_once('connect.php');
require('function.php');

$query = $pdo->prepare('SELECT * FROM categories');
$query->execute();
$categories = $query->fetchAll();


if(isset($_POST['title'])){
    if(isset($_POST['title']) && isset($_POST['title']) && isset($_POST['content']) && isset($_POST['category_id'])) {
        
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = intval($_POST['category_id']);
    $date = date('Y-m-d');

    $ins = $pdo->prepare("INSERT INTO article (title, content, createdAt, category_id) VALUES (:title, :content, NOW(), :category)");
    $ins->bindParam(':title', $title);
    $ins->bindParam(':content', $content);
    $ins->bindParam(':category', $category);
    $ins->execute();
 
    $message = 'Votre article a bien été ajouté'; 
        
    }else{
        $message = "Veuillez remplir tous les champs";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="" method="POST">

        <input type="text" name="title" placeholder="title">

        <textarea name="content" id="" cols="30" rows="10" placeholder="content"></textarea>

        <select name="category_id">
            <option type="text" value="<?= $categories['id']?>">Choisir une Catégorie</option>
            <?php foreach($categories as $category): ?>
                <option value="<?= $category['id'] ?>"><?= $category['categoryName'] ?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit">

        <?php if(isset($message)){echo $message;}?>

    </form>

</body>
</html>