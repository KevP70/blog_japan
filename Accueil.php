<?php

session_start();
require_once('connect.php');
require('function.php');

$article = $pdo->query('SELECT * FROM post ORDER BY id ASC');
$categories = $pdo->query('SELECT * FROM category ORDER BY id ASC');
$post = $pdo->query('SELECT * FROM post_category');

$sql = $pdo->prepare("SELECT
                        *
                        FROM post
                        JOIN post_category
                        ON post.id = post_category.post_id
                        JOIN category
                        ON category.id = post_category.category_id;");
$sql->execute();

$articles = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Blog Japan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="css/jquery.bxslider.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<style>
    .nav-item {
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
        <a href="#"><img src="images/japanlogo.png"></a>
    </header>
    <section class="main-slider">
        <ul class="bxslider">
            <li>
                <div class="slider-item"><img src="https://picsum.photos/1140/500?random=1">
                    <h2><a href="createdArticle.php" title="Vintage-Inspired Finds for Your Home">Ajouter un article</a>
                    </h2></div>
            </li>
            <li>
                <div class="slider-item"><img src="https://picsum.photos/1140/500?random=1">
                    <h2><a href="createdArticle.php" title="Vintage-Inspired Finds for Your Home">Ajouter un article</a>
                    </h2></div>
            </li>
            <li>
                <div class="slider-item"><img src="https://picsum.photos/1140/500?random=1">
                    <h2><a href="createdArticle.php" title="Vintage-Inspired Finds for Your Home">Ajouter un article</a>
                    </h2></div>
            </li>
        </ul>
    </section>
    <section>
        <div class="row">
            <div class="col-md-8">
                <article class="blog-post">
                    <div class="blog-post-image">
                        <a href="#"><img src="images/food.jpg" alt=""></a>
                    </div>
                    <div class="blog-post-body">
                        <h2>SEASONS</h2>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi quisquam ipsa inventore?
                            Eos suscipit soluta laudantium cupiditate, quod commodi maxime corporis, rem ducimus
                            error perferendis quae optio veritatis officiis non!</p>
                    </div>
                </article>
                <!-- article -->
                <article class="blog-post">
                    <div class="blog-post-image">
                        <a href="#"><img src="images/visit.jpg" alt=""></a>
                    </div>
                    <div class="blog-post-body">
                        <h2>JAPANESE FOOD</h2>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi quisquam ipsa inventore?
                            Eos suscipit soluta laudantium cupiditate, quod commodi maxime corporis, rem ducimus
                            error perferendis quae optio veritatis officiis non!</p>
                    </div>
                </article>
                <!-- article -->
                <article class="blog-post">
                    <div class="blog-post-image">
                        <a href="#"><img src="images/TokyoSafari.jpg" alt=""></a>
                    </div>
                    <div class="blog-post-body">
                        <h2>TOURISME</h2>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi quisquam ipsa inventore?
                            Eos suscipit soluta laudantium cupiditate, quod commodi maxime corporis, rem ducimus
                            error perferendis quae optio veritatis officiis non!</p>
                    </div>
                </article>
            </div>
            <div class="col-md-4 sidebar-gutter">
                <aside>
                    <!-- sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">Socials</h3>
                        <div class="widget-container">
                            <div class="widget-socials">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-reddit"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">Categories</h3>
                        <div class="widget-container">
                            <form action="byCat.php" method="GET">
                                <div>
                                    <select name="category_id">
                                        <option type="text">Voir les articles par Catégorie</option>
                                        <?php foreach ($categories as $cat): ?>
                                            <option value="<?= $cat['id'] ?>"><?= $cat['categoryName'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Envoyer</button>
                            </form>
                        </div>
                    </div>
            </div>
            </aside>
        </div>
</div>
</div>
</section>
</div><!-- /.container -->

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