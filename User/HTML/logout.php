<?php
session_start();
session_destroy();
if (isset($_COOKIE['user_login'])) {
    setcookie('user_login', '', time() - 3600, "/"); // Delete cookie
}
header("Location: home.php");
?>