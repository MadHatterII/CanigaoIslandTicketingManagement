
<?php
// Start or resume the session
session_start();

// Check if the user is not authenticated, redirect to the login page
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php"); // Replace "login.php" with the actual login page URL
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wander Lust - Island Ticketing</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="agentnav/agent.css">
  <style>
      .custom-b {
    color: rgb(60,179,113) !important; /* Use !important to ensure the style is applied */
}
  </style>
</head>
<style>
 
</style>
<body>
  <!-- Header -->
  <header>
    <?php include('agentnav/header.html'); ?> <!-- Include the navigation bar here -->
  </header>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <?php include('agentnav/nav.html'); ?> <!-- Include the navigation bar here -->
  </nav>

  <!-- Main Content -->
  <main style="background-color: #f0f8ff;">
    <div class="container">
      <h4>Boat Types</h4>
  
      <div class="row">
        <div class="col-md-4">
          <div class="card ">
            <div class="card-body">
              <h5 class="card-title">Duran Duran</h5>
              <button class="btn btn-primary" data-toggle="modal" data-target="#DuranduranModal">View Details</button>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Lorwinds</h5>
              <button class="btn btn-primary" data-toggle="modal" data-target="#LorwindsModal">View Details</button>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Island Rose</h5>
              <button class="btn btn-primary" data-toggle="modal" data-target="#IslandroseModal">View Details</button>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Franklyn</h5>
              <button class="btn btn-primary" data-toggle="modal" data-target="#franklynModal">View Details</button>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">San Pedro de Nonok</h5>
              <button class="btn btn-primary" data-toggle="modal" data-target="#SanpedrodenonokModal">View Details</button>
            </div>
          </div>
        </div>


        <!-- Duranduran Modal -->
        <div class="modal fade" id="DuranduranModal" tabindex="-1" role="dialog" aria-labelledby="DuranduranModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="DuranduranModalLabel">Duran Duran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php
                // Include your database connection code here
                include 'connection.php';

                // Perform a SELECT query to retrieve data for 'Duran Duran'
                $sql = "SELECT group_name FROM bookings WHERE boat = 'Duran Duran'";
                $result = mysqli_query($conn, $sql);

                // Check if the query was successful
                if (!$result) {
                  die("Error: " . mysqli_error($conn));
                }

                // Start a Bootstrap table
                echo '<table class="table table-striped">';
                echo '<thead><tr><th>Group Name</th></tr></thead>';
                echo '<tbody>';

                // Fetch and display Sailboat details in the table
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<tr><td>' . $row['group_name'] . '</td></tr>';
                }

                echo '</tbody>';
                echo '</table>';

                // Close the database connection
                mysqli_close($conn);
                ?>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>


        <!-- Lorwinds Modal -->
        <div class="modal fade" id="LorwindsModal" tabindex="-1" role="dialog" aria-labelledby="LorwindsModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="sapeedboatModalLabel">Lorwinds</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php
                // Include your database connection code here
                include 'connection.php';

                // Perform a SELECT query to retrieve data for 'Lorwinds'
                $sql = "SELECT group_name FROM bookings WHERE boat = 'Lorwinds'";
                $result = mysqli_query($conn, $sql);

                // Check if the query was successful
                if (!$result) {
                  die("Error: " . mysqli_error($conn));
                }

                // Start a Bootstrap table
                echo '<table class="table table-striped">';
                echo '<thead><tr><th>Group Name</th></tr></thead>';
                echo '<tbody>';

                // Fetch and display Sailboat details in the table
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<tr><td>' . $row['group_name'] . '</td></tr>';
                }

                echo '</tbody>';
                echo '</table>';

                // Close the database connection
                mysqli_close($conn);
                ?>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
          <!-- Lorwinds modal content here -->
        </div>

        <!-- Islandrose Modal -->
        <div class="modal fade" id="IslandroseModal" tabindex="-1" role="dialog" aria-labelledby="IslandroseModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="IslandroseModalLabel">Island Rose</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php
                // Include your database connection code here
                include 'connection.php';

                // Perform a SELECT query to retrieve data for 'Island Rose'
                $sql = "SELECT group_name FROM bookings WHERE boat = 'Island Rose'";
                $result = mysqli_query($conn, $sql);

                // Check if the query was successful
                if (!$result) {
                  die("Error: " . mysqli_error($conn));
                }

                // Start a Bootstrap table
                echo '<table class="table table-striped">';
                echo '<thead><tr><th>Group Name</th></tr></thead>';
                echo '<tbody>';

                // Fetch and display Sailboat details in the table
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<tr><td>' . $row['group_name'] . '</td></tr>';
                }

                echo '</tbody>';
                echo '</table>';

                // Close the database connection
                mysqli_close($conn);
                ?>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
          <!-- Islandrose modal content here -->
        </div>

        <!-- Franklyn Modal -->
        <div class="modal fade" id="franklynModal" tabindex="-1" role="dialog" aria-labelledby="franklynModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="franklynModalLabel">Franklyn </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php
                // Include your database connection code here
                include 'connection.php';

                // Perform a SELECT query to retrieve data for 'Franklyn'
                $sql = "SELECT group_name FROM bookings WHERE boat = 'Franklyn'";
                $result = mysqli_query($conn, $sql);

                // Check if the query was successful
                if (!$result) {
                  die("Error: " . mysqli_error($conn));
                }

                // Start a Bootstrap table
                echo '<table class="table table-striped">';
                echo '<thead><tr><th>Group Name</th></tr></thead>';
                echo '<tbody>';

                // Fetch and display Sailboat details in the table
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<tr><td>' . $row['group_name'] . '</td></tr>';
                }

                echo '</tbody>';
                echo '</table>';

                // Close the database connection
                mysqli_close($conn);
                ?>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
    <!-- Sanpedrodenonok Modal -->
    <div class="modal fade" id="SanpedrodenonokModal" tabindex="-1" role="dialog" aria-labelledby="SanpedrodenonokModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="SanpedrodenonokModalLabel">San Pedro de Nonok</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php
            // Include your database connection code here
            include 'connection.php';

            // Perform a SELECT query to retrieve data for 'San Pedro de Nonok'
            $sql = "SELECT group_name FROM bookings WHERE boat = 'San Pedro de Nonok'";
            $result = mysqli_query($conn, $sql);

            // Check if the query was successful
            if (!$result) {
              die("Error: " . mysqli_error($conn));
            }

            // Start a Bootstrap table
            echo '<table class="table table-striped">';
            echo '<thead><tr><th>Group Name</th></tr></thead>';
            echo '<tbody>';

            // Fetch and display Sailboat details in the table
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<tr><td>' . $row['group_name'] . '</td></tr>';
            }

            echo '</tbody>';
            echo '</table>';

            // Close the database connection
            mysqli_close($conn);
            ?>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
      <!-- Canoe modal content here -->
    </div>

    </div>
    </div>
  </main>
  <!-- Footer -->
  <footer>
    <p>&copy; 2023 Wander Lust Ticketing System</p>
  </footer>

  <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

  <!-- Your Custom JavaScript -->
  <script src="agentjs/script.js"></script>
</body>

</html>