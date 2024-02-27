<div id="subcontent">
    <div>
    <button id="myBtn">Open Modal</button>
    <!-- The Modal -->
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <span class="close">&times;</span>
  <form>
  <select>
    <option>-Enter table-</option>
    <option>Name</option>
    <option>Date</option>
    <option>Time</option>
    <option>Status</option>
  </select>

  
  
  <select>
    <option>-Sort-</option>
    <option>Ascending</option>
    <option>Decending</option>
  </select>
  <input type="text" placeholder="Search.."><br>

  <input  type="submit" value="Submit">
</form>
</div>
</div>


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

$count = 1;
if($appointment->list_appointments() != false){
foreach($appointment->list_appointments() as $value){
   extract($value);
  
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
}else{
  echo "No Record Found.";
}
?>
    </table>
</div>
