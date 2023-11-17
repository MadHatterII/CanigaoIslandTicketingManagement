<?php
// Initialize a session
session_start();

// Check if the user is already logged in and redirect them if they are
if (isset($_SESSION["user_id"])) {
    header("Location: tickethome.php");
    exit;
































    
}

// Include the database connection
include "connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $password = $_POST["password"];
    $login_type = $_POST["login_type"];

    // Validate and sanitize inputs (you should use a more robust validation and sanitization method)
    $user = mysqli_real_escape_string($conn, $user);
    $password = mysqli_real_escape_string($conn, $password);

    // Set the ID column name based on login type
    if ($login_type == "admin") {
        $query = "SELECT * FROM admin WHERE username = '$user' AND password = '$password'";
        $id_column = "adminID"; // Use the correct column name for the ID in the admin table
    } elseif ($login_type == "ticketing_agent") {
        $query = "SELECT * FROM useraccounts WHERE username = '$user' AND password = '$password'";
        $id_column = "agentID"; // Use the correct column name for the ID in the useraccounts table
    } else {
        $login_error = "Invalid login type. Please try again.";
    }

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // User exists, log them in and redirect to a welcome page
        $row = mysqli_fetch_assoc($result); // Retrieve user data
        $_SESSION["user_id"] = $row[$id_column]; // Store user ID in the session
        $_SESSION["user_name"] = $row["FirstName"]; // Store user name in the session

        if ($login_type == "admin") {
            header("Location: Adminindex.php");
        } elseif ($login_type == "ticketing_agent") {
            header("Location: tickethome.php");
        }
        exit;
    } else {
        $login_error = "Invalid user or password. Please try again.";
    }
}
?>
