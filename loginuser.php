<?php
// Start the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include 'connection.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute a SQL query to check the user's credentials
    $stmt = $conn->prepare("SELECT username, password FROM useraccounts WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($db_username, $db_password);
    $stmt->fetch();

    // Verify the password
    if ($password === $db_password) {
        // Password is correct, user is authenticated

        // Store user information in the session
        $_SESSION['username'] = $username;

        // Redirect to the ticketingagent.php page
        header('Location: ticketingagent.php');
        exit(); // Make sure to exit after the redirection
    } else {
        // Password is incorrect
        echo "Login failed. Incorrect username or password.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
