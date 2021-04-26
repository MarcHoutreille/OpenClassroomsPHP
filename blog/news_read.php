<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'YbZbgfEnjB*aMK4Q', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) /* error handling */ {
    die('Erreur');
}
include("template.php");
error_reporting(0);
$getArticleTitle = $_GET['article'];



$req = $db->query("SELECT * FROM articles WHERE title = '$getArticleTitle'  LIMIT 1 ");
while ($data = $req->fetch()) {
    if ($getArticleTitle == 0) {
        echo "<div class='d-flex justify-content-center'>";
        echo "<div id='articletext' class='chat rounded shadow' style='padding:5%'; width:800px'>";

        echo "<h3 class='text-center monotext-2 '>" . $data['title'] . "</h3>";
        echo "<p class='text-center chattext'> posted on : " . $data['date_post'] . "</p>";
        echo "<div class='text-break'>  " . nl2br($data['content']) . "</div>";
        if ($_COOKIE['nickname'] == 'admin') {

            // EDITION FORM
            echo "<button class='btn chattext orange' id='modify'> //edit </button>";
            echo '</div>';
            
            echo '<form method="post" action="news_edit.php" id="modifyarea" class="chat d-none" style="">';
            echo '<h3>'. $data['title'] .'</h3>';
            // echo '<input type="text" style="font-size:24px" name="title" value= ' . $data['title'] . '></input>';
            echo '<input type="hidden" name="id" value= ' . $data['id'] . '></input>';
            echo '<textarea autocorrect="off" rows="40" cols="90" class="chat " name="editedarticle">' .  $data['content'] . '</textarea>';
            echo '<input type="submit">';
            echo "</form>";

            // JAVASCRIPT
        echo ' <script>
        let modifyContent = document.getElementById("modify")
        let articleText = document.getElementById("articletext")
        let modifyBox = document.getElementById("modifyarea")
        modifyContent.addEventListener("click", function() {
            articleText.classList.add("d-none")
            modifyBox.classList.remove("d-none")
            modifyBox.classList.add("d-inline")
        })
            </script>';
    }
    }else {
        echo "erreur";
    }};