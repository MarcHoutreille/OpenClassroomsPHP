<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'YbZbgfEnjB*aMK4Q', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) /* error handling */ {
    die('Erreur');
}
$articleToedit = $_POST['id'];
$editedArticle = addslashes($_POST['editedarticle']);
echo $articleToedit;
echo $editedArticle;

$req = $db->prepare("UPDATE `articles` SET `content`='$editedArticle' WHERE `id`='$articleToedit'");
$req->execute();

header('Location: news.php');