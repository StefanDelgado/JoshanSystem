
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

function confirmDelete(appointment_id) {
  return confirm('Are you sure you want to delete this appointment?');
}

// CLIENT's side
document.querySelector('form.form-container').addEventListener('submit', function(event) {
  event.preventDefault();

  // Get the updated values from the form fields
  var firstName = document.getElementById("fname").value;
  var lastName = document.getElementById("lname").value;

  // Send an AJAX request to update the appointment
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'processes/process.appointment.php?action=update', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      // Redirect to the appointment profile page
      window.location.href = 'index.php?page=settings&subpage=appointments&action=profile&id=' + appointmentId;
    } else {
      console.log('Error: ' + xhr.statusText);
    }
  };
  xhr.send('lname=' + lastName + '&fname=' + firstName);
});