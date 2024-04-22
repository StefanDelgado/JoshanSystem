
function confirmChanges() {
    var confirmation = confirm("Are you sure you want to save these changes? ");
  
    if (!confirmation) {
      return false;
    } else {
        document.getElementById("myForm").action = "processes/process.appointment.php?action=update";
        document.getElementById("myForm").submit();
    }
  }

document.addEventListener("DOMContentLoaded", function() {
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
/*btn.onclick = function() {
  modal.style.display = "block";
}*/

// When the user clicks on <span> (x), close the modal
/*span.onclick = function() {
  modal.style.display = "none";
}*/

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
});


  // Status buttons
 // JavaScript to submit the form when a button is clicked
 document.querySelectorAll('button[type="submit"]').forEach(button => {
  button.addEventListener('click', () => {
      document.getElementById('status-input').value = button.value;
  });
});