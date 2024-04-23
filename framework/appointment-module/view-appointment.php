<div id="subcontent">
    <div>
    <!--<button id="myBtn">Search</button>-->
    <?php// $_POST['submit'] = 'clear'?>
    <form id="search-form" method="POST" action="">
    <label for="status-select">Status:</label>
    <select id="status-select" name="status" onchange="this.form.submit()">
        <option value="all">-- Select --</option>
        <option value="all">All</option>
        <option value="Approve">Approve</option>
        <option value="Pending">Pending</option>
        <option value="Missed">Missed</option>
    </select>
</form>

<?php
error_reporting(0);
$status = $_POST['status'];
?>

<form id="delete-form" method="POST" action="processes/process.appointment.php?action=delete-status-all">
    <input type="hidden" id="record_delete" name="record_delete" value="<?php echo htmlspecialchars($status);?>">
    Action:
    <input type="submit" value="Delete">
</form>
    
<!-- The Modal 
<div id="myModal" class="modal">
   Modal content 
  <div class="modal-content">
    <span class="close">&times;</span>
    <form id="search-form" method="POST" action="processes/process.appointment.php?action=search">
      <select id="table-select">
        <option value="*">-Enter table-</option>
        <option value="appointment_lastname">Table 1</option>
        <option value="appointment_firstname">Table 2</option>
        <option value="appointment_lastname">Table 3</option>
      </select>
      <select id="sort-select">
        <option>Ascending</option>
        <option>Decending</option>
      </select>
      <input type="text" id="search-input" placeholder="Search..">
      <input type="submit" value="Submit">
    </form>
  </div>
</div> -->

<?php 

?>
    <table class="data-table">
      <tr>
        <th>#</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Purpose</th>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
      </tr>
<?php

$count = 1;


if($appointment->get_record_status($status) != false){
  foreach($appointment->get_record_status($status) as $value){
      extract($value);

          // Display the record where the status is equal to the submitted button value
          ?>
          <tr id=<?php echo $appointment_lastname;?>>
              <td><?php echo $count;?></td>
              <td><?php echo $appointment_lastname;?></td>
              <td><?php echo $appointment_firstname;?></td>
              <td><?php echo $appointment_purpose;?></td>
              <td><?php echo $appointment_date;?></td>
              <td><?php echo date('g:i A', strtotime($appointment_time)); ?></td>
              <td><?php echo $appointment_status; ?></td>
          </tr>
          <?php
          $count++;
      } 
} else {
  if($status != "all"){
  echo "No Record Found.";
  }
  foreach ($appointment->list_appointments() as $value) {
    extract($value);
      
  
?>
      <tr id=<?php echo $appointment_lastname;?>>
        <td><?php echo $count;?></td>
        <td><?php echo $appointment_lastname;?></td>
        <td><?php echo $appointment_firstname;?></td>
        <td><?php echo $appointment_purpose;?></td>
        <td><?php echo $appointment_date;?></td>
        <td><?php echo date('g:i A', strtotime($appointment_time)); ?></td>
        <td><?php echo $appointment_status; ?></td>
        </tr>
      <tr>
<?php
 $count++;
   }
}
?>


  

    </table>
</div>
