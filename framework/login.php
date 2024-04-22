<?php
include_once 'config/config.php';
include_once 'classes/class.user.php';

$user = new User();
if($user->get_session()){
	header("location: index.php");
}
if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	$login = $user->check_login($useremail,$password);
	if($login){
		header("location: index.php");
	}else{
		?>
        <div id='error_notif'>Wrong email or password.</div>
        <?php
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Application Name</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css?<?php echo time();?>">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel="stylesheet">
</head>
<body>
<div class="wrapper">
     <form method="POST" action="" name="login">
        <h1>Login</h1>
        <div class="input-box">
            <input type="text" placeholder="Username" required>
            <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
            <input type="password" placeholder="Password" required>
            <i class='bx bxs-lock-alt'></i>
        </div>

        <div class="remember-forgot">
            <label> <input type="checkbox"> Remember me</label>
            <a href="#">Forgot password?</a>
        </div>
        <button type="submit" class="btn">Log in</button>
        <div class="register-link">
            <p>Don't have an account? <a href="#">Register</a></p>
        </div>
    </form>
</div>
</body>
</html>