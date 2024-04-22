function openFormUser(userId, userLastName, userFirstName, userAccess, userEmail, userNickname) {
  document.getElementById("popup-user").style.display = "block";

  // Set the value of the hidden input field in the edit forms
  document.getElementById("user_id").value = userId;

  document.getElementById("lname").value = userLastName; // Set the value of the name input field
  document.getElementById("fname").value = userFirstName; // Set the value of the name input field
  document.getElementById("Access").value = userAccess; // Set the value of the name input field
  document.getElementById("email").value = userEmail; // Set the value of the name input field
  document.getElementById("nickname").value = userNickname; // Set the value of the name input field
  

   

  // Send an AJAX request to pass the userName variable to PHP
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'your_php_script.php?jsVariable=' + encodeURIComponent(userLastName), true);
  xhr.onload = function() {
    if (xhr.status === 200) {
      console.log('Received from PHP:', xhr.responseText);
    } else {
      console.log('Error: ' + xhr.statusText);
    }
  };
  xhr.send();
}


function closeForm() {
  // Close form
  document.getElementById("popup-user").style.display = "none";
}

document.querySelector('form.form-container').addEventListener('submit', function(event) {
  event.preventDefault();

  // Get the updated values from the form fields
  var userId = document.getElementById("user_id").value;
  var lastName = document.getElementById("lname").value;
  var firstName = document.getElementById("fname").value;
  var access = document.getElementById("Access").value;
  var email = document.getElementById("email").value;
  var nickanme = document.getElementById("nickname").value;

  // Send an AJAX request to update the user
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'processes/process.user.php?action=update', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      // Redirect to the user profile page
      window.location.href = 'index.php?page=settings&subpage=users&action=profile&id=' + userId;
    } else {
      console.log('Error: ' + xhr.statusText);
    }
  };
  xhr.send('user_id=' + userId + '&lname=' + lastName + '&fname=' + firstName + '&access=' + access + '&email=' + email + '&nickname=' + nickname);
});

function deleteUser(userId) {
  if (confirm("Are you sure you want to delete this user?")) {
    // Send an AJAX request to delete the user
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'processes/process.user.php?action=delete', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        // Redirect to the users page
        window.location.href = 'index.php?page=settings&subpage=users';
      } else {
        console.log('Error: ' + xhr.statusText);
      }
    };
    xhr.send('user_id=' + userId);
  }
}

var deleteButtons = document.querySelectorAll('.delete-button');
for (var i = 0; i < deleteButtons.length; i++) {
  deleteButtons[i].addEventListener('click', function(event) {
    event.preventDefault();
    var userId = this.id.split('-')[2];
    if (confirm("Are you sure you want to delete this user?")) {
      // Send an AJAX request to delete the user
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'processes/process.user.php?action=delete', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onload = function() {
        if (xhr.status === 200) {
          // Redirect to the users page
          window.location.href = 'index.php?page=settings&subpage=users';
        } else {
          console.log('Error: ' + xhr.statusText);
        }
      };
      xhr.send('user_id=' + userId);
    }
  });
}


function confirmChangesUsers() {
  var confirmation = confirm("Are you sure you want to save these changes? ");

  if (!confirmation) {
    return false;
  } else {
      document.getElementById("myForm-user").action = "processes/process.user.php?action=update";
      document.getElementById("myForm-user").submit();
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