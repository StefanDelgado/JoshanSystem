<?php 
$user_id = $_GET['id'];
include_once 'classes/class.user.php';
$user = new User();
$user->profile_users($user_id);
$firstName = $user->get_user_firstname($user_id);
$lastName = $user->get_user_lastname($user_id);
$email = $user->get_user_email($user_id);
$access = $user->get_user_access($user_id);
$gender = $user->get_user_gender($user_id);
$address = $user->get_user_address($user_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Website</title>
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    .user-info {
      display: flex;
      justify-content: space-between;
      align-items:stretch;
      text-align:center;
    }
    .user-info-left {
      width: 45%;
    }
    .user-info-right {
      width: 45%;
    }
    .iframe-container{
      display:flex;
      justify-content: center;
      margin-top: 2.5%;
      margin-bottom:4%;
    }
  </style>
</head>
<body>
  <!-- Main Content Area -->
  <div class="container">
    <div class="header">
    <h2><?php echo $firstName.' '.$lastName;?></h2>
    </div>
    <div class="user-info">
      <div class="user-info-left">
        <p>First Name: <?php echo $firstName;?></p>
        <p>Last Name: <?php echo $lastName;?></p>
        <!--<p>Birthdate: *Insert Birthdate*</p>-->
        <p>Gender: <?php echo $gender;?></p>
      </div>
      <div class="user-info-right">
        <p>Email: <?php echo $email;?></p>
        <p>Address: <?php echo $address;?></p>
        <p>Access Level: <?php echo $access;?></p>
      </div>
    </div>
    <div class="iframe-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d952.2763003772587!2d122.95718617188881!3d10.678791239394512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sph!4v1709650896132!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="table-container">

          <table class="data-table">
            
      <tr>
        <th>#</th>
        <th>Purpose</th>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
      </tr>
<?php

$count = 1;
if($appointment->list_appointments() != false){
foreach($appointment->list_appointments() as $value){ // Get  the list of appointments from the Appointment table
   extract($value);
   if($appointment_lastname == $lastName){ // Conditions  to only show the user's appointment by using user's lastname
?>
      <tr id=<?php echo $appointment_lastname;?>>
        <td><?php echo $count;?></td>
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
      </div>
  </div>
  <script src="js/admin.js"></script>
  <!-- Google Maps API Script -->
  <script>
    function initMap() {
      console.log("Initializing Google Map...");
      const map = new google.maps.Map(document.getElementById("google-map"), {
        center: { lat: 40.7128, lng: -74.006 },
        zoom: 12,
      });
      console.log("Google Map initialized successfully.");
    }
  </script>
  <!-- Replace YOUR_API_KEY with your actual Google Maps API key -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
</body>
</html>
