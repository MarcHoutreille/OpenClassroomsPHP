<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<style>
form {
    padding-top:25px;
}


body {
text-align: center; 
}
.chat {
    padding-top: 10px;
}

</style>
<body>
    <form action="minichat_post.php" method="post">
        <p><label for="pseudo">Nickname : <input type="text" name="pseudo"></label></p>
        <p><label for="message">Message : <input type="text" name="message"></label></p>

        <input type="submit" value="Go!" />
    </form>
<section class="chat bg-secondary rounded">
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
</section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</html>
