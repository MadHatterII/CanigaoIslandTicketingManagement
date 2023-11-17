<?php
session_start();
function getConnection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wanderlustdb";
    
    // Create a connection to the database
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        return $conn;
    }
    }


    function insertInfoTicket() {
        $conn = getConnection(); // Ensure this function is defined and returns a valid database connection
    
        // Check if the form's submit button was clicked
        if (isset($_POST['submit'])) {
            // Retrieve the form data using the POST array
            $ticketType = $_POST['ticketType'];
            $groupName = $_POST['groupName'];
            $cottageType = $_POST['cottageType'];
            $timeSchedule = $_POST['timeSchedule'];
            $contactNumber = $_POST['contactNumber'];
            $stayType = $_POST['stayType']; // Added this to capture the 'stayType' value
            $address = $_POST['address'];
    
            // Check if the group name already exists in the database
            $checkGroupNameSql = "SELECT COUNT(*) FROM bookings WHERE group_name = '$groupName'";
            $checkGroupNameResult = $conn->query($checkGroupNameSql);
    
            // If the group name already exists, display an error message and stay on the same page
            if ($checkGroupNameResult->fetch_row()[0] > 0) {
                echo "<script>
                        alert('Group name already exists!');
                        window.location.href = 'ticketingagent.php'; 
                      </script>";
                return;
            }
    
            // If the group name does not exist, insert the data into the database
            $sql = "INSERT INTO bookings (ticket_type, group_name, cottage_type, time_schedule, contact_number, address, stayType) 
                    VALUES ('$ticketType', '$groupName', '$cottageType', '$timeSchedule', '$contactNumber', '$address', '$stayType')";
    
            // Execute the query and store the result
            $result = $conn->query($sql);
    
            // Check if the insert was successful
            if ($result) {
                // If successful, display an alert and redirect
                $encodedGroupName = urlencode($groupName);
                echo "<script>
                        alert('Ticket submitted. Add members.');
                        window.location.href = 'addmember.php?groupName=$encodedGroupName'; 
                      </script>";
            } else {
                // If not successful, display an alert and stay on the same page
                echo "<script>
                        alert('Error creating a ticket!');
                        window.location.href = 'ticketingagent.php'; 
                      </script>";
            }
    
            // Close the database connection
            $conn->close();
        }
    }

function insertMembers(){
    // Check if the form is submitted
    if (isset($_POST['submitMembers'])) {
        $groupName = urldecode($_GET['groupName']);
        $memberCount = $_POST['memberCount'];
    
        $conn = getConnection();
        $conn->begin_transaction();

        try {
            // Loop through each member's name based on the member count
            for ($i = 0; $i < $memberCount; $i++) {
                // Check if member name is set in the POST array
                if (isset($_POST["memberName"][$i])) {
                    // Escape the member name to prevent SQL injection (not recommended for production, use prepared statements instead)
                    $memberName = $conn->real_escape_string($_POST["memberName"][$i]);
                    // Insert the member name into the database
                    $sql = "INSERT INTO members (name,groupName) VALUES ('$memberName','$groupName')";
                    // Execute the query
                    if (!$conn->query($sql)) {
                        // If there's an error, throw an exception
                        throw new Exception("Error inserting member $i: " . $conn->error);
                    }
                }
            }
            // If no exceptions were thrown, commit the transaction
            $conn->commit();
            echo "<script>
            alert('Ticket completed successfully!');
            window.location.href = 'addmember.php'; 
          </script>";
        } catch (Exception $e) {
            // If an exception was thrown, roll back the transaction
            $conn->rollback();
            echo "Transaction failed: " . $e->getMessage();
        }
        // Close the connection
        $conn->close();
    }
}


function fetchGroupNames($mysqli) {
    // Prepare the SQL statement to prevent SQL injection
    $stmt = $mysqli->prepare("SELECT group_name FROM bookings"); // Replace 'groups' with your actual table name
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the results
    $groups = [];
    while ($row = $result->fetch_assoc()) {
        $groups[] = $row['group_name'];
    }
    
    $stmt->close(); // Close the statement
    return $groups;
}
function dbMirroring(){


    
}

?>