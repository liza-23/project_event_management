<?php
include '../../config/db.php';

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        echo "<script>alert('Email already registered! Please login.');</script>";
    } else {
        $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', 'user')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    alert('Registration Successful! Now Login.');
                    window.location.href='login.php';
                  </script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>
