<?php
// Start or resume the session
session_start();

// Check if the user is not authenticated, redirect to the login page
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php"); // Replace "login.php" with the actual login page URL
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wander Lust - Island Ticketing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="agentnav/agent.css">
    <style>
        body {
        margin: 0;
        padding: 0;
    }
    .shadow-box {
        background-color: #DCDCDC;
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Original box shadow */
        padding: 20px;
    }
    .overview-box {
        text-align: center;
    }
    .overview-box i {
        font-size: 3rem;
    }
    .overview-box h3 {
        margin-top: 10px;
    }

    /* Update the box shadow color for .overview-box */
    .overview-box.shadow-box {
        box-shadow: 0px 4px 6px rgba(255, 0, 0, 0.1); /* Red box shadow, change color as needed */
    }
    .custom-white {
    color:rgb(60,179,113)!important; /* Use !important to ensure the style is applied */
}
    </style>
</head>

<body>
<?php

// Connect to the database 
include "connection.php";

// Query to count cottage types
$totalCottages = 20;

// Get booked cottages
$sql = "SELECT COUNT(*) AS booked FROM bookings WHERE cottage_type IS NOT NULL";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$bookedCottages = $row['booked'];

// Calculate available cottages
$availableCottages = $totalCottages - $bookedCottages;

// Count number for boats
$sql1 = "SELECT COUNT( boatName) AS boatCount FROM boat";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($result1);
$boatCount = $row1['boatCount'];

// Count tourists
$sql2 = "SELECT COUNT(name) AS nameCount FROM members";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$nameCount = $row2['nameCount'];
?>

<!-- Header -->
<header>
    <?php include('agentnav/header.html'); ?> <!-- Include the navigation bar here -->
</header>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <?php include('agentnav/nav.html'); ?> <!-- Include the navigation bar here -->
</nav>

<div>
    <!-- Main Content -->
    <main>
        <div class="container">
            <p>Welcome, <?php echo $_SESSION["user_name"]; ?>! This is your user dashboard.</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="overview-box shadow-box">
                        <i class="fas fa-user fa-3x"></i>
                        <h3>Tourists</h3>
                        <p id="touristCount"><?php echo $nameCount; ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="overview-box shadow-box">
                        <i class="fas fa-ship fa-3x"></i>
                        <h3>Boats</h3>
                        <p id="boatCount"><?php echo $boatCount; ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="overview-box shadow-box">
                        <i class="fas fa-home fa-3x"></i>
                        <h3>Cottages</h3>
                        <div id="cottageCount"><?php echo $availableCottages; ?></div>
                    </div>
                </div>
            </div>


            <hr>


            
            <div class="row">
                <div class="col-md-6">
                    <div class="overview-box shadow-box">
                        <h3>Island Image</h3>
                        <img src="img/canigao3.jpg" alt="Canigao Island" style="max-width: 100%; height: auto;">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="overview-box shadow-box">
                        <h3>Island Statistics</h3>
                        <canvas id="islandChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>


<!-- Footer -->
<footer class="foot">
    <p>&copy; 2023 Wander Lust Ticketing System</p>
</footer>

<script>
    // Get the canvas element
    var islandChartCanvas = document.getElementById("islandChart");

    // Create a chart
    var islandChart = new Chart(islandChartCanvas, {
        type: "bar", // You can choose other chart types (e.g., pie, line) as needed
        data: {
            labels: ["Cottages", "Tourists", "Boats"],
            datasets: [
                {
                    label: "Number",
                    data: [<?php echo $availableCottages; ?>, <?php echo $nameCount; ?>, <?php echo $boatCount; ?>],
                    backgroundColor: ["rgba(75, 192, 192, 0.2)", "rgba(255, 99, 132, 0.2)", "rgba(255, 206, 86, 0.2)"],
                    borderColor: ["rgba(75, 192, 192, 1)", "rgba(255, 99, 132, 1)", "rgba(255, 206, 86, 1)"],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
</script>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

<!-- Your Custom JavaScript -->
<script src="agentjs/script.js"></script>
</body>
</html>
