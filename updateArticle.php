<?php
session_start();
require_once('connect.php');

    $ins = $pdo->prepare('SELECT * FROM article WHERE id= :num');
    $ins->bindParam(':num', $_GET['article_modifier']);
    $ins->execute();
    $article = $ins->fetch();

    if(isset($_POST['id'])){
            $id = $_REQUEST['id'];
            $id = intval($id);
            $title = $_POST['title'];
            $content = $_POST['content'];
            $date = date('Y-m-d');
            $article = $pdo->prepare("UPDATE article SET title = '$title', content = '$content', updatedAt = '$date' WHERE id = '$id'");
            $article->execute();
    }     

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
   
    <form action="updateArticle.php" method="POST">
        <input type="hidden" name="id" value="<?= $article['id']?>">
        <input type="text" name="title" placeholder="title">
        <textarea name="content" id="" cols="30" rows="10" placeholder="content"></textarea>
        <input type="submit" name="article_modifier" value="Modifier">
    </form>

</body>
</html>