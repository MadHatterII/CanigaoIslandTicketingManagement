<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="auseranangement.css">
    <link rel="stylesheet" href="canigs.css">
    <title>Admin Management</title>
    
<style>
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
  }

  th {
    background-color: #007bff;
    color: #fff;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  tr:hover {
    background-color: #ccc;
  }

  /* Input and Button Styles */
 
/* CSS for modal container */
.modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 20% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 60%;
            max-width: 400px;
            text-align: center;
        }

        .close {
            color: #888;
            float: right;
            font-size: 24px;
            cursor: pointer;
        }

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

 

  .update-button {
    background-color: #4CAF50; /* Green background color */
    color: white; /* White text color */
    border: none; /* Remove the border */
    padding: 10px 20px; /* Add padding to the button */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px; /* Rounded corners */
  }
  
  /* Style for the cancel button */
  .cancel-button {
    background-color: #f44336; /* Red background color */
    color: white; /* White text color */
    border: none; /* Remove the border */
    padding: 10px 20px; /* Add padding to the button */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px; /* Rounded corners */
  }

  /* Form Styles */
  form {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  label, input, button {
    margin: 5px;
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

         

         

          <div class="charts">
            
    <!-- ... (existing content) ... -->

    <!-- Table -->
 <h2>Cottage Price</h2>
 <?php
// Include the database connection file
include 'connection.php';

// Retrieve data from the database
$sql = "SELECT id, price_overnight, price_day_tour, cottage_type FROM cottages";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
    <th>Cottage Type</th>
        <th>Price Overnight</th>
        <th>Price Day Tour</th>
       
        <th>Action</th>
    </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
           
            <td>{$row['cottage_type']}</td>
            <td>₱{$row['price_overnight']}</td>
            <td>₱{$row['price_day_tour']}</td>
            
            <td>
                <form method='post'>
                    <input type='hidden' name='item_id' value='{$row['id']}'>
                    <button class='update-button' type='button' onclick='openUpdateModal({$row['id']}, {$row['price_overnight']}, {$row['price_day_tour']})'>Update</button>
                </form>
            </td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "No items found in the database.";
}

// Close the database connection
$conn->close();
?>


 <h2>Fees</h2>
<?php
// Include the database connection file
include 'connection.php';

// Retrieve data from the database
$sql = "SELECT id, fee_type, amount FROM fee";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
        <th>Fee Type</th>
        <th>Amount</th>
        <th>Action</th>
    </tr>";

    while ($row = $result->fetch_assoc()) {
        $amount = $row['amount'] == 0 ? 'N/A' : '₱' . $row['amount'];

        echo "<tr>
            <td>{$row['fee_type']}</td>
            <td>{$amount}</td>
            <td>
                <form method='post'>
                    <input type='type' name='fee_id' value='{$row['id']}'>
                    <button class='update-button' type='button' onclick='openUpdateFeeModal({$row['id']}, {$row['amount']})'>Update</button>
                </form>
            </td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "No items found in the database.";
}

// Close the database connection
$conn->close();
?>



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

        <div class="sidebar__menu">
          <div class="sidebar__link  ">
            <i class="fa fa-home "></i>
            <a href="adminindex.php">Dashboard</a>
          </div>
          <h2>MANAGEMENT</h2>
          
        
          <div class="sidebar__link  ">
            <i class="fa fa-building-o "></i>
            <a href="ausermanagement.php">Ticketing Agent Account</a>
          </div>
          
          <div class="sidebar__link active_menu_link">
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


<!-- Modal for updating cottage prices -->
<div id="updateModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Update Cottage Data</h2>
            <form id="updateForm" method="post" action="update_cottageprice.php">
                <input type="hidden" id="updateId" name="item_id">
                <label for="updatePriceOvernight">Price Overnight:</label>
                <input type="text" id="updatePriceOvernight" name="price_overnight">
                <label for="updatePriceDayTour">Price Day Tour:</label>
                <input type="text" id="updatePriceDayTour" name="price_day_tour">
                <button type="submit">Update</button>
            </form>
        </div>
    </div>

    <!-- Modal for updating fee data -->
    <div id="updateFeeModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeFeeModal">&times;</span>
            <h2>Update Fee Data</h2>
            <form id="updateFeeForm" method="post" action="update_fee.php">
                <input type="hidden" id="updateFeeId" name="fee_id">
                <label for="updateFeeAmount">Amount:</label>
                <input type="text" id="updateFeeAmount" name="amount">
                <button type="submit">Update</button>
            </form>
        </div>
    </div>

    <script>
    // JavaScript for modal handling
    function openUpdateModal(id, priceOvernight, priceDayTour) {
        var modal = document.getElementById('updateModal');
        var updateId = document.getElementById('updateId');
        var updatePriceOvernight = document.getElementById('updatePriceOvernight');
        var updatePriceDayTour = document.getElementById('updatePriceDayTour');

        updateId.value = id;
        updatePriceOvernight.value = priceOvernight;
        updatePriceDayTour.value = priceDayTour;

        modal.style.display = 'block';

        var closeModal = document.getElementById('closeModal');
        closeModal.onclick = function() {
            modal.style.display = 'none';
        };

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        };
    }

    // JavaScript for modal handling
    function openUpdateFeeModal(id, amount) {
        var modal = document.getElementById('updateFeeModal');
        var updateFeeId = document.getElementById('updateFeeId');
        var updateFeeAmount = document.getElementById('updateFeeAmount');

        updateFeeId.value = id;
        updateFeeAmount.value = amount;

        modal.style.display = 'block';

        var closeFeeModal = document.getElementById('closeFeeModal');
        closeFeeModal.onclick = function() {
            modal.style.display = 'none';
        };

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        };
    }
</script>



<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="admin.js"></script>

<script src="modaladd.js"></script>




<!-- Bootstrap JavaScript -->
<!-- Include Bootstrap JavaScript at the end of the body -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>



</body>
</html>