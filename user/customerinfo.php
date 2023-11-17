<?php

include_once('../controller/insert.php'); // File containing the fetchGroupNames function

include_once('../controller/fetch_booking_data.php');   
// Create database connection

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php"); // Replace "login.php" with the actual login page URL
    exit;
}

// Fetch group names from the database using the function from insert.php
$mysqli = getConnection();
$groupNames = fetchGroupNames($mysqli);

// Close database connection
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   
    <link rel="stylesheet" type="text/css" href="../style/customerinfo.css">
    <title>Group Overview</title>
    <link rel="stylesheet" href="../agentnav/agent.css">
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
    color:rgb(60,179,113) !important; /* Use !important to ensure the style is applied */
}

    </style>
</head>
<body>
<header>
<div class="d-flex justify-content-between align-items-center">
    <!-- First Logo (aligned to the left) -->
    <img src="../img/canigss.png" alt="Logo 1" width="100" height="100">
    
    <h1>Wander Lust - Island Ticketing</h1>
        
    <!-- Second Logo (aligned to the right) -->
    <img src="../img/slsuto.png" alt="Logo 2" width="100" height="100">
</div></header>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
<div class="container">
    <a class="navbar-brand" href="tickethome.php">Wander Lust</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
   
    <ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link " href="../tickethome.php">
    <i class="fas fa-home"></i> Home
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="../user/ticketingagent.php">
    <i class="fas fa-ticket-alt"></i> Ticketing
</a>
</li>
<li class="nav-item">
    <a class="nav-link custom-white" href="../user/customerinfo.php">
        <i class="fas fa-user"></i> Customer Info
    </a>
</li>
<li class="nav-item">
<a class="nav-link" href="../boat.php">
    <i class="fas fa-ship"></i> Boat
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="../cottage.php">
    <i class="fas fa-home"></i> Cottage
</a>
</li>
<li class="nav-item">
<a class="nav-link logout-btn" href="../logout.php" onclick="return confirm('Are you sure you want to log out?');">
<i class="fas fa-sign-out-alt"></i> Logout
</a>

</li>
</ul>
    
    </div>
</div></nav>
    <h2>Group Information</h2>
    <div class="overview-container">
        <?php foreach ($groupNames as $groupName): ?>
            <div class="overview-box">
                <div class="overview-box-content">
                    <h3><?php echo ($groupName); ?></h3>
                    <a href="javascript:void(0)" onclick="showModal('<?php echo $groupName; ?>')"><button class="btn btn-primary">View Ticket Details</button></a>
                    <button class="btn btn-secondary" onclick="viewMembers('<?php echo $groupName; ?>')">View Members</button>
                </div>
            </div>
        <?php endforeach; ?>
        <?php if (empty($groupNames)): ?>
            <p>No groups found.</p>
        <?php endif; ?>
    </div>
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="modal-heading"></h2>
            <p id="modal-data">Some text in the Modal..</p>
        </div>
    </div>
</body>
<footer>
    <p>all right reserves</p>
</footer>
</html>

<script>
var modal = document.getElementById('myModal');
var span = document.getElementsByClassName("close")[0];
var modalHeading = document.getElementById('modal-heading');

function showModal(groupName) {
    modalHeading.textContent = "Group: " + groupName; // Set the heading text
    document.getElementById('modal-data').innerHTML = "Loading...";
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        console.log(this.responseText);
        if (this.status == 200) {
            document.getElementById('modal-data').innerHTML = this.responseText;
        } else {
            document.getElementById('modal-data').innerHTML = "Failed to load data.";
        }
    };
    xhr.onerror = function() {
        document.getElementById('modal-data').innerHTML = "Request failed to execute.";
    };
    xhr.open("GET", "../controller/fetch_booking_data.php?groupName=" + encodeURIComponent(groupName), true);
    xhr.send();

    modal.style.display = "block";
}

function viewMembers(groupName) {
    modalHeading.textContent = "Group Members for: " + groupName; // Set the heading text
    document.getElementById('modal-data').innerHTML = "Loading...";
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        console.log(this.responseText);
        if (this.status == 200) {
            document.getElementById('modal-data').innerHTML = this.responseText;
        } else {
            document.getElementById('modal-data').innerHTML = "Failed to load data.";
        }
    };
    xhr.onerror = function() {
        document.getElementById('modal-data').innerHTML = "Request failed to execute.";
    };
    xhr.open("GET", "../controller/fetch_booking_data.php?action=members&groupName=" + encodeURIComponent(groupName), true);
    xhr.send();

    modal.style.display = "block";
}

function closeModal() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


