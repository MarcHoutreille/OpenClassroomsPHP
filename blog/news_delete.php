<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'YbZbgfEnjB*aMK4Q', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) /* error handling */ {
    die('Erreur');
}
// BIG SAFETIES
if (isset($_COOKIE['nickname']) && ($_COOKIE['nickname'] == "admin")) {
    $id = $_GET['id'];
    $req = $db->prepare("DELETE FROM `articles` WHERE id ='$id' ");
    $req->execute();
    echo "<p> article " . $id . " supprimé </p>";
        }
    
header("Location:news.php");
