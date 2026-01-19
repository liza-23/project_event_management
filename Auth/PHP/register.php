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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - EventSys</title>
    <link rel="stylesheet" href="../../Shared/CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/register.css">
</head>
<body>
    <?php include '../../Shared/HTML/navbar.php'; ?>
    
    <div class="register-wrapper">
        <div class="register-box">
            <div class="register-header">
                <h2>Create Account</h2>
                <p>Join us to explore amazing events</p>
            </div>

            <form action="" method="POST">
                <div class="input-group">
                    <label>Full Name</label>
                    <input type="text" name="name" placeholder="Enter your full name" required>
                </div>
                <div class="input-group">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Create a password" required>
                </div>
                <button type="submit" name="register" class="btn-register">REGISTER</button>
                <div class="login-link">
                    <p>Already have an account? <a href="login.php">Login Here</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
