<?php
include("connection.php");

// Fetch user logs from the database
// $sql = "SELECT ua.agentID,ul.user_id,activity_description,timestamp FROM user_logs as ul LEFT JOIN useraccounts as ua ON ua.agentID = ul.user_id";
$sql = "SELECT * FROM user_logs";
$result = $conn->query($sql);

// Display user logs in a table
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 

  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/{your-bootstrap-version}/css/bootstrap.min.css">
  <title>Admin Management</title>

  <style>
        table {
                width: 50%;
                border-collapse: collapse;
                margin-top: 20px;
                margin-left: auto;
                margin-right: auto;
         }

        th, td {
            
                 padding: 10px;
                 border: 1px solid #ddd;
                 text-align: left;
        }

        th {
            background-color: #007bff;
        }
        body {
            text-align: center;
        }

        h2{
            margin-right: 570px; 
        }
    </style>
</head>

<body>

<div class="container">
    <!-- Bootstrap Navbar -->
 
    <h2>User Logs</h2>
    <table>
        <tr>
        <th>LOG ID</th>
            <th>Agent ID</th>
           
            <th>Activity Description</th>
            <th>Timestamp</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                
                echo "<td>" . $row["log_id"] . "</td>";
                echo "<td>" . $row["user_id"] . "</td>";
                echo "<td>" . $row["activity_description"] . "</td>";
                echo "<td>" . $row["timestamp"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No logs found</td></tr>";
        }
        ?>
    </table>
    <div id="sidebar">
      <div class="sidebar__title">
        <div class="sidebar__img">
        <a href="Ausermanagement.php" class="button">
          <img src="img/slsuto.png" alt="logo" />
          </a>
          <h1>WanderLust</h1>
          
    <img src="img/canigs.png" alt="logo" />
 
        </div>
      
      </div>
      <br><br>

   

  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="admin.js"></script>

  <script src="modaladd.js"></script>
  <!-- Bootstrap JavaScript -->
  <!-- Include Bootstrap JavaScript at the end of the body -->
 <!-- Include Bootstrap JavaScript at the end of the body -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
