<div id="subcontent">
Current and upcoming Appointment
<br>

    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Name</th>
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
   if($appointment_date >= $NOW){
  
?>
      <tr id=<?php echo $appointment_name;?>>
        <td><?php echo $count;?></td>
        <td><?php echo $appointment_name;?></td>
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

<br>
Missed appointment
<br>

    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Name</th>
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
   if($appointment_date < $NOW){
  
?>
      <tr id=<?php echo $appointment_name;?>>
        <td><?php echo $count;?></td>
        <td><?php echo $appointment_name;?></td>
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