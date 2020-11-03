<?php
session_start();
require_once('connect.php');

    $category = $pdo->query('SELECT * FROM category ORDER BY id DESC');

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
    <title>BlogJapan</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="css/jquery.bxslider.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">    <title>Catégories</title>
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
<div class="container">
    <header>
    </header>
    <section>
        <div class="row">
            <div class="">
                <article class="blog-post">
                    <div class="blog-post-image">
                        <img src="https://picsum.photos/1140/500?random=1">
                    </div>
                    <div class="blog-post-body">
                        <div class="blog-post-text">
                            <div class="container">
                                <div class="card card-body" style="padding: 1.25rem !important">
                                    <ul>
                                        <?php
                                        while ($c = $category->fetch()) {
                                            ?>
                                            <li>
                                                <a href=""><?= $c['categoryName'] ?></a>
                                                <a href="deleteCategory.php?category_delete=<?= intval($c['id']) ?> ">Supprimer</a>
                                                <a href="updateCategory.php?category_modifier=<?= intval($c['id']) ?> ">Modifier</a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </article>
        </div>
</div>
</section>
</div><!-- /.container -->
<footer class="footer">
    <div class="footer-bottom">
        <i class="fa fa-copyright"></i>Blog Japan<br>
    </div>
</footer>
</body>
</html>