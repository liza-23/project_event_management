<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - EventSys</title>
    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="stylesheet" href="../../Shared/CSS/navbar.css">
</head>
<body>
      
    <?php include '../../Shared/HTML/navbar.php'; ?>
    
    <div class="login-wrapper">
        <div class="login-box">
            <div class="login-header">
                <h2>Welcome Back</h2>
                <p>Please login to continue</p>
            </div>

            <form action="../PHP/loginProcess.php" method="POST">
                
                <div class="input-group">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password" required>
                </div>
                
                <div class="options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember"> 
                        <span>Remember Me</span>
                    </label>
                    </div>
                
                <button type="submit" name="login" class="btn-login">LOGIN</button>

                <div class="register-link">
                    <p>Don't have an account? <a href="register.php">Register Here</a></p>
                </div>
            </form>
        </div>
    </div>

</body>
</html>