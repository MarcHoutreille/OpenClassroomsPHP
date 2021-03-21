<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'YbZbgfEnjB*aMK4Q', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) /* error handling */ {
    die('Erreur');
}


/* On prépare la requête à executer, les valeurs sur lesquelles ont va opérer */
/* pas besoin d'ajouter la date, elle se créé automatiquement a l'éntrée dans la DB*/ 
$req = $db->prepare("INSERT INTO `articles`(`author`, `title`, `content`) VALUES (?,?,?)");
/* On éxecute la requête */
$req->execute(array($_COOKIE['nickname'], $_POST['articletitle'], $_POST['articlecontent']));

// Redirection du visiteur vers la page du minichat
header('Location: news.php');

