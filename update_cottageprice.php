<?php
// Include the database connection file
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemID = $_POST['item_id'];
    $newPriceOvernight = $_POST['price_overnight'];
    $newPriceDayTour = $_POST['price_day_tour'];

    // Check if the provided data is valid, you may want to perform additional validation here

    // Perform the database update
    $sql = "UPDATE cottages SET price_overnight = $newPriceOvernight, price_day_tour = $newPriceDayTour WHERE id = $itemID";
    $result = $conn->query($sql);

    if ($result) {
        // Redirect back to the original page or display a success message
        header("Location: prices.php");
        exit();
    } else {
        echo "Error updating cottage data: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
