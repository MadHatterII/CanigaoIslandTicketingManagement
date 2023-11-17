<?php
include('connection.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the boat details form
    $BoatName = $_POST['BoatName'];
    $BoatType = $_POST['BoatType'];
    $BoatCapacity = $_POST['BoatCapacity'];
    $BoatStatus = $_POST['BoatStatus'];
    $CaptainName = $_POST['CaptainName'];
    $agentID = $_POST['agentID'];

    // SQL query to insert boat details into the appropriate table (replace 'your_table_name' with the actual table name)
    $sql = "INSERT INTO boat (BoatName, BoatType, BoatCapacity, BoatStatus, CaptainName, agentID)
            VALUES ('$BoatName', '$BoatType', '$BoatCapacity', '$BoatStatus', '$CaptainName', '$agentID')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Boat Details Added Successfully.');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
