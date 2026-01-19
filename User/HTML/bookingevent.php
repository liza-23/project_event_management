<?php
session_start();
include '../../config/db.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login to book an event!'); window.location.href='../../Auth/HTML/login.php';</script>";
    exit();
}

if (isset($_GET['id'])) {
    $event_id = $_GET['id'];
    $sql = "SELECT * FROM events WHERE id = $event_id";
    $result = $conn->query($sql);
    $event = $result->fetch_assoc();
} else {
    header("Location: events.php"); 
}

if (isset($_POST['confirm_booking'])) {
    $user_id = $_SESSION['user_id'];
    $phone = $_POST['phone'];
    $tickets = $_POST['tickets'];

    $insertSql = "INSERT INTO bookings (user_id, event_id, phone_number, total_tickets) VALUES ('$user_id', '$event_id', '$phone', '$tickets')";

    if ($conn->query($insertSql) === TRUE) {
        echo "<script>
                alert('Booking Confirmed Successfully!');
                window.location.href='events.php';
              </script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $event['title']; ?> - Booking</title>
    <link rel="stylesheet" href="../../Shared/CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/bookinEvent.css">

    
</head>
<body>

    <?php include '../../Shared/HTML/navbar.php'; ?>

    <div class="booking-container">
        
        <div class="event-details">
            <div class="event-image">
                <img src="<?php echo htmlspecialchars($event['image']); ?>" alt="Event Banner">
            </div>
            
            <h1 class="event-title"><?php echo htmlspecialchars($event['title']); ?></h1>
            
            <div class="meta-info">
                <div class="badge">📅 <?php echo date('d M, Y', strtotime($event['date'])); ?></div>
                <div class="badge price">Tk. <?php echo $event['price']; ?> / ticket</div>
            </div>

            <div class="event-description">
                <h3>About This Event</h3>
                <p><?php echo nl2br(htmlspecialchars($event['description'])); ?></p>
            </div>
        </div>

        <div class="booking-form-card">
            <h3>Book Your Seat</h3>
            
            <form action="" method="POST">
                
                <div class="input-group">
                    <label>Your Name</label>
                    <input type="text" value="<?php echo $_SESSION['name']; ?>" readonly style="background:#eee;">
                </div>

                <div class="input-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone" placeholder="017xxxxxxxx" required>
                </div>

                <div class="input-group">
                    <label>Number of Tickets</label>
                    <input type="number" name="tickets" id="tickets" min="1" max="10" value="1" required oninput="calculateTotal()">
                </div>

                <div class="total-cost">
                    Total: <span id="totalCost">Tk. <?php echo $event['price']; ?></span>
                </div>

                <button type="submit" name="confirm_booking" class="btn-confirm">Confirm Booking</button>
            </form>
        </div>

    </div>

    <script>
        function calculateTotal() {
            var pricePerTicket = <?php echo $event['price']; ?>;
            var tickets = document.getElementById('tickets').value;
            
            if(tickets < 1) tickets = 1; 
            
            var total = pricePerTicket * tickets;
            document.getElementById('totalCost').innerText = "Tk. " + total;
        }
    </script>

</body>
</html>