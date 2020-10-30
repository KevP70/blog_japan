<?php

session_start();

if(isset($_GET['category_id']) && !empty($_GET['category_id'])){

require_once('connect.php');

$sql = "SELECT * FROM  article WHERE category_id  = $_GET[category_id] ORDER BY id ASC ";
$query = $pdo->prepare($sql);

$query->execute();

$articles = $query->fetchAll(PDO::FETCH_ASSOC);

}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>articles</title>
</head>
<body>
   
    <table class="table">
        <thead>
            <th>title</th>
            <th>content</th>
            <th>created</th>
            <th>updated</th>
        </thead>
        <tbody>
            <?php
            foreach($articles as $article){
            ?>
                <tr>
                    <td><?= $article['title'] ?></td>
                    <td><?= $article['content'] ?></td>
                    <td><?= $article['createdAt'] ?></td>
                    <td><?= $article['updatedAt'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</body>
</html>