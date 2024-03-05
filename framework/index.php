<?php
include_once 'classes/class.user.php';
include_once 'classes/class.appointment.php';
include_once 'classes/class.event.php';
include 'config/config.php';
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
$_SESSION['login_time'] = time();

function is_session_timeout() {
    $timeout = 60 * 1; // Set timeout to 15 minutes
    $current_time = time();
    $login_time = $_SESSION['login_time'];
    $time_difference = $current_time - $login_time;

    if ($time_difference > $timeout) {
        session_destroy();
        return true;
    } else {
        return false;
    }
}

if (is_session_timeout()) {
    header("location: logout.php");
    exit();
}
// Tester
if (is_session_timeout()) {
    echo "Your session has timed out. Please log in again.";
} else {
}
// Time differnce

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

$user = new User();
$appointment = new Appointment();
$event = new Event();
if(!$user->get_session()){
	header("location: login.php");
}
$user_id = $user->get_user_id($_SESSION['user_email']);
$user_name = $user->get_user_firstname($user_id);
$user_access = $user->get_user_access($user_id);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Joshan System</title>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
    <link rel="stylesheet" href="css/appointment-css.css?<?php echo time();?>">
    <link rel="stylesheet" href="css/main-v1.css?<?php echo time();?>">
    <script src="jscript/script.js"></script>
    <script src="jscript/appointment-script.js"></script>
    <script src="jscript/user-script.js"></script>
    
</head>
<body>

<!--
<header class="index-header">
    <div class="container">
        <h2>Welcome <//?php echo $user_name; ?>, &nbsp;&nbsp;&nbsp; Access Level: <//?php echo $user_access; ?> </h2>
    </div>
</header>
<nav class="index-navbar">
    <div class="container">
        <a href="index.php" class="<//?php echo ($page === '' || $page === 'home') ? 'active' : ''; ?>">Home</a> | 
        <a href="index.php?page=appointment" class="<//?php echo ($page === 'appointment') ? 'active' : ''; ?>">Appointment</a> | 
        <a href="index.php?page=event" class="<//?php echo ($page === 'event') ? 'active' : ''; ?>">Event</a> |
        <a href="index.php?page=settings" class="<//?php echo ($page === 'settings') ? 'active' : ''; ?>">Settings</a> |
        <a href="logout.php" >Log Out</a>
    </div>
</nav>
-->
<div class="wrapper">
    <!-- Left Side Panel -->
    <div class="sidebar" id="sidebar">
      <div class="logo">
        <img src="https://i.pinimg.com/736x/2b/81/a8/2b81a830e7be62b2437a493d2867c3d8.jpg" alt="Logo">
        <span class="admin-name">Welcome, <?php echo $user_name; ?></span>
      </div>
      <ul class="navigation">
        <li><a href="index.php" class="<?php echo ($page === '' || $page === 'home') ? 'active' : ''; ?>">Home</a></li>
        <li><a href="index.php?page=appointment" class="<?php echo ($page === 'appointment') ? 'active' : ''; ?>">Appointment</a></li>
        <li><a href="index.php?page=event" class="<?php echo ($page === 'event') ? 'active' : ''; ?>">Event</a></li>
        <li><a href="index.php?page=settings" class="<?php echo ($page === 'settings') ? 'active' : ''; ?>">Settings</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
      <div class="footer">
        <p>&copy; HUMBLEZ FOR LYFE</p>
      </div>
      <div class="arrow-icon"><i class="fas fa-chevron-right"></i></div>
    </div>


    <div class="main-content">
    <?php

      switch($page){
                case 'settings':
                    require_once 'settings-module/index.php';
                break; 
                case 'appointment':
                    require_once 'appointment-module/index.php';
                break; 
                case 'event':
                    require_once 'event-module/index.php'; 
                break; 
                default:
                    require_once 'main.php';
                break; 
            }
    ?>
  </div>
  
</div>
<script src="jscript/main-v1.js"></script>
</body>
</html>