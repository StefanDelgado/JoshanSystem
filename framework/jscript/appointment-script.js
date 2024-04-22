
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
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
});

document.getElementById('search-form').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent the default form submission behavior

  // Get the form data
  var table = document.getElementById('table-select').value;
  var sort = document.getElementById('sort-select').value;
  var search = document.getElementById('search-input').value;

  // Call the search_appointment function with the form data
  search_appointment(table, sort, search);
}); 