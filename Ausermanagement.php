<?php
include 'connection.php';

// Fetch and display all registered accounts from the database
$sql = "SELECT FirstName, LastName, Email, Username, agentID, Password, BoatID, Role, PhoneNumber FROM Useraccounts";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
  die("Error: " . mysqli_error($conn));
}

// Count the active Ticketing Agents
$activeTicketingAgentsCount = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="auseranangement.css">

  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/{your-bootstrap-version}/css/bootstrap.min.css">
  <title>Admin Management</title>

  <style>
    
  </style>
<script>
  function openEditModal(firstName, lastName, email, username, password, boatID, role, phoneNumber) {
    // Set values in the edit modal form fields
    
    document.getElementById('editFirstName').value = firstName;
    document.getElementById('editLastName').value = lastName;
    document.getElementById('editEmail').value = email;
    document.getElementById('editUsername').value = username;
    document.getElementById('editPassword').value = password;
    document.getElementById('editBoatID').value = boatID;
    document.getElementById('editRole').value = role;
    document.getElementById('editPhoneNumber').value = phoneNumber;

    // Display the edit modal
    document.getElementById('editMemberModal').style.display = 'flex';
  }

  var closeEditMemberModalBtn = document.getElementById('closeEditMemberModalBtn');
  var editMemberModal = document.getElementById('editMemberModal');

  closeEditMemberModalBtn.onclick = function() {
    editMemberModal.style.display = 'none';
  }
</script>



</head>

<body id="body">
  <div class="container">
    <!-- Bootstrap Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="nav_icon" onclick="toggleSidebar()">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </div>
      <div class="navbar__left">
        <a class="navbar-brand active_link" href="#">Admin</a>
      </div>
      <!-- navbar search -->
      <div class="navbar__right">

      </div>
    </nav>

    <main style="background-color: #f3faff" ;>
      <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->

        <div class="main__title">
          <img src="assets/hello.svg" alt="" />
          <div class="main__greeting">
            <h1>HELLO ADMIN</h1>
            <p>Welcome to admin dashboard</p>
          </div>
        </div>

        <!-- MAIN TITLE ENDS HERE -->

        <!-- MAIN CARDS STARTS HERE -->
        <div class="main__cards">
          <!-- Bootstrap Cards -->
          <div class="card bg-light">
            <i class="fa fa-user-o fa-2x text-lightblue" aria-hidden="true"></i>
            <div class="card_inner">
              <p class="text-primary-p">Tourist</p>
              <span class="font-bold text-title">578</span>
            </div>
          </div>

          <div class="card bg-light">
            <i class="fa fa-home fa-2x text-red" aria-hidden="true"></i>
            <div class="card_inner">
              <p class="text-primary-p">Available Cottages</p>
              <span class="font-bold text-title">9</span>
            </div>
          </div>

          <div class="card bg-light">
            <i class="fa fa-ship fa-2x text-yellow" aria-hidden="true"></i>
            <div class="card_inner">
              <p class="text-primary-p">Active Boat</p>
              <span class="font-bold text-title">12</span>
            </div>
          </div>
          <?php
          include 'connection.php';
          $sql = "SELECT FirstName, LastName, Email, Username FROM Useraccounts";
          $result = mysqli_query($conn, $sql);

          // Perform a SELECT query to retrieve data from your table
          $sql = "SELECT * FROM Useraccounts"; // Replace YourTableName with your actual table name

          // Execute the query and store the result in a variable
          $result = mysqli_query($conn, $sql);

          // Check if the query was successful
          if (!$result) {
            die("Error: " . mysqli_error($conn));
          }

          // Count the active Ticketing Agents
          $activeTicketingAgentsCount = mysqli_num_rows($result);
          ?>
          <div class="card bg-light">
            <i class="fa fa-user-secret fa-2x text-green" aria-hidden="true"></i>
            <div class="card_inner">
              <p class="text-primary-p">Active Ticketing Agent</p>
              <span class="font-bold text-title"><?php echo $activeTicketingAgentsCount; ?></span>
            </div>
          </div>

        </div>
        <!-- MAIN CARDS ENDS HERE -->

        <!-- CHARTS STARTS HERE -->
        <div class="charts">


          <!-- Table -->
          <table class="table table-striped table-bordered">
            <!-- Add this column header to your table -->
            <thead>
              <tr>
                <th>#</th> <!-- Row number column -->
                <th>Agent ID</th>
                <th>Full Name</th>
             
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
                
                <th>Role</th>
                <th>Phone Number</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $rowNumber = 1;

              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";

                echo "<td>" . $rowNumber . "</td>"; // Display the row number
                echo "<td>" . $row['agentID'] . "</td>";
                echo "<td>" . $row['FirstName'] . " " . $row['LastName'] . "</td>";
                
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['Username'] . "</td>";
                echo "<td>" . $row['Password'] . "</td>";
               
                echo "<td>" . $row['Role'] . "</td>";
                echo "<td>" . $row['PhoneNumber'] . "</td>";
                echo "<td class='action-buttons'>";
                echo "<button type='button' class='edit' id='" . $row['agentID'] . "' onclick='openEditModal(" .
    $row['agentID'] . ", \"" . $row['FirstName'] . "\", \"" . $row['LastName'] . "\", \"" .
    $row['Email'] . "\", \"" . $row['Username'] . "\", \"" . $row['Password'] . "\", \"" .
    $row['BoatID'] . "\", \"" . $row['Role'] . "\", \"" . $row['PhoneNumber'] . "\")'>Edit</button>";


                echo "<button class='delete' onclick='confirmDelete(" . $row['agentID'] . ")'>Delete</button>";
                echo "</td>";


                echo "</tr>";

                $rowNumber++; // Increment row number for the next row
              }
              ?>
            </tbody>
          </table>

          <!-- Button to Add Ticketing Agent Account -->
          <button id="openAddMemberModalBtn">Add Member</button>

        </div>

        <div id="addMemberModal" class="modal">
          <div class="modal-content">
            <span class="close" id="closeAddMemberModalBtn">&times;</span>
            <h2>Add Member</h2>
            <form id="addMemberForm" Action="useradd.php" method="POST">
              <label for="firstName">First Name:</label>
              <input type="text" id="firstName" name="Firstname" required>

              <label for="lastName">Last Name:</label>
              <input type="text" id="lastName" name="Lastname" required>

              <label for="email">Email:</label>
              <input type="email" id="email" name="Email" required>

              <label for="username">Username:</label>
              <input type="text" id="username" name="Username" required>

              <label for="password">Password:</label>
              <input type="password" id="password" name="Password" required>

              <label for="role">Role:</label>
              <select id="role" name="Role" required>
                <option value="Ticketing Agent">Ticketing Agent</option>
              </select>

              <label for="phoneNumber">Phone Number:</label>
              <input type="tel" id="phoneNumber" name="Phonenumber" required>

              <input type="submit" value="Add Member">
            </form>

          </div>
        </div>
      </div>

     <!-- Edit Member Modal -->

     

    

    </main>






    <div id="sidebar">
      <div class="sidebar__title">
        <div class="sidebar__img">
          <img src="img/slsuto.png" alt="logo" />
          <h1>WanderLust</h1>
          <img src="img/canigs.png" alt="logo" />
        </div>
        <i onclick="closeSidebar()" class="fa fa-times" id="sidebarIcon" aria-hidden="true"></i>
      </div>
      <br><br>

      <div class="sidebar__menu">
        <div class="sidebar__link  ">
          <i class="fa fa-home "></i>
          <a href="adminindex.php">Dashboard</a>
        </div>
        <h2>MANAGEMENT</h2>


        <div class="sidebar__link active_menu_link ">
          <i class="fa fa-building-o "></i>
          <a href="ausermanagement.php">Ticketing Agent Account</a>
        </div>

        <div class="sidebar__link">
          <i class="fa fa-money "></i>
          <a href="prices.php">Prices</a>
        </div>
        <div class="sidebar__link">
          <i class="fa fa-user "></i>
          <a href="Userlog.php">User Log</a>
        </div>

        <h2>MAINTENANCE MANAGEMENT</h2>
        <div class="sidebar__link">
          <i class="fa fa-ship "></i>
          <a href="#">Boat</a>
        </div>
        <div class="sidebar__link">
          <i class="fa fa-home"></i>
          <a href="#">Cottage</a>
        </div>


        <h2>Monthly Report</h2>

        <div class="sidebar__link">
          <i class="fa fa-line-chart fa-2x text-red"></i>
          <a href="#">Revenue</a>
        </div>
        <hr>
        <div class="sidebar__logout">
          <i class="fa fa-power-off fa-2x text-red"></i>
          <a href="logout.php">Log out</a>
        </div>
        <h2></h2>
        <div class="sidebar__link">

          <a href="#"></a>
        </div>
        <div class="sidebar__link">

          <a href="#"> </a>
        </div>

      </div>
    </div>
  </div>
  <div id="editMemberModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeEditMemberModalBtn">&times;</span>
        <h2>Edit Member</h2>
        <form id="editMemberForm" action="edituser.php" method="POST">
            <!-- Include agentID as a hidden input field -->
            <input type="hidden" id="agentID" name="agentID" value="123">

            <label for="editFirstName">First Name:</label>
            <input type="text" id="editFirstName" name="FirstName" required>

            <label for="editLastName">Last Name:</label>
            <input type="text" id="editLastName" name="LastName" required>

            <label for="editEmail">Email:</label>
            <input type="email" id="editEmail" name="Email" required>

            <label for="editUsername">Username:</label>
            <input type="text" id="editUsername" name="Username" required>

            <label for="editPassword">Password:</label>
            <input type="password" id="editPassword" name="Password" required>

            <label for="editPhoneNumber">Phone Number:</label>
            <input type="tel" id="editPhoneNumber" name="PhoneNumber" required>

            <input type="submit" value="Save Changes">
        </form>
    </div>
</div>


  <!-- Footer -->
  <footer>
    &copy; 2023 Wander Lust Ticketing System
  </footer>



  
<script>
  var openAddMemberModalBtn = document.getElementById('openAddMemberModalBtn');
  var closeAddMemberModalBtn = document.getElementById('closeAddMemberModalBtn');
  var addMemberModal = document.getElementById('addMemberModal');

  openAddMemberModalBtn.onclick = function() {
    addMemberModal.style.display = 'flex';
  }

  closeAddMemberModalBtn.onclick = function() {
    addMemberModal.style.display = 'none';
  }



  </script>



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