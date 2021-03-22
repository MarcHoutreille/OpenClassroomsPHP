<?php
include("template.php");
?>
<main>
<?php



try {
    // connexion à la bdd
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'YbZbgfEnjB*aMK4Q', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    if (((isset($_COOKIE['nickname'])) & (isset($_POST['password']))) | !empty($_POST['nickname']) & !empty($_POST['password'])) {
        //  Récupération de l'utilisateur et de son pass hashé

        $nickname = strtolower($_POST['nickname']);
        $password = $_POST['password'];
        $req = $db->prepare('SELECT id, pass FROM membres WHERE nickname = :nickname');
        $req->execute(array('nickname' => $nickname));
        $resultat = $req->fetch();
        // Comparaison du pass envoyé via le formulaire avec la base
        $isPasswordCorrect = password_verify($_POST['password'], $resultat['pass']);

        if (!$resultat) {
            echo "<div style='padding-top:17%' class='text-center'>";
            echo '<p> wrong username/password </p>';
            echo "<a href='index.php'>back to login </a>";
            echo "</div>";
        } else {

            if ($isPasswordCorrect) {
                session_start();
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['nickname'] = $nickname;
                /* creation des cookies */
                setcookie('nickname', $nickname, time() + 365 * 24 * 3600, null, null, false, true);
                setcookie('password', crypt($password,884984465), time() + 365 * 24 * 3600, null, null, false, true);



                if (isset($_SESSION['id']) and isset($_SESSION['nickname'])) {
                    echo "<div style='padding-top:17%' class='text-center'>";
                    echo '<h1> hello ' . $_SESSION['nickname'] . "</h1>";
                    echo 'sucessfully logged in </br>';
                    echo '<a href="memberschat.php"> to members chat </a>';
                    echo "<script>
                    setTimeout(function(){
                    window.location = 'memberschat.php';
                    }, 1200);
                    </script>";

                    echo "</div>";
                }
            } else {
                echo "<div style='padding-top:17%' class='text-center'>";
                echo '<p> wrong username/password </p>';
                echo "<a href='index.php'>back to login </a>";
                echo "</div>";
            }
        }
    } else {
        echo "<div style='padding-top:17%' class='text-center'>";
        echo '<p> wrong username/password </p>';
        echo "<a href='index.php'>back to login </a>";
        echo "</div>";
    }
} catch (Exception $e) /* error handling */ {
    echo "<div style='padding-top:17%' class='text-center'>";
    echo '<p> error </p>';
    echo "<a href='index.php'>back to login </a>";
    echo "</div>";
}
?>
</main>