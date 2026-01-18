<?php
session_start();
include '../../config/db.php';

if (isset($_POST['book'])) {
    $user_id = $_SESSION['user_id'];
    $event_id = $_POST['event_id'];
    $phone = $_POST['phone'];
    $tickets = $_POST['tickets'];

    $sql = "INSERT INTO bookings (user_id, event_id, phone_number, total_tickets) VALUES ('$user_id', '$event_id', '$phone', '$tickets')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Booking Confirmed! Pay Cash on Spot.');
                window.location.href='../HTML/home.php';
              </script>";
    } else {
        echo "Error.";
    }
}
?>