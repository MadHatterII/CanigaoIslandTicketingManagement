<?php
include 'connection.php';

if (isset($_POST['updateUser'])) {
    $agentID = $_POST['agentID'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $boatID = $_POST['boatid'];
 
    $phoneNumber = $_POST['phonenumber'];

    // Add code to sanitize and validate user input if needed

    // Update the user's data in the database
    $updateSql = "UPDATE Useraccounts SET
        FirstName = '$firstName',
        LastName = '$lastName',
        Birthdate = '$birthdate',
        Email = '$email',
        Username = '$username',
        Password = '$password',
        BoatID = '$boatID',
       
        PhoneNumber = '$phoneNumber'
        WHERE agentID = $agentID";

    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        // User data has been updated successfully
        // You can display an alert and then redirect

        echo "<script>
            alert('User data updated successfully.');
            window.location.href = 'ausermanagement.php'; // Redirect to ausermanagement.php
        </script>";

    } else {
        die("Error: " . mysqli_error($conn));
    }
}

// Close the database connection
$conn->close();
