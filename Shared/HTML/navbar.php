<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$base = "http://localhost/EVENT"; 
?>

<nav class="navbar">
    <div class="logo">EventSys</div>
    <ul class="nav-links">
        
        <li><a href="../../User/HTML/home.php">Home</a></li>
        <li><a href="../../User/HTML/about.php">About Us</a></li>
        <li><a href="../../User/HTML/contact.php">Contact</a></li>

        <?php if (isset($_SESSION['user_id'])): ?>
            
            <?php if ($_SESSION['role'] == 'admin'): ?>
                <li><a href="../../Admin/HTML/dashboard.php">Dashboard</a></li>
                <li><a href="../../Admin/HTML/addEvent.php">Add Event</a></li>
            <?php endif; ?>

            <?php if ($_SESSION['role'] == 'user'): ?>
                <li><a href="../../User/HTML/events.php">Browse Events</a></li>
            <?php endif; ?>

            <li><a href="../../User/HTML/logout.php" class="btn-logout">Logout (<?php echo $_SESSION['name']; ?>)</a></li>

        <?php else: ?>
            <li><a href="../../Auth/HTML/login.php">Login</a></li>
            <li><a href="../../Auth/HTML/register.php">Register</a></li>
        <?php endif; ?>
    </ul>
</nav>