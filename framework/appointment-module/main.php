<div class="responsive-table">
<div id="subcontent">
Pending Appointment
<br>
<ul class="responsive-table">
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
      </tr>
      </li>
<?php
$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
$NOW = $NOW->format('Y-m-d');
$count = 1;
if($appointment->list_appointments() != false){
  
foreach($appointment->list_appointments() as $value){
   extract($value);
   if($appointment_date >= $NOW && $appointment_status == "Pending"){

  
?>
      <tr id=<?php echo $appointment_lastname;?>>
        <td><?php echo $count;?></td>
        <td><?php echo $appointment_lastname;?></td>
        <td><?php echo $appointment_firstname;?></td>
        <td><?php echo $appointment_purpose;?></td>
        <td><?php echo $appointment_date;?></td>
        <td><?php echo date('g:i A', strtotime($appointment_time)); ?></td>
        <td><?php echo $appointment_status; ?></td>
        <td>
        <!-- Button -->  
        <form action="processes/process.appointment.php?action=update_status" method="post">
        <input type="hidden" id="appointment_id" name="appointment_id" value="<?php echo $appointment_id; ?>">
        <input type="hidden" id="appointment_status_approve" name="appointment_status_approve" value="Approve">
        <input type="submit" value="Approve">
        </form>
        </td>

      </tr>
      <tr>
<?php
 $count++;
   }
}
}else{
  echo "No Record Found.";
}
?>
    </table>

<br>
Missed appointment
<br>

    <table class="data-table">
      <tr>
        <th>#</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Purpose</th>
        <th>date</th>
        <th>time</th>
        <th>status</th>
      </tr>
<?php
$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
$NOW = $NOW->format('Y-m-d');
$count = 1;
if($appointment->list_appointments() != false){
  
foreach($appointment->list_appointments() as $value){
   extract($value);
   if($appointment_date < $NOW && $appointment_status == "Pending"){
  
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
}else{
  echo "No Record Found.";
}
?>
    </table>
</div>