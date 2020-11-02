
<?php
session_start();
require_once('connect.php');

$id = $_REQUEST["article_delete"];
$id = intval($id);
$req = $pdo->prepare("DELETE FROM post WHERE id = $id ");
$req->execute();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression</title>
</head>

<body>

    <h1>Votre article a bien été supprimé</h1>

</body>
</html>