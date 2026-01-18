<!DOCTYPE html>
<html >
<head>
    
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../CSS/adminDashboard.css">
    <link rel="stylesheet" href="../../Shared/CSS/navbar.css">
    
    
</head>
<body>
    
    <?php include '../../Shared/HTML/navbar.php'; ?>

    <div class="dashboard-container">
        
        <div class="dashboard-head-card">
            <div class="title-section">
                <h2>Event Management</h2>
                <p>Manage your upcoming events effortlessly.</p>
            </div>
            <a href="addEvent.php" class="btn-add-new">
                <span>+</span> Post New Event
            </a>
        </div>
        
        <div class="table-card">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th width="40%">Event Details</th>
                        <th width="20%">Date</th>
                        <th width="15%">Price</th>
                        <th width="15%" style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td>
                                <div class="event-title"><?php echo htmlspecialchars($row['title']); ?></div>
                                <small style="color: #888;">ID: #<?php echo $row['id']; ?></small>
                            </td>
                            <td><?php echo date('M d, Y', strtotime($row['date'])); ?></td>
                            <td>
                                <span class="price-tag">Tk. <?php echo $row['price']; ?></span>
                            </td>
                            <td style="text-align: center;">
                                <a href="dashboard.php?delete_id=<?php echo $row['id']; ?>" 
                                   class="btn-trash" 
                                   onclick="return confirm('Are you sure you want to delete this event permanently?')">
                                   Delete
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="empty-state">No events found. Start by posting a new one!</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>