<?php
include('connection.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $firstname = $_POST['Firstname'];
    $lastname = $_POST['Lastname'];
    // $birthdate = $_POST['Birthdate'];
    $email = $_POST['Email'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $role = $_POST['Role'];
    $phonenumber = $_POST['Phonenumber'];

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO Useraccounts (FirstName, LastName, Birthdate, Email, Username, Password, Role, PhoneNumber)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters to the statement
        mysqli_stmt_bind_param($stmt, "ssssssss", $firstname, $lastname, $birthdate, $email, $username, $password, $role, $phonenumber);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Added Successfully.');</script>";
            header('Location: ausermanagement.php'); // Redirect to ausermanagement.php
            exit; // Make sure to exit after the header() function to prevent further script execution
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
