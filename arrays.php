<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $noms = array("Mathieu", "Marie", "Jim");
    $personne = array("nom" => "Mathieu", "prenom" => "Nebra", "age" => 99);

    for ($numero = 0; $numero < 3 ;$numero++) {
        echo "<p>" . $noms[$numero] . "</p>";
    }

    echo "avec foreach";

    foreach ($noms as $nom) {
        echo "<p>" . $nom . "</p>";
    }

    foreach ($personne as $label => $detail) {
        echo "<p>" . $label . " vaut " . $detail . "</p>";
    }
    ?>
</body>
</html>