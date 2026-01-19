<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - EventSys</title>
    <link rel="stylesheet" href="../CSS/contact.css">
    <link rel="stylesheet" href="../../Shared/CSS/navbar.css">
</head>
<body>

    <?php include '../../Shared/HTML/navbar.php'; ?>

    <div class="contact-wrapper">
        <div class="contact-card">
            <h2>Get in Touch</h2>
            <p>Have questions? Fill out the form below.</p>
            
            <form action="" method="POST">
                <div class="input-group">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Your Name" required>
                </div>

                <div class="input-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Your Email" required>
                </div>

                <div class="input-group">
                    <label>Message</label>
                    <textarea name="message" rows="5" placeholder="How can we help?" required></textarea>
                </div>

                <button type="submit" name="send_message" class="btn-submit">Send Message</button>
            </form>
        </div>
    </div>
