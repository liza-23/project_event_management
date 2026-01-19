<?php
session_start();
include '../../config/db.php';
$sql = "SELECT * FROM events ORDER BY date ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Browse Events - EventSys</title>
    <link rel="stylesheet" href="../../Shared/CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/events.css">
</head>
<body>

    <?php include '../../Shared/HTML/navbar.php'; ?>

    <div class="events-container">
        
        <div class="page-header">
            <h2>Upcoming Events</h2>
            <p>Explore and book the best events in the city.</p>
        </div>

        <div class="event-grid">
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    
                    <div class="event-card">
                        <div class="card-image">
                            <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Event Image">
                            <div class="date-badge">
                                <span><?php echo date('d', strtotime($row['date'])); ?></span>
                                <?php echo date('M', strtotime($row['date'])); ?>
                            </div>
                        </div>

                        <div class="card-content">
                            <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                            <span class="price">Tk. <?php echo $row['price']; ?> / ticket</span>
                            
                            <p class="description">
                                <?php 
                                    echo substr(htmlspecialchars($row['description']), 0, 90) . '...'; 
                                ?>
                            </p>
                            
                            <a href="bookinEvent.php?id=<?php echo $row['id']; ?>" class="btn-book">
                                View Details & Book
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p style="text-align:center; grid-column: 1/-1; color: #888;">No events available at the moment.</p>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>
