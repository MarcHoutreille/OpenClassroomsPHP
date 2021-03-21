<?php
include("template.php");;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>


<body>
    <div class="d-flex justify-content-center">


        <section class=" shadow chat rounded">
            <?php


            try {
                $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'YbZbgfEnjB*aMK4Q', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            } catch (Exception $e) /* error handling */ {
                die('Erreur');
            }

            if (isset($_COOKIE['nickname'])) {
                $response = $db->query('SELECT * FROM (SELECT * FROM minichat ORDER BY id DESC LIMIT 20) sub ORDER BY id ASC');
                while ($data = $response->fetch()) {
                    if ($data['pseudo'] == 'admin') {
                        echo "<div id='chattext'>";
                        echo '<span class="text-break">' . "<span style='font-size:8px' > (" . $data['date_msg'] . ")</span> "  . "<span style='color:red'>" . htmlspecialchars($data['pseudo']) . '</span>: ' . htmlspecialchars($data['message']) . '</br></span>';
                        echo "</div>";
                    } else {
                        echo "<div id='chattext'>";
                        echo '<span class="text-break">' . "<span style='font-size:8px' > (" . $data['date_msg'] . ")</span> "  . htmlspecialchars($data['pseudo']) . ': ' . htmlspecialchars($data['message']) . '</br></span>';
                        echo "</div>";
                    }
                }
            } else {
                header('Location: index.php');
            }



            ?>

        </section>

    </div>
    <div class="d-flex  justify-content-center">
        <div class="chatinput shadow  mx-3 d-flex-row">
            <form action="memberschat_post.php" tyle="width:40%;" id="chatsend" method="post">
                <label for="message"><input type="textarea" required autocomplete="off" name="message"></label>

                <input type="submit" value="&#10148;" />
            </form>
        </div>
    </div>
    <div class="footer">
        <p><small>&copy; 2021 </small></p>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>



</html>