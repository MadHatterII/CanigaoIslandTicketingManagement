<?php
include_once('../controller/insert.php'); // Assuming this file contains the getConnection function

$conn = getConnection(); // This function should establish a database connection

if (isset($_GET['groupName'])) {
    $groupName = $_GET['groupName']; // Get the groupName from the URL parameter

    if (isset($_GET['action']) && $_GET['action'] === 'members') {
        // Action to fetch members
        $stmt = $conn->prepare("SELECT id, name FROM members WHERE groupName = ?");
        $stmt->bind_param("s", $groupName);
    } else {
        // Action to fetch booking data
        $stmt = $conn->prepare("SELECT ticket_type, contact_number, address, cottage_type, stayType, time_schedule FROM bookings WHERE group_name = ?");
        $stmt->bind_param("s", $groupName);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Output the data in a table
        echo "<table class='styled-table'>"; // Start the table

        if (isset($_GET['action']) && $_GET['action'] === 'members') {
            echo "<tr><th>ID</th><th>Name</th></tr>"; // Table headers for members
        } else {
            echo "<tr><th>Ticket Type</th><th>Contact Number</th><th>Address</th><th>Cottage Type</th><th>Stay Type</th><th>Boat Schedule</th></tr>"; // Table headers for bookings
        }

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>";
        }

        echo "</table>"; // End the table
    } else {
        echo "No information found for group: " . htmlspecialchars($groupName);
    }

    $stmt->close(); // Close statement
    $conn->close(); // Close connection
}
?>
