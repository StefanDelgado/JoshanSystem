function confirmChanges() {
    var confirmation = confirm("Are you sure you want to save these changes? ");
  
    if (!confirmation) {
      return false;
    } else {
        document.getElementById("myForm").action = "processes/process.appointment.php?action=update";
        document.getElementById("myForm").submit();
    }
  
    
  }