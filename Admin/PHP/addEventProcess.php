<?php
include '../../config/db.php';

if (isset($_POST['add_event'])) {
    $title = $_POST['title'];
    $date = $_POST['date'];
    $price = $_POST['price'];
    $image = $_POST['image']; // Taking image as String Link
    $desc = $_POST['description'];

    $sql = "INSERT INTO events (title, description, date, price, image) VALUES ('$title', '$desc', '$date', '$price', '$image')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../HTML/dashboard.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>