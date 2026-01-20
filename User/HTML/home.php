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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - EventSys</title>
    <link rel="stylesheet" href="../CSS/home.css">
    <link rel="stylesheet" href="../../Shared/CSS/navbar.css">
</head>
<body>
       <?php include '../../Shared/HTML/navbar.php'; ?>

    <header class="hero-banner">
        <div class="hero-content">
            <h1>Discover Amazing Events</h1>
            <p>Book your tickets for the best concerts, workshops, and meetups in town.</p>
            <a href="#event-list" class="btn-cta">Explore Events</a>
        </div>
    </header>

    <section id="event-list" class="events-section">
        <h2 class="section-title">Upcoming Events</h2>
        
        <div class="event-grid">
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="event-card">
                        <div class="card-image">
                            <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Event Image">
                            <span class="price-tag">Tk. <?php echo $row['price']; ?></span>
                        </div>
                        
                        <div class="card-content">
                            <span class="date-badge"><?php echo date('M d, Y', strtotime($row['date'])); ?></span>
                            <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                            <p><?php echo substr(htmlspecialchars($row['description']), 0, 80) . '...'; ?></p>
                            
                            <a href="bookinEvent.php?id=<?php echo $row['id']; ?>" class="btn-book">View Details & Book</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="no-events">No upcoming events found at the moment.</p>
            <?php endif; ?>
        </div>
    </section>
</body>
</html>

