<?php
session_start();
require_once('connect.php');

    $ins = $pdo->prepare('SELECT * FROM category WHERE id= :num');
    $ins->bindParam(':num', $_GET['category_modifier']);
    $ins->execute();
    $category = $ins->fetch();


    if(isset($_POST['id'])){
            $id = $_REQUEST['id'];
            $id = intval($id);
            $title = $_POST['categoryName'];
            $category = $pdo->prepare("UPDATE category SET categoryName = '$title' WHERE id = '$id'");
            $category->execute();
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
   
    <form action="updateCategory.php" method="POST">
        <input type="hidden" name="id" value="<?= $category['id']?>">
        <input type="text" name="categoryName" placeholder="title">
        <input type="submit" name="category_modifier" value="Modifier">
    </form>

</body>
</html>