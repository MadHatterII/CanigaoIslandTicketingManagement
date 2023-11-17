<?php
// Start or resume the session


// Check if the user is authenticated
if (isset($_SESSION["user_id"])) {
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
