<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      integrity="sha384-r3cP4S7gCBd6EhMf8q4SII2wV1FgMqVxPLt6G5uMPKioUDqFqb9Lm9Hw09bMGyT8d"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="admin.css" />
    <title>Admin Dashboard</title>
    <style type="text/css">
     #carnigao {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
  }

  #carnigao img {
    max-width: 100%; /* Max width to fit the card */
    max-height: 100%; /* Max height to fit the card */
    object-fit: contain; /* Maintain aspect ratio while fitting */
  }

   hr {
    height: 2px; /* Adjust the pixel value for the desired thickness */
    background-color: white; /* Optional, change the color */
    border: none; /* Remove the default border */
  }
   footer {
            background-color: #d6d8d9;
            color: #ffffff;
            text-align: center;
            padding: 10px;
        }
    </style>
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

      <main style="background-color: #f3faff";>
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
// Perform a SELECT query to retrieve data from your table
$sql = "SELECT * FROM Useraccounts"; 

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
            
             <div class="charts__left">
  <div class="charts__left__title">
    <div>
      <h1>Canigao Island Paradise</h1>
      <p>Matalom, Leyte, Philippines</p>
    </div>
    
  </div>
  <div class="card1" id="carnigao">
    <img src="img/canigao4.jpg" alt="Income Image">
  </div>
</div>
            <div class="charts__right">
              <div class="charts__right__title">
                <div>
                  <h1>Stats Reports</h1>
                  <p>Canigao Island Paradise</p>
                </div>
             
              </div>

              <div class="charts__right__cards">
                <div class="card1">
                  <h1>ISLAND</h1>
                  <p>Active</p>
                </div>

                <div class="card2">
                  <h1>BOAT</h1>
                  <p>15</p>
                </div>

                <div class="card3">
                  <h1>Agents</h1>
                  <p>5</p>
                </div>

                <div class="card4">
                  <h1>Cottage</h1>
                  <p>20</p>
                </div>
              </div>
            </div>
          </div>
          <!-- CHARTS ENDS HERE -->

        </div>
      </main>

      <div id="sidebar">
        <div class="sidebar__title">
          <div class="sidebar__img">
            <img src="img/slsuto.png" alt="logo" />
            <h1>WanderLust</h1>
            <img src="img/canigs.png" alt="logo" /> 
          </div>
          <i
            onclick="closeSidebar()"
            class="fa fa-times"
            id="sidebarIcon"
            aria-hidden="true"
          ></i>
        </div>
        <br><br>

        <div class="sidebar__menu ">
          <div class="sidebar__link active_menu_link ">
            <i class="fa fa-home "></i>
            <a href="adminindex.php">Dashboard</a>
          </div>
          <h2>MANAGEMENT</h2>
          
         
          <div class="sidebar__link ">
            <i class="fa fa-building-o "></i>
            <a href="ausermanagement.php">Ticketing Agent Account</a>
          </div>
          
          <div class="sidebar__link ">
            <i class="fa fa-money "></i>
             <a href="prices.php">Prices</a>
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
            <a href="#">Log out</a>
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
     <!-- Footer -->
    <footer>
        <p>&copy; 2023 Wander Lust Ticketing System</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="admin.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-S3TC8vdbhqdbv1f8l8cB6kU4fSEg7JiKHJF2PKqTf5fR2Xc4RuXfGmOzDE1EBw4vM" crossorigin="anonymous"></script>
  </body>
</html>
