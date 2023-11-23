<?php
// Start or resume the session
include('connection.php');

// Check if the user is authenticated
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
    $user_description = "Logged Out";
    $timestamp = date("Y-m-d H:i:s");   

    // Insert the log into the user_logs table
    $sql = "INSERT INTO user_logs (user_id, activity_description, timestamp) VALUES ('$user_id', '$user_description', '$timestamp')";
     // Execute the query, replace $conn with your database connection variable
    mysqli_query($conn, $sql);
    // If the user is authenticated, destroy the session
    session_destroy();
    
    // Redirect the user to the login page or any other desired page
    header("Location: index.php"); // Replace "index.php" with the actual index page URL
    exit;
} else {
    // If the user is not authenticated, you can redirect them to the index page as well
    header("Location: index.php");
    exit;
}
?>
