<?php
// Start or resume the session
session_start();

// Check if the user is not authenticated, redirect to the login page
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php"); // Replace "login.php" with the actual login page URL
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
    <link rel="stylesheet" type="text/css" href="agentnav/agent.css">
    <link rel="stylesheet" type="text/css" href="agentcss/cottage.css">

    <style>
        /* styles.css */
        .section-heading {
            font-size: 24px;
            text-align: center;
            margin: 20px 0;
        }

        .overview-container {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }

        .overview-box {
            text-align: center;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            padding: 20px;
        }

        .overview-box h3 {
            font-size: 18px;
        }

        .overview-box p {
            font-size: 16px;
            padding: 10px 0;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
            margin: 20px 0;
        }

        .custom-table th,
        .custom-table td {
            padding: 10px;
            text-align: center;
        }

        .custom-table thead {
            background-color: #007bff;
            color: #fff;
        }

        .custom-table tbody tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        .custom-table tbody tr:hover {
            background-color: #e0e0e0;
        }

        .custom-table th {
            font-weight: bold;
        }

        .custom-table td {
            font-size: 16px;
        }

        .status-cell {
            padding: 5px;
            text-align: center;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
            width: 60px;
            font-size: 14px;
        }

        .status-cell[data-status="IN"] {
            background-color: #4CAF50;
            color: #fff;
        }

        .status-cell[data-status="OUT"] {
            background-color: #D32F2F;
            color: #fff;
        }

        .footer-text {
            text-align: center;
            margin-top: 20px;
        }
        .custom-c {
    color: rgb(60,179,113) !important; /* Use !important to ensure the style is applied */
}
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <?php include('agentnav/header.html'); ?>
    </header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <?php include('agentnav/nav.html'); ?>
    </nav>

    <!-- Main Content -->
    <main style="background-color: #f0f8ff;">
        <div class="container" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); padding: 20px; border-radius: 10px; text-align: center;">
    
            <h2>Cottages</h2>
            <?php
            // PHP code
            include('connection.php');

            // Query the database to count cottages with both "IN" and "OUT" statuses
            $sql = "SELECT `cottage_type`, `status`, COUNT(*) as `count` FROM `bookings` GROUP BY `cottage_type`, `status`";
            $result = $conn->query($sql);

            // Initialize counts for each cottage type with 5 initially
            $counts = [
                "Two-Story w/ Attic" => 5,
                "Duplex Cottage(Right Side of the Island)" => 5,
                "Duplex Cottage(Left Side of the Island)" => 5,
                "Tourism Building Room" => 5
            ];

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $cottageType = $row["cottage_type"];
                    $status = $row["status"];
                    $count = $row["count"];

                    if ($status === "IN") {
                        $counts[$cottageType] -= $count;
                    } else {
                        $counts[$cottageType] += $count;
                    }

                    // Ensure that the count doesn't exceed 5
                    if ($counts[$cottageType] > 5) {
                        $counts[$cottageType] = 5;
                    }
                }
            }

            ?>

            <div class="row">
                <!-- Available Cottages -->
                <div class="col-md-3 text-center">
                    <div class="overview-box" data-status="IN">
                        <i class="fas fa-home fa-2x " style="color: blue;"></i>
                        <h3>Two-Story w/ Attic</h3>
                        <p id="availableCottages">0</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="overview-box" data-status="IN">
                        <i class="fas fa-home fa-2x" style="color: blue;"></i>
                        <h3>Duplex Cottage(Right Side of the Island)</h3>
                        <p id="availableCottages">0</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="overview-box" data-status="IN">
                        <i class="fas fa-home fa-2x" style="color: blue;"></i>
                        <h3>Duplex Cottage(Left Side of the Island)</h3>
                        <p id="availableCottages">0</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="overview-box" data-status="IN">
                        <i class="fas fa-home fa-2x" style="color: blue;"></i>
                        <h3>Tourism Building Room</h3>
                        <p id="availableCottages">0</p>
                    </div>
                </div>
            </div>

        </div>
        <hr>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>

                    <th style="background-color: #337ab7; color: #fff;">Group Name</th>
                    <th style="background-color: #337ab7; color: #fff;">Cottage Type</th>
                    <th style="background-color: #337ab7; color: #fff;">Stay Type</th>
                    <th style="background-color: #337ab7; color: #fff;">Status</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <!-- Data will be populated here . cottagetb.js og Cottage_tb.php -->

            </tbody>
        </table>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2023 Wander Lust Ticketing System</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cottageCounts = <?php echo json_encode($counts); ?>;

            const overviewBoxes = document.querySelectorAll('.overview-box');

            overviewBoxes.forEach(box => {
                const boxTitle = box.querySelector('h3').textContent;
                if (boxTitle in cottageCounts) {
                    const availableCottages = box.querySelector('p');
                    availableCottages.textContent = cottageCounts[boxTitle];

                    // Add click event listener to the overview box
                    box.addEventListener('click', function() {
                        const status = box.getAttribute('data-status') === 'IN' ? 'OUT' : 'IN';

                        // Send AJAX request to update status on the server
                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', 'updateStatus.php', true);
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                // Update the counts based on the server response
                                const response = JSON.parse(xhr.responseText);
                                cottageCounts[boxTitle] = response.updatedCount;
                                availableCottages.textContent = cottageCounts[boxTitle];
                            }
                        };
                        xhr.send('cottageType=' + encodeURIComponent(boxTitle) + '&status=' + encodeURIComponent(status));
                    });
                }
            });
        });
    </script>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <!-- Your Custom JavaScript -->
    <script src="agentjs/script.js"></script>
    <script src="agentjs/cottagetb.js"></script>
    <script src="cottagestatus/cottagestatus.js"></script>
</body>

</html>