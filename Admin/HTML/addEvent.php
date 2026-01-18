<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../CSS/add_Event.css">
    <link rel="stylesheet" href="../../Shared/CSS/navbar.css">
</head>
<body>
    <?php include '../../Shared/HTML/navbar.php'; ?>
    
    <div class="form-container">
        <h2>Post New Event</h2>
        <form action="../PHP/addEventProcess.php" method="POST">
            <input type="text" name="title" placeholder="Event Title" required>
            <input type="date" name="date" required>
            <input type="number" name="price" placeholder="Price (Tk)" required>
            <input type="text" name="image" placeholder="Image URL (String)" required>
            <textarea name="description" placeholder="Event Description" required></textarea>
            <button type="submit" name="add_event">Post Event</button>
        </form>
    </div>
</body>
</html>