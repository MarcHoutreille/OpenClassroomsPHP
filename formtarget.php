<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form target</title>
</head>

<body>

    <p>
        <?php

        echo "Bonjour " .  htmlspecialchars($_POST["prenom"]);

        ?>
    <form method="post" action="vegan.php">
        <p> <label> Etes vous végétarien ? <input type="checkbox" name="vegan" /> </label></p>
        <p><input type="submit" /></p>
    </form>
</body>

</html>