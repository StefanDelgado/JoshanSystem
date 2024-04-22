<div id="subcontent">
    <div>
    <button id="myBtn">Search</button>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
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
</div>


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
if($appointment->list_appointments() != false){
foreach($appointment->list_appointments() as $value){
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
}else{
  echo "No Record Found.";
}
?>
    </table>
</div>
