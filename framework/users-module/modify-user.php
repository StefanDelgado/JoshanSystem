<div id="subcontent">
    <table class="data-table">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Access Level</th>
        <th>Email</th>
        <th>Nickname</th>
        <th>Action</th>
      </tr>
<?php

$count = 1;
if($user->list_users() != false){
foreach($user->list_users() as $value){
   extract($value);
  
?>
      <tr>
      <td><?php echo $count;?></td>
        <td><?php echo $user_lastname.', '.$user_firstname;?></td>
        <td><?php echo $user_access;?></td>
        <td><?php echo $user_email;?></td>
        <td><?php echo $user_nickname;?></td>
        <td><button class="open-button" onclick="openFormUser('<?php echo $user_id; ?>','<?php echo $user_lastname;?>','<?php echo $user_firstname;?>','<?php echo $user_access;?>','<?php echo $user_email;?>','<?php echo $user_nickname;?>')">Edit</button> | <a href="processes/process.user.php?action=delete&user_id=<?php echo $user_id; ?>" id="delete-button-<?php echo $user_id; ?>" class="delete-button-user">Delete</a></td>
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


<!-- The form -->
<div class="form-popup" id="popup-user">
  <form method="POST" id="myForm-user" action="processes/process.user.php?action=update" class="form-container">
    <h1>Editing user</h1>
    <input type="hidden" id="user_id" name="user_id" >
    <div id="form-block-half">
      <label for="lname">Last Name</label>
      <input type="text" id="lname" class="input" name="lname" value=""  placeholder="Your last name..">

      <label for="fname">First Name</label>
      <input type="text" id="fname" class="input" name="fname" value=""  placeholder="Your first name..">

      <label for="Access">Access</label>
      <input type="text" id="Access" class="input" name="Access" placeholder="Access...">

      <label for="email">Email</label>
      <input type="text" id="email" class="input" name="email" required>

      <label for="nickname">Nickname</label>
      <input type="text" id="nickname" class="input" name="nickname" required>
    </div>
    <div id="button-block">
      <button type="button" class="btn" id="submit-button" onclick="confirmChangesUsers()">Save</button>
      <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </div>
  </form>
</div>