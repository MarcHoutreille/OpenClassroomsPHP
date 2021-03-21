

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members Area</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="width:100%">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><!-- branding here --></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link " aria-current="page" href="inscription.php">Home</a>
                    <a class="nav-link active " href="members.php">Chat</a>
                    <a class="nav-link disabled" href="#">Coming soon</a>
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Coming soon</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php

                try {
                    // connexion à la bdd
                    $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'YbZbgfEnjB*aMK4Q', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

                    if (((isset($_COOKIE['nickname'])) & (isset($_POST['password'])) ) | !empty($_POST['nickname']) & !empty($_POST['password']) )  {
                        //  Récupération de l'utilisateur et de son pass hashé

                        $nickname = $_POST['nickname'];
                        $password = $_POST['password'];
                        $req = $db->prepare('SELECT id, pass FROM membres WHERE nickname = :nickname');
                        $req->execute(array('nickname' => $nickname));
                        $resultat = $req->fetch();
                        // Comparaison du pass envoyé via le formulaire avec la base
                        $isPasswordCorrect = password_verify($_POST['password'], $resultat['pass']);

                        if (!$resultat) {
                            echo "login : " . $_POST['nickname'] . "<br>";
                            echo "pass :" . $_POST['password'] . "<br>";
                            echo $resultat;
                            echo '<p> Mauvais identifiants !</p>';
                        } else {
                            
                            if ($isPasswordCorrect) {
                                session_start();
                                $_SESSION['id'] = $resultat['id'];
                                $_SESSION['nickname'] = $nickname;
                                /* creation des cookies */
                                setcookie('nickname', $nickname, time() + 365*24*3600, null, null, false, true);
                                setcookie('password', password_hash($password, PASSWORD_DEFAULT), time() + 365*24*3600, null, null, false, true);



                                if (isset($_SESSION['id']) and isset($_SESSION['nickname'])) {
                                    
                                    echo '<h1> Bonjour ' . $_SESSION['nickname'] . "</h1>";
                                    echo 'Vous êtes connecté';
                                    include("memberschat.php");
                                }
                            } else {

                                echo '<p> Mauvais identifiants !</p>';
                            }
                        }
                    } else {
                        echo "Veuillez rentrer des infos !";
                    }
                } catch (Exception $e) /* error handling */ {
                    die('Erreur');
                }
                ?></div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</html>