Upcoming Events
<br>
***WORK IN PROGRESS***
<br><br><br>
Upcoming appointment
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Purpose</th>
        <th>Date</th>
        <th>Time</th>
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
    <br><br>
To do list:<br>
- Search button functions <br>
- User should be able to add, edit and delete tasks. <br>
- Appointment Delete all <br>
- Events CRUD <br>
- Access levels <br>
- Session out <br>


</div>