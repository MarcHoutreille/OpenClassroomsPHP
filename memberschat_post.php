<?php
session_start();

try {
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) /* error handling */ {
    die('Erreur');
}

$req = $db->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
$req->execute(array($_SESSION['nickname'], $_POST['message']));

// Redirection du visiteur vers la page du minichat
header('Location: memberschat.php');

?>