document.addEventListener('click', function (event) {
    const target = event.target;
    if (target.classList.contains('status-cell')) {
        const currentStatus = target.getAttribute('data-status');
        const newStatus = currentStatus === 'IN' ? 'OUT' : 'IN';
        target.setAttribute('data-status', newStatus);
        target.textContent = newStatus;

        const id = target.parentNode.querySelector('td:nth-child(1)').textContent; // Get the "id" value
        updateStatusInDatabase(id, newStatus); // Pass "id" to the function
    }
});

function updateStatusInDatabase(id, newStatus) { // Use "id" instead of "groupName"
    fetch('cottagestatus.php', {
        method: 'POST',
        body: JSON.stringify({ id, newStatus }), // Send "id" to the server
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (response.ok) {
            console.log('Status updated in the database.');
        } else {
            console.error('Error updating status in the database.');
        }
    })
    .catch(error => {
        console.error("Error updating status: " + error);
    });
}