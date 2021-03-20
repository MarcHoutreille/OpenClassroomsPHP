<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'YbZbgfEnjB*aMK4Q', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) /* error handling */ {
    die('Erreur');
}
if(!empty($_POST['password']) && (!empty($_POST['confirm'])) && ($_POST['password'] == $_POST['confirm'])) {
    $nickname = $_COOKIE['nickname'];
    $response = $db->query("SELECT email,nickname FROM membres WHERE nickname ='$nickname' ");
    while ($data = $response->fetch()) {
        $hashedPassword = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $req = $db->prepare("UPDATE `membres`  SET `pass`='$hashedPassword' WHERE`nickname`= '$nickname' ");
        $req->execute(array('pass' => $hashedPassword));
        echo "password changé";
    }
    
} else {
    echo "erreur";
}




?>