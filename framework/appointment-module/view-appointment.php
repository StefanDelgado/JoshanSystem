 <style>
  button {
 width: 160px;
 height: 50px;
 cursor: pointer;
 display: flex;
 align-items: center;
 background: red;
 border: none;
 border-radius: 5px;
 box-shadow: 1px 1px 3px rgba(0,0,0,0.15);
 background: #e62222;
}

button, button span {
 transition: 200ms;
}

button .text {
 transform: translateX(35px);
 color: white;
 font-weight: bold;
}

button .icon {
 position: absolute;
 border-left: 1px solid #c41b1b;
 transform: translateX(110px);
 height: 40px;
 width: 40px;
 display: flex;
 align-items: center;
 justify-content: center;
}

button svg {
 width: 15px;
 fill: #eee;
}

button:hover {
 background: #ff3636;
}

button:hover .text {
 color: transparent;
}

button:hover .icon {
 width: 150px;
 border-left: none;
 transform: translateX(0);
}

button:focus {
 outline: none;
}

button:active .icon svg {
 transform: scale(0.8);
}
</style>
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
    
    <button class="noselect"><span class="text">Delete</span><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg></span></button>
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
