<?php

include('../controller/insert.php');

insertMembers();

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../style/ticketingagent.css">
   

    <title>Add Members</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark">
<div class="container">
    <a class="navbar-brand" href="../tickethome.php">Wander Lust</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
   
    <ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link " href="../tickethome.php">
    <i class="fas fa-home"></i> Home
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="../user/ticketingagent.php">
    <i class="fas fa-ticket-alt"></i> Ticketing
</a>
</li>
<li class="nav-item">
    <a class="nav-link custom-white" href="../user/customerinfo.php">
        <i class="fas fa-user"></i> Customer Info
    </a>
</li>
<li class="nav-item">
<a class="nav-link" href="../boat.php">
    <i class="fas fa-ship"></i> Boat
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="../cottage.php">
    <i class="fas fa-home"></i> Cottage
</a>
</li>
<li class="nav-item">
<a class="nav-link logout-btn" href="../logout.php" onclick="return confirm('Are you sure you want to log out?');">
<i class="fas fa-sign-out-alt"></i> Logout
</a>

</li>
</ul>
    
    </div>
</div></nav>
<body>
<section id="memberList">
    <div class="container">
        <h3>Member List</h3>
        <p>Add individual members.</p>

        <!-- Button to trigger the modal -->

        <!-- Member Modal -->
        <form method="POST" action="">
      
                            <h5 class="modal-title" id="addMemberModalLabel">Add Member</h5>
                        
                     
                        <div class="modal-body">
                            
                                <div class="form-group">
                                    <label for="memberCount">Number of Members</label>
                                    <input type="number" name="memberCount" class="form-control" id="memberCount" placeholder="Enter the number of members" required>
                                </div>

                                <div class="form-group">
                                    <label for="memberFields">Member Names</label>
                                    <div id="memberFields">
                                        <!-- Dynamically generated member input fields will appear here -->
                                    </div>
                                </div>
                           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" >Close</button>
                            <button type="button" class="btn btn-primary" id="generateMembers">Generate Members</button>
                            <button type="submit" class="btn btn-success" id="submitMembers" name="submitMembers" >Submit</button>
                        </div>
                        
                    </div>
         
        </form>
    

<script>
document.addEventListener("DOMContentLoaded", function () {
    const memberFields = document.getElementById("memberFields");
    const generateMembersButton = document.getElementById("generateMembers");

    generateMembersButton.addEventListener("click", function () {
        const memberCountInput = document.getElementById("memberCount");
        const count = parseInt(memberCountInput.value, 10); // Always specify the radix

        // Clear existing member fields
        memberFields.innerHTML = "";

        for (let i = 0; i < count; i++) {
            // Create a div for the input group
            const inputGroup = document.createElement("div");
            inputGroup.classList.add("form-group");

            // Create the label for the input
            const label = document.createElement("label");
            label.setAttribute("for", "memberName" + i);
            label.textContent = "Member " + (i + 1) + " Name";

            // Create the input field
            const input = document.createElement("input");
            input.type = "text";
            input.classList.add("form-control");
            input.name = "memberName[]";
            input.id = "memberName" + i;
            input.placeholder = "Enter member name";
            input.required = true;

            // Append the label and input to the input group
            inputGroup.appendChild(label);
            inputGroup.appendChild(input);

            // Append the input group to the fields container
            memberFields.appendChild(inputGroup);
        }
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>