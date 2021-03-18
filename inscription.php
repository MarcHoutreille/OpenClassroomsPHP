<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Login page</title>
</head>
<style>

</style>

<body style="background-color:lightgrey;">
    <header>
        <p>Hello !</p>
    </header>
    <div class="container">
        <div class="row">
            <!-- formulaire d'INSCRIPTION -->
            <div class="col-3 offset-3 p-5 ">
                <h2> Sign up </h2>
                <div class="formulaire bg-secondary p-2 rounded shadow-lg" style="width:100%">
                    <form action="inscription.php" method="post">
                        <p><label for="nickname" class="fw-bold">Nickname : <input type="text" name="nickname"></label></p>
                        <p><label for="email" class="fw-bold">E-mail : <input type="text" name="email"></label></p>
                        <p><label for="password" class="fw-bold">Password : <input type="password" name="password"></label></p>

                        <input type="submit" value="Sign up" />
                    </form>
                </div>
            </div>

            <!-- formulaire de LOG IN -->
            <div class="col-3 p-5 ">
                <h2> Log in </h2>
                <div class="formulaire bg-secondary p-2 rounded shadow-lg" style="width:100%">
                    <form action="members.php" method="post">

                        <p><label for="nickname" class="fw-bold">Nickname : <input type="text" name="nickname"></label></p>
                        <p><label for="password" class="fw-bold">Password : <input type="password" name="password"></label></p>

                        <input type="submit" value="Log in" />
                    </form>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-5 offset-3 p-5">
                <?php

                try {
                    $db = new PDO('mysql:host=localhost;dbname=test', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                } catch (Exception $e) /* error handling */ {
                    die('Erreur');
                }
                /* check si l'utilisateur a bien rentré ses infos */

                if (empty($_POST['nickname']) | empty($_POST['email']) | empty($_POST['password'])) {
                    echo "";
                } else {
                    $reqNickfromDB = $db->query('SELECT nickname FROM membres WHERE nickname ="' . $_POST['nickname'] . '"');
                    $nickData = $reqNickfromDB->fetch();

                    $reqEmailfromDB = $db->query('SELECT email FROM membres WHERE email ="' . $_POST['email'] . '"');
                    $emailData = $reqEmailfromDB->fetch();

                    if (strtolower($_POST['nickname']) == strtolower($nickData[0]) | strtolower($_POST['email']) == strtolower($emailData[0])) {
                        echo "Cet utilisateur existe déjà !";

                        /* does the email match a valid email pattern ?*/
                    } else if (!preg_match("#^([a-z0-9._-]){1,}@([a-z0-9._-]){2,}\.([a-z]){2,4}$#", $_POST['email'])) {
                        echo "<p> Format email incorrect </b>";
                        /* is the username only alphanumeric ? */
                    } else if (!preg_match("#^[a-zA-Z-' ]*$#", $_POST['nickname'])) {
                        echo "<p> Invalid Username </p>";
                    } else {
                        $username = htmlspecialchars($_POST['nickname']);
                        $usermail = htmlspecialchars($_POST['email']);
                        $userpassword = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_DEFAULT);
                        /* On assigne chacune des valeurs définies au dessus dans la base de donnée */
                        $req = $db->prepare('INSERT INTO membres(nickname, pass, email, date_inscription) VALUES(:nickname, :pass, :email, CURDATE())');
                        $req->execute(array(
                            'nickname' => $username,
                            'pass' => $userpassword,
                            'email' => $usermail

                        ));
                        echo "<p> Compte créé avec succès </p>";
                        echo "<p> Username : " . $username .  "</p>";
                        echo "<p> Email : " . $usermail .  "</p>";
                    }
                }
                ?>

            </div>
        </div>
    </div>
</body>

</html>