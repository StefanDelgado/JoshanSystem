


      <div class="container">
        <div class="header">
          <h1>Welcome to the Admin Panel</h1>
        </div>
        <div class="content-container">
          <div class="content">
            <!-- Your content here -->
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
$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
$NOW = $NOW->format('Y-m-d');

$count = 1;
if($appointment->list_appointments() != false){
foreach($appointment->list_appointments() as $value){
   extract($value);
   if($appointment_date >= $NOW && $appointment_status == "Approve"){
  
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
          </div>
        </div>
      </div>
