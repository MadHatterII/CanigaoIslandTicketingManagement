<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $id = $data['id']; // Get "id" from the request
    $newStatus = $data['newStatus'];

    $sql = "UPDATE bookings SET status = ? WHERE id = ?"; // Updated SQL query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $newStatus, $id); // Bind "id" instead of "groupName"

    if ($stmt->execute()) {
        echo json_encode(['message' => 'Status updated successfully']);
    } else {
        echo json_encode(['message' => 'Error updating status']);
    }
} else {
    echo json_encode(['message' => 'Invalid request']);
}

$conn->close();
?>
