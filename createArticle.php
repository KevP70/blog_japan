<?php

session_start();
require_once('connect.php');
require('function.php');

$query = $pdo->prepare('SELECT * FROM category');
$query->execute();
$categories = $query->fetchAll();


if(isset($_POST['title'])){
    if(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['category_id'])) {

        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = intval($_POST['category_id']);
        $date = date('Y-m-d');

        $ins = $pdo->prepare("INSERT INTO post (title, content, createdAt, category_id) VALUES (:title, :content, NOW(), :category)");
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Blog Japan</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
   <!-- Custom styles for this template -->
    <link href="css/jquery.bxslider.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>


<style>
    .nav-item{
        padding-right: .5rem;
        padding-left: .5rem;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand" href="#">Japan</a>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a href="Acceuil.php">Acceuil</a></li>
            <li class="nav-item active"><a href="about.html">A propos</a></li>
            <li class="nav-item active"><a href="about.html">Contact</a></li>
        </ul>
    </div>
</nav>

<hr>

<h1>Ajouter un article</h1>
<hr>
<div class="m-auto">
    <div class="col-md-6">
        <div class="card card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label>Titre</label>
                    <input type="text"  name="title" placeholder="title">
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Contenu de votre article</span>
                    </div>
                    <textarea name="content" id="" cols="30" rows="10" placeholder=""></textarea>
                </div><br>
                <div class="form-group">
                    <select class="form-control" name="category_id">
                        <option type="text" value="<?= $categories['id']?>">Choisir une Catégorie</option>
                        <?php foreach($categories as $category):?>
                            <option value="<?= $category['id'] ?>"><?= $category['categoryName'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-success">
                <?php if(isset($message)){echo $message;}?>
            </form>
        </div>
    </div>
</div>
<hr>
<footer class="footer">

    <div class="footer-bottom">
        <i class="fa fa-copyright"></i>Blog Japan<br>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.bxslider.js"></script>
<script src="js/mooz.scripts.min.js"></script>
</body>
</html>