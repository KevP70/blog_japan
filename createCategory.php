<?php
session_start();
require_once('connect.php');
require('function.php');



    if(isset($_POST['categoryName'])) { 

            $name = $_POST['categoryName'];

            $ins = $pdo->prepare("INSERT INTO category (categoryName) VALUES ('$name') ");
            var_dump($ins);
            $post = $ins->execute();

           

            $message = 'Votre categorie a bien été créée';
        }else {
            $message = "Veuillez remplir tous les champs";
        }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une categorie</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="" method="POST">
        <input type="text" name="categoryName" placeholder="categoryName">
        <input type="submit">
        <?php if(isset($message)){echo $message;}?>
    </form>
    
</body>
</html>