
  // Function to open the modal
  function openModal() {
    var modal = document.getElementById("registrationModal");
    modal.style.display = "block";
  }

  // Function to close the modal
  function closeModal() {
    var modal = document.getElementById("registrationModal");
    modal.style.display = "none";
  }

  // Event listeners for opening and closing the modal
  var openModalButton = document.getElementById("openModalButton");
  var closeModalButton = document.getElementById("closeModalButton");

  openModalButton.addEventListener("click", openModal);
  closeModalButton.addEventListener("click", closeModal);

  // Close the modal if the user clicks outside of it
  window.addEventListener("click", function (event) {
    var modal = document.getElementById("registrationModal");
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });


