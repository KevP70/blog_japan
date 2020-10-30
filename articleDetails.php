<?php
session_start();
require_once('connect.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $get_id = htmlspecialchars($_GET['id']);
    $article = $pdo->prepare('SELECT * FROM article WHERE id = ?');
    $article->execute(array($get_id));
    if($article->rowCount() == 1){
        $article = $article->fetch();
        $title = $article['title'];
        $content = $article['content'];
        $createdAt = $article['createdAt'];
        $updatedAt = $article['updatedAt'];
    }else{
        die("Cet article n'existe pas !");
    }
}else{
    die('Error');
}

?>

<!DOCTYPE html>
<html lang="en">

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
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="Acceuil.php">Acceuil</a></li>
                <li><a href="about.html">A propos</a></li>
                <li><a href="about.html">Contact</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
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
                                    <h1><?= $title ?></h1>
                                    <p><?= $content ?></p>
                                    <p><?= $createdAt ?></p>
                                    <p><?= $updatedAt ?></p>
                                    <a class="delete" href="deleteArticle.php?article_delete=<?= intval($article['id']) ?> ">Supprimer</a>
                                    <a class="delete" href="updateArticle.php?article_modifier=<?= intval($article['id']) ?> ">Modifier</a>
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