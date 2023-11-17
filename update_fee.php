<?php
// Include the database connection file
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $feeID = $_POST['fee_id'];
    $newAmount = $_POST['amount'];

    // Check if the provided data is valid, you may want to perform additional validation here

    // Perform the database update
    $sql = "UPDATE fee SET amount = $newAmount WHERE id = $feeID";
    $result = $conn->query($sql);

    if ($result) {
        // Redirect back to the original page or display a success message
        echo "<script>alert('Updated successfully!');</script>";
        header("Location: prices.php");

        
        
        exit();
    } else {
        echo "Error updating fee data: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
