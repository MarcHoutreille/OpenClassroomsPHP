<?php
session_destroy();
/* redirect to index*/
header('Location: index.php');
/* delete cookies */
setcookie('nickname', '');
setcookie('password', '');
?>