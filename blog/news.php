<?php
include("template.php");
if (!isset($_COOKIE['nickname'])){
    header('Location: index.php')  ;
}

try {
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'YbZbgfEnjB*aMK4Q', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) /* error handling */ {
    die('Erreur');
}


?>
<div class="container">
    <div class="row">
        <!-- admin column -->
        <div class="col">
            <?php
            if (isset($_COOKIE['nickname']) && ($_COOKIE['nickname'] == "admin") && ($_COOKIE['password']) == "88qhYmCQgmK7g") {
                echo "<div id='newarticle' style='cursor:pointer' class='bg-dark chattext'>  //new article </div>";
             
            
            echo '<div id="newarticlepanel" class="d-none">
                <form action="news_post.php" method="post">
                    <input type="text" name="articletitle" placeholder="title" style="width:58%" class="my-2"></input></br>
                    <textarea rows="8" cols="100" name="articlecontent" placeholder="whats on your mind ?" class="bg-dark orange" name="articlecontent"></textarea>
                    <!-- -->
                    <input type="submit" />
                </form>
            </div>';
        }
            ?>
        </div>

    </div>
    <div class="d-flex">

        <?php

        if (isset($_COOKIE['nickname'])) {
            $response = $db->query('SELECT * FROM articles ORDER BY id DESC LIMIT 6');
            while ($data = $response->fetch()) {
                echo '<div data-id=' . $data['id'] . ' class="card chat shadow" style="width: 18rem;">';
                // thumbnail will go here
                // echo '<img src="https://placeimg.com/300/200/tech" class="card-img-top" alt="...">';
                echo  '<div class="card-body">'
                ?> 

                <form method="get" action="news_read.php">
                
                <input type="submit" class="chattext bg-dark" value="<?php echo $data['title']?>" name ="article"> </input>
                </form>

                
                <?php 
                echo '<h5 class="card-title">' .  $data['title'] .'</h5></input>';
                echo  '<p class="card-text" style="width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">' . $data['content'] . "</p>";


                if (($_COOKIE['nickname'] == 'admin') && ($_COOKIE['password'] == "88qhYmCQgmK7g")) {

                    echo '<form action="news_delete.php" method="get">';
                    echo '<input type="submit" name="id" value=' . $data['id'] . '></form>';
                }
                echo '</div></div>';
            }

        }           

        ?>

<div class="footer">
        <p><small>&copy; 2021 </small></p>
    </div>
    </div>

    <script>
        let newArticleButton = document.getElementById("newarticle")
        let articlePanel = document.getElementById("newarticlepanel")
        newArticleButton.addEventListener("click", function() {
            if (articlePanel.classList.contains("d-none")) {
                articlePanel.classList.remove("d-none")
                articlePanel.classList.add("d-flex-column")
            } else {
                articlePanel.classList.remove("d-flex-column")
                articlePanel.classList.add("d-none")
            }

        })
    </script>