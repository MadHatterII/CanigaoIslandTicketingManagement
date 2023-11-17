<?php


// Check if the user is not authenticated, redirect to the login page
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php"); // Replace "login.php" with the actual login page URL
    exit;
}



include('controller/insert.php');

insertInfoTicket();


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wander Lust - Island Ticketing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="agentnav/agent.css">
    <link rel="stylesheet" type="text/css" href="agentcss/cottage.css">
</head>
<body>
   
<header>
        <?php include('agentnav/header.html'); ?>
    </header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <?php include('agentnav/nav.html'); ?>
    </nav>

   <!-- Main Content -->
 <main style="background-color: #f0f8ff;">
        <section id="ticketing">
            <div class="container">
                <h2>Ticketing for Agents</h2>
                <p>Welcome, ticketing agents! Manage island tickets and bookings with ease.</p>

            <!-- Add a table to display ticket options -->
            <table class="table table-striped">
               
            </table>

            <!-- Add a booking form for ticketing agents -->
            <h3>Agent Booking Form</h3>
            <form action="ticketingagent.php" method="POST">
    <div class="row">
        <!-- First Column -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="ticketType">Ticket Type</label>
                <select class="form-control" id="ticketType" name="ticketType">
                    <option value="standard">Standard Ticket</option>
                    <option value="vip">VIP Ticket</option>
                    <option value="family">Family Ticket</option>
                    
                </select>

                <div class="form-group">
        <label for="textBox1">Contact Number:</label>
        <input type="text" class="form-control" id="contactNumber" name="contactNumber" placeholder="Enter Contact Number" required>
    </div>
    <div class="form-group">
        <label for="textBox3">Address</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
    </div>
    <div class="form-group">
                <label for="groupName">Group Name</label>
                <input type="text" class="form-control" id="groupName" name="groupName" placeholder="Group Name  / Group Representative" required>
            </div>
            </div>
        </div>

        <!-- Second Column -->
        <div class="col-md-6">
        <label for="ticketType">Boat</label>
                <select class="form-control" id="boat" name="boat">
                <option value="standard">Select a  Boat</option>
                  
                    <option value="Duran Duran">Duran Duran</option>
                    <option value="Franklyn">Franklyn</option>
                    <option value="Island Rose">Island Rose</option>
                    <option value="Lorwinds">Lorwinds</option>
                    <option value="San Pedro  de Nonok">San Pedro  de Nonok</option>
                  
                    
                </select>
           
 <fieldset>
    <legend>Stay Type</legend>
    <div class="form-group">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="stayType" id="dayTourRadio" value="Daytour" onchange="updateTimeSchedule()" required>
            <label class="form-check-label" for="dayTourRadio">Day Tour</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="stayType" id="overnightRadio" value="Overnight" onchange="updateTimeSchedule()" required>
            <label class="form-check-label" for="overnightRadio">Overnight</label>
        </div>

    </div>
    <div class="form-group">
    <label for="cottageTypeDropdown">Cottage Type: </label>
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="cottageTypeButton" data-bs-toggle="dropdown" aria-expanded="false">
            Select Cottage
        </button>
        <ul class="dropdown-menu" aria-labelledby="cottageTypeButton">
            <li><a class="dropdown-item"  data-value="Two-Story w/ Attic">Two-Story w/ Attic</a></li>
            <li><a class="dropdown-item"  data-value="Duplex Cottage(Right Side of the Island)">Duplex Cottage(Right Side of the Island)</a></li>
            <li><a class="dropdown-item"  data-value="Duplex Cottage(Left Side of the Island)">Duplex Cottage(Left Side of the Island)</a></li>
            <li><a class="dropdown-item"  data-value="Duplex Cottage(Left Side of the Island)">Tourism Building Room</a></li>
        </ul>
    </div>
    <!-- Hidden input field to store the selected value -->
    <input type="hidden" name="cottageType" id="cottageType" value="" />
  
</div>

  
    <div class="form-group">
      <label for="timeSchedule">Time Schedule</label>
      <select class="form-control" id="timeSchedule" name="timeSchedule">
        <option value="">Choose time...</option>
            <option value="2:00 P.M.">2:00 P.M.</option>
            <option value="2:30 P.M.">2:30 P.M.</option>
            <option value="3:00 P.M.">3:00 P.M.</option>
            <option value="3:30 P.M.">3:30 P.M.</option>
            <option value="4:00 P.M.">4:00 P.M.</option>
            <option value="4:30 P.M.">4:30 P.M.</option>
            <option value="5:00 P.M.">5:00 P.M.</option>
            <option value="5:30 P.M.">5:30 P.M.</option>
            <!-- Over Night -->
            <option value="6:00 A.M.">6:00 A.M.</option>
            <option value="6:30 A.M.">6:30 A.M.</option>
            <option value="7:00 A.M.">7:00 A.M.</option>
            <option value="7:30 A.M.">7:30 A.M.</option>
            <option value="8:00 A.M.">8:00 A.M.</option>
            <option value="8:30 A.M.">8:30 A.M.</option>
            <option value="9:00 A.M.">9:00 A.M.</option>
            <option value="10:30 A.M.">10:30 A.M.</option>
            <option value="11:00 A.M.">11:00 A.M.</option>
            <option value="12:30 P.M.">12:30 P.M.</option>
            <option value="1:00 P.M.">1:00 P.M.</option>
        </select>
    </div>
</fieldset>


<script>
function updateTimeSchedule() {
    var dayTourRadio = document.getElementById("dayTourRadio");
    var timeSchedule = document.getElementById("timeSchedule");

    if (dayTourRadio.checked) {
        // If "Day Tour" is selected, update the select options
        timeSchedule.innerHTML = '<option value="">Choose Time for Day Tour</option><option value="2:00 PM">2:00 P.M.</option><option value="2:30 PM">2:30 P.M.</option><option value="3:00 PM">3:00 P.M.</option><option value="3:30 PM">3:30 P.M.</option><option value="4:00 PM">4:00 P.M.</option><option value="4:30 PM">4:30 P.M.</option><option value="5:00 PM">5:00 P.M.</option><option value="5:30 PM">5:30 P.M.</option>';
    } else {
        // If "Overnight" is selected, update the select options
        timeSchedule.innerHTML = '<option value="">Choose Time for Overnight</option><option value="6:00 AM">6:00 A.M.</option><option value="6:30 AM">6:30 A.M.</option><option value="7:00 AM">7:00 A.M.</option><option value="7:30 AM">7:30 A.M.</option><option value="8:00 AM">8:00 A.M.</option><option value="8:30 AM">8:30 A.M.</option><option value="9:00 AM">9:00 A.M.</option><option value="9:30 AM">9:30 A.M.</option><option value="10:00 AM">10:00 A.M.</option><option value="10:30 AM">10:30 A.M.</option><option value="11:00 AM">11:00 A.M.</option><option value="11:30 AM">11:30 A.M.</option><option value="12:00 PM">12:00 P.M.</option><option value="12:30 PM">12:30 P.M.</option><option value="1:00 PM">1:00 P.M.</option>';
    }
}


document.addEventListener('DOMContentLoaded', (event) => {
    // Get all dropdown items
    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent the default anchor behavior
            const value = this.getAttribute('data-value'); // Get the data-value of clicked item
            // Set the value to the hidden input
            document.getElementById('cottageType').value = value;
            // Change the button text to the selected item's text
            document.getElementById('cottageTypeButton').textContent = value;
        });
    });
});
</script>
        </div>
    </div>
    <br>
   <center> <div class="form-group">
    <button type="submit" class="btn btn-success" name="submit" id="submit">Submit</button>
</div></center>

</form>

        </div>
    </section>


   <script>
  let insertSuccess = <?php echo $insertSuccess; ?>;
    if (insertSuccess){
      
  $('#successModal').modal('show'); 


}


 

</script>
</form>

</main>


    <!-- Footer -->
    <footer>
        <p>&copy; 2023 Wander Lust Ticketing System</p>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Your Custom JavaScript -->
    <script src="script.js"></script>
</body>
</html>