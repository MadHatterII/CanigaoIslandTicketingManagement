<?php
include('connection.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $boatid = $_POST['boatid'];
    $role = $_POST['role'];
    $phonenumber = $_POST['phonenumber'];

    // SQL query to insert data into the Users table
    $sql = "INSERT INTO Useraccounts (FirstName, LastName, Birthdate, Email, Username, Password, BoatID, Role, PhoneNumber)
            VALUES ('$firstname', '$lastname', '$birthdate', '$email', '$username', '$password', '$boatid', '$role', '$phonenumber')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Added Successfully.');</script>";
        header('Location: ausermanagement.php'); // Redirect to ausermanagement.php
        exit; // Make sure to exit after the header() function to prevent further script execution
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
