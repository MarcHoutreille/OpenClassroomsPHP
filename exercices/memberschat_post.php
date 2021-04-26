<?php
session_start();

try {
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'YbZbgfEnjB*aMK4Q', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) /* error handling */ {
    die('Erreur');
}
/* On prépare la requête à executer, les valeurs sur lesquelles ont va opérer */ 
$req = $db->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
/* On éxecute la requête */
$req->execute(array($_SESSION['nickname'], $_POST['message']));

// Redirection du visiteur vers la page du minichat
header('Location: memberschat.php');

?>