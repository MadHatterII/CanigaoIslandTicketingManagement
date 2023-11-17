<?php
// Replace with your database connection details
include("connection.php");

// SQL query to retrieve data from your database table
$sql = "SELECT id, group_name, cottage_type, stayType, status FROM bookings";

$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Close the database connection
$conn->close();

// Return the data as a JSON response
echo json_encode($data);
?>
