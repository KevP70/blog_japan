<?php

session_start();
require_once('connect.php');

$article = $pdo->query('SELECT * FROM article ORDER BY id DESC');

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
    <title>Blog Japan</title>
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
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
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
                <li><a>Blog Japan</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <header>
        <a href="#"><img src="images/kyoto.jpg"></a>
    </header>

    <section>
        <div class="row">
            <div class="col-md-8">
                <article class="blog-post">
                    <div class="blog-post-image">
                        <a href="#"><img src="images/food.jpg" alt=""></a>
                    </div>
                    <div class="blog-post-body">
                        <h2><a href="#">The Best Street Style Looks of London Fashion Week</a></h2>
                    </div>
                </article>
                <!-- article -->
                <article class="blog-post">
                    <div class="blog-post-image">
                        <a href="#"><img src="images/visit.jpg" alt=""></a>
                    </div>
                    <div class="blog-post-body">
                        <h2><a href="#">The Best Street Style Looks of London Fashion Week</a></h2>
                    </div>
                </article>
                <!-- article -->
                <article class="blog-post">
                    <div class="blog-post-image">
                        <a href="#"><img src="images/fff.png" alt=""></a>
                    </div>
                    <div class="blog-post-body">
                        <h2><a href="#">The Best Street Style Looks of London Fashion Week</a></h2>
                    </div>
                </article>

            <div class="col-md-4 sidebar-gutter">
                <aside>

                    <!-- sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">Categories</h3>
                        <div class="widget-container">
                            <ul class="ld">
                                <?php while($a = $article->fetch()){?>
                                    <li>
                                        <a href="articleDetails.php?id=<?= $a['id'] ?>"> <?= $a['title'] ?></a>
                                    </li>
                                <?php } ?>
                            </ul
                        </div>
                    </div>
                    <!--end side bar-->
            </div>
            </aside>
        </div>
</div>
</section>
</div><!-- /.container -->

<footer class="footer">

    <div class="footer-socials">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-google-plus"></i></a>
        <a href="#"><i class="fa fa-dribbble"></i></a>
        <a href="#"><i class="fa fa-reddit"></i></a>
    </div>

    <div class="footer-bottom">
        <i class="fa fa-copyright"></i>Blog Japan<br>
    </div>
</footer>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.bxslider.js"></script>
<script src="js/mooz.scripts.min.js"></script>
</body>
</html>