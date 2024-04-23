<?php
include '../classes/class.user.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'new':
        create_new_user();
	break;
    case 'update':
        update_user();
	break;
    case 'delete':
        delete_user();
	break;
    case 'profile':
        profile_user();
	break;
}

function create_new_user(){
	$user = new User();
    $email = $_POST['email'];
    $lastname = ucwords($_POST['lastname']);
    $firstname = ucwords($_POST['firstname']);
    $nickname = ucwords($_POST['nickname']);
    $gender = ucwords($_POST['gender']);
    $address = ucwords($_POST['address']);
    $access = ucwords($_POST['access']);
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    
     // Check for duplicate user based on first name and last name
     $result = $user->get_user_by_name($firstname, $lastname);
     if ($result) {
         // Handle duplicate user here, e.g., display an error message
         $error_message = "Error: A user with the same first name and last name already exists.";
         header('location: ../index.php?page=settings&subpage=users&action=create&id=error&errmsg=' . urlencode($error_message));
         return;
     }
    $result = $user->new_user($email,$password,$lastname,$firstname,$nickname,$gender,$address, $access);
    if($result){
        $id = $user->get_user_id($email);
        header('location: ../index.php?page=settings&subpage=users&action=profile&id='.$id);
    }
}

function update_user(){
	$user = new User();
    $user_id = $_POST['user_id'];
    $lastname = ucwords($_POST['lname']);
    $firstname = ucwords($_POST['fname']);
    $access = ucwords($_POST['Access']);
    //$nickname = ucwords($_POST['nickname']);
    $email = $_POST['email'];
    $address = ucwords($_POST['address']);
    $gender = $_POST['gender'];     
   
    
    $result = $user->update_user($lastname,$firstname, $access, $user_id, $email, $address,$gender);
    if($result){
        header('location: ../index.php?page=settings&subpage=users&action=modify&id='.$user_id);
    }
}

function delete_user(){
    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';
	$user = new User();
    $result = $user->delete_user($user_id);
    if($result){
        header('location: ../index.php?page=settings&subpage=users&action=modify&id='.$user_id);
    }
}
function profile_user(){
    $user = new User();
    $user_id = $_POST['id'];
    $result = $user->profile_users($user_id);
    if($result){
        header('location: ../index.php?page=settings&subpage=users&action=profile&id='.$user_id);
    }
}
