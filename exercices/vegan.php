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

    if (isset($_POST["name"])) {
        echo "Bonjour";
    }

    if (isset($_POST["vegan"])) {
        echo "vous êtes vegetarien.";
    } else {
        echo "vous n'êtes pas végétarien";
    }
    ?>
</body>
</html>