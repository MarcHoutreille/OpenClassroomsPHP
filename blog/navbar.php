   <?php if (isset($_COOKIE['nickname'])) { echo'
   <nav class="navbar navbar-expand-lg navbar-dark"  style="width:100%;font-size:20px">
       <div class="container-fluid chattext">
           <a class="navbar-brand" href="memberschat.php">
               <img src="android-chrome-512x512.png" style="height:50px"></img>
           </a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
               <div class="navbar-nav">

                   <a class="nav-link " href="memberschat.php">Chat</a>
                   <a class="nav-link " href="news.php">Articles</a>
                   <a class="nav-link" href="account.php" tabindex="-1" aria-disabled="true">My Account</a>
                   ';
                   if (($_COOKIE['nickname'] == "admin") && ($_COOKIE['password']) == "88qhYmCQgmK7g") {
                    echo '<a class="nav-link " href="admin.php">Admin</a>' ;    
                }
                echo '<a class="nav-link" aria-current="page" href="logout.php">Logout</a>';

                    
            }

                    ?>
                   
               </div>
           </div>
       </div>
   </nav>