<?php
include("template.php");

try {
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'YbZbgfEnjB*aMK4Q', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) /* error handling */ {
    die('Erreur');
}


?>
<style>
form  { display: table;      }
p     { display: table-row;  }
label { display: table-cell; }
input { display: table-cell; }
</style>
<?php 

if(!empty($_POST['password']) && (!empty($_POST['confirm'])) && (($_POST['password'] === $_POST['confirm']))) {
    $nickname = $_COOKIE['nickname'];
    $response = $db->query("SELECT email,nickname FROM membres WHERE nickname ='$nickname' ");
    while ($data = $response->fetch()) {
        $hashedPassword = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $req = $db->prepare("UPDATE `membres`  SET `pass`='$hashedPassword' WHERE`nickname`= '$nickname' ");
        $req->execute(array('pass' => $hashedPassword));
        echo "<div class='text-center chattext'>successfully changed password</div>";
    }
    
} else {
    echo "<p class='text-center pt-5'></p>";
}

if (isset($_COOKIE['nickname'])) {
    /* store the username to use it in an SQL query */
    $nickname = $_COOKIE['nickname'];
    /* query the databse to get the user's email */
    $response = $db->query("SELECT email,nickname,is_admin FROM membres WHERE nickname ='$nickname' ");
    while ($data = $response->fetch()) {



        echo "<div style='padding-top:10%' class='justify-content-center  d-flex m-5'>";

        echo "<div class='mx-1 me-2  monotext-2 text-start'>username </br> email </br> password </br> confirm </br>color </br> role </br>  </div>";
        echo "<div class='text-center chattext'>" .  $data['nickname'] ;
        echo "<div class='text-center'>" .  "<span class='blurry-text'>" . $data['email'] . "</span>";
        

        echo "<div> <form method='POST' action='account.php'> <input style='height:17px;' type='password' name='password' />";
        
        echo "<div> <input style='height:17px;' type='password' name='confirm' />";
        echo "<div ><input style='height:12px' name='color' type='color'/>" ;
        if ($data['is_admin'] == 1) {
            echo "<div>" . "admin";
        } else {
            echo "<div>" . "user";
        }
        
        echo "<div> <input class='bg-dark chattext my-2 py-1' type='submit' value='//change password' />";
        
        
        /*
        echo "username : <input type='text' style='width:90px' name='username' value='" . $_COOKIE['nickname'] . "'</input></br>";

        echo "email :"  . $data['email']  . "</br>";
        echo "password : <input type='password' style='width:90px' name='password' value='" . "'</input></br>";
        echo "confirm  : <input type='password' style='width:90px' name='password' value='" . "'</input></br>"; 
        */
        echo "</form></div>";


    }
} else {
    /* big secure */
    header('Location: index.php');
}


?>
    <div class="footer">
        <span><small>&copy; 2021 </small></span>
    </div>

</body>