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
    $access = ucwords($_POST['access']);
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    
    $result = $user->new_user($email,$password,$lastname,$firstname,$nickname,$access);
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
    $nickname = ucwords($_POST['nickname']);
    $email = ucwords($_POST['email']);
   
    
    $result = $user->update_user($lastname,$firstname, $access, $user_id, $email, $nickname);
    if($result){
        header('location: ../index.php?page=settings&subpage=users&action=&id='.$user_id);
    }
}

function delete_user(){
    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';
	$user = new User();
    $result = $user->delete_user($user_id);
    if($result){
        header('location: ../index.php?page=settings&subpage=users&action=&id='.$user_id);
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
