<?php
session_start();
include '../../config/db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['role'] = $row['role'];

        // REMEMBER ME COOKIE (Stores email for 30 days)
        if ($remember) {
            setcookie('user_login', $email, time() + (86400 * 30), "/");
        }

        if ($row['role'] == 'admin') {
            header("Location: ../../Admin/HTML/dashboard.php");
        } else {
            header("Location: ../../User/HTML/home.php");
        }
    } else {
        echo "<script>alert('Invalid Email or Password'); window.location.href='../HTML/login.php';</script>";
    }
}
?>