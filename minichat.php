<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="minichat_post.php" method="post">
        <p><label for="pseudo">Nickname : <input type="text" name="pseudo"></label></p>
        <p><label for="message">Message : <input type="text" name="message"></label></p>

        <input type="submit" value="Go!" />
    </form>
</body>

</html>

<?php


try {
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) /* error handling */ {
    die('Erreur');
}

$response = $db->query('SELECT * FROM minichat');
while ($data = $response->fetch()) {
    echo '<p>' . $data['pseudo'] . ' : ' . $data['message'] . '</p>';
}

?>