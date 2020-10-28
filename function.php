<?php

function creatSlug($string, $delimiter = '-')
{
    $oldLocale = setlocale(LC_ALL, '0');
    setlocale(LC_ALL, 'en_US.UTF-8');
    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
    $clean = strtolower($clean);
    $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
    $clean = trim($clean, $delimiter);
    setlocale(LC_ALL, $oldLocale);
    return $clean;
}





function selectCategory()
{
    try 
    {
        $connect = new PDO('mysql:host=localhost;dbname=blog_japan', 'root', '');
        $connect->exec('SET NAMES "UTF8"');
    }
    catch (PDOException $i) 
    {
        echo 'Erreur : ' . $i->getMessage();
        die();
    }
    $sql = "SELECT * FROM category";
    $query = $connect->prepare($sql);
    $query->execute();
    $categories = $query->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
}

?>

