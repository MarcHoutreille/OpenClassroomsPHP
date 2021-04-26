<?php

try{
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) /* error handling */
{
    die('Erreur');
}
/* get all entries from jeux_video */

/* requete préparée */
/* obtenir un resultat a partir d'une requete GET (par ex dans l'url ?console=... ) */
$wholeTable = $db->prepare('SELECT * FROM jeux_video WHERE console=?');
$wholeTable->execute(array($_GET['console']));
while ($data = $wholeTable->fetch())
{
    echo "<p>" . $data['nom'] . " - " . $data['console'] . " - " . $data['prix'] . "€ </p>";
}
/* close the session with the table, avoids errors down the day */
$wholeTable->closeCursor();
?>