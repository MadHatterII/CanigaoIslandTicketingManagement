<?php
include("connection.php");

// Check if the 'agentid' parameter is present in the URL
if (isset($_GET['agentid'])) {
    $agentid = $_GET['agentid'];

    if (isset($_GET['confirm']) && $_GET['confirm'] === "true") {
        // User has confirmed the delete operation

        // First, delete associated records in the 'boat' table
        $sqlDeleteBoat = "DELETE FROM boat WHERE agentID = $agentid";

        if ($conn->query($sqlDeleteBoat) === TRUE) {
            // All associated 'boat' records deleted successfully

            // Now, delete the user record
            $sqlDeleteUser = "DELETE FROM useraccounts WHERE agentid = $agentid";

            if ($conn->query($sqlDeleteUser) === TRUE) {
                // User record deleted successfully, redirect to the 'ausermanagement.php' page
                header("Location: ausermanagement.php");
                exit; // Ensure that no more content is sent to the browser
            } else {
                echo "Error deleting user record: " . $conn->error;
            }
        } else {
            echo "Error deleting associated 'boat' records: " . $conn->error;
        }
    } else {
        // Ask the user for confirmation using JavaScript alert
        echo '<script>if (confirm("Are you sure you want to delete this user and associated records?")) {
                window.location.href = "deleteuser.php?agentid=' . $agentid . '&confirm=true";
            } else {
                window.location.href = "ausermanagement.php";
            }</script>';
    }
} else {
    echo "No 'agentid' parameter found in the URL.";
}
?>
