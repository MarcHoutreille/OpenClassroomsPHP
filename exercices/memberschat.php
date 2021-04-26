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
        margin: 10px;
        text-align: left;
    }


    body {
        color: white;
        background-color: #444;
    }

    .chat {
        text-align: left;
        margin: 10px;
        padding: 7px;
        background-color: #222;
        color: orange;
    }
</style>

<body>

    <section class="chat  rounded">
        <?php


        try {
            $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'YbZbgfEnjB*aMK4Q', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) /* error handling */ {
            die('Erreur');
        }

        if (isset($_COOKIE['nickname'])) {
            $response = $db->query('SELECT * FROM (SELECT * FROM minichat ORDER BY id DESC LIMIT 10) sub ORDER BY id ASC');
            while ($data = $response->fetch()) {
                echo '<p>' . "<span style='font-size:8px' > (" . $data['date_msg'] . " )</span> "  . htmlspecialchars($data['pseudo']) . ' : ' . htmlspecialchars($data['message']) . '</p>';
            }
        } else {
            echo "Erreur.";
        }


        ?>
    </section>

    <form action="memberschat_post.php" method="post">
        <p><label for="message">Message : <input type="text" name="message"></label></p>

        <input type="submit" value="Go!" />
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</html>