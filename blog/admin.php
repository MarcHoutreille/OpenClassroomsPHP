<?php
include("template.php");
try {
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'YbZbgfEnjB*aMK4Q', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) /* error handling */ {
    die('Erreur');
}

echo "<div style='padding-top:17%' class='text-center chattext'><form method='post' action='admin.php'>";
// BIG SAFETIES\
if (isset($_COOKIE['nickname']) && ($_COOKIE['nickname'] == "admin") && ($_COOKIE['password'] == "88qhYmCQgmK7g")) {

    echo '<p>' . $_COOKIE['password'] . '</p>';
    //                 CHAT PURGE 
    echo "<input type='submit' class='orange bg-dark chattext' name='purgechat' value='//purge chat' /></br>";
    
    if (isset($_POST['purgechat']) | (isset($_POST['confirmpurge']))) {
        echo "Are you sure ?</br>";
        echo "<form method='post' action='admin.php'> <input type='submit' style='color:red' class='bg-dark chattext' name='confirmpurge' value='//confirm purge' /> </br>";
        if (isset($_POST['confirmpurge'])) {

            $sql = "TRUNCATE TABLE `minichat`";

            //Prepare the SQL query.
            $statement = $db->prepare($sql);

            //Execute the statement.
            $statement->execute();
            echo "Chat purged.";
        }
    }
    //                 NEWS PURGE 
    echo "<input type='submit' class='orange bg-dark chattext' name='purgenews' value='//purge news' /></br>";
    
    if (isset($_POST['purgenews']) | (isset($_POST['confirmpurgenews']))) {
        echo "Are you sure ?</br>";
        echo "<form method='post' action='admin.php'> <input type='submit' style='color:red' class='bg-dark chattext' name='confirmpurgenews' value='//confirm news purge' /></br>";
        if (isset($_POST['confirmpurgenews'])) {

            $sql = "TRUNCATE TABLE `articles`";

            //Prepare the SQL query.
            $statement = $db->prepare($sql);

            //Execute the statement.
            $statement->execute();
            echo "Articles purged.";
            echo "</form>";
        }
    }
} else {

    header("Location:memberschat.php");
}

echo "</div>";
