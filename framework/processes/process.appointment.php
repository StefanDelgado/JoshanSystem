<?php
include '../classes/class.appointment.php';
include '../classes/class.user.php';


$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'new':
        create_new_appointment();
	break;
    case 'update':
        update_appointment();
	break;
    case 'delete':
        delete_appointment();
	break;
    case 'update_status':
        update_appointment_status();
    break;
    case 'search-status':
        search_appointment_status();
    break;
    case 'delete-status-all':
        delete_appointment_all();
    break;
}

function create_new_appointment(){
	$user = new User();
    $lastName = ucwords($_POST['lname']);
    $firstName = ucwords($_POST['fname']);
    $purpose = ucwords($_POST['purpose']);
    $date = $_POST['date'];
    $time = $_POST['time'];

    // User Check
    $user_check = false;
    foreach($user->list_users() as $value){
        extract($value);
        if($user_firstname == $firstName &&  $user_lastname == $lastName){
            $user_check = true;
            
            $appointment = new Appointment();
            $result = $appointment->new_appointment($lastName,$firstName,$purpose,$date,$time);
            if($result){
                $id = $appointment->get_appointment_id($lastName);
                header('location: ../index.php?page=appointment&subpage=appointment&action=profile&id='.$id);
            }
            break;
        } 
    }
    if($user_check == false) {
        echo "<script type='text/javascript'>
            alert('Invalid first name and last name');
            setTimeout(function() {
                window.location.href = '../index.php?page=appointment&subpage=appointment&action=create';
            }, 100);
        </script>";
    	//header("location: ../index.php?page=appointment&subpage=appointment&action=create");
        

    }
}

function update_appointment(){
	$appointment = new appointment();
    $appointment_id = $_POST['appointment_id'];
    $lastName = ucwords($_POST['lname']);
    $firstName = ucwords($_POST['fname']);
    $purpose = ucwords($_POST['purpose']);
    $date = $_POST['date'];
    $time = $_POST['time'];
   
    
    $result = $appointment->update_appointment($appointment_id,$lastName,$firstName,$purpose,$date,$time);
    if($result){
        header('location: ../index.php?page=appointment&subpage=appointment&action=profile&id='.$appointment_id);
    }
}

function delete_appointment(){
    
	$appointment_id = isset($_GET['appointment_id'])? $_GET['appointment_id'] : '';
    $appointment = new appointment();
    
    
  
        $result = $appointment->delete_appointment($appointment_id);
        if ($result) {
            header('location:../index.php?page=appointment&subpage=appointment&action=profile&id='. $appointment_id);
        }
    
}
// Update Status
function update_appointment_status(){
    $appointment = new appointment();
    
    $appointment_id = $_POST['appointment_id'];
    print_r("Appointment ID received: $appointment_id");
    $status = $_POST['appointment_status_approve'];
   
    
    $result = $appointment->update_appointment_status($appointment_id,$status);
    if($result){
        header('location: ../index.php?page=appointment&subpage=appointment&action=profile&id='.$appointment_id);
    }
}
function delete_appointment_all(){
    $status = $_POST['record_delete'];
    print_r("Status: $status");
    $appointments=new appointment();
    $results=$appointments->delete_appointment_record($status);
    if($results){
        header('location: ../index.php?page=appointment&subpage=appointment&action=view');
    }

}

function search_appointment_status(){
    $appointment = new appointment();
    $status = $_POST['status'];
    print_r("Status: $status");
    $result = $appointment->get_record_status($status);
    if($result){
        header('location: ../index.php?page=appointment&subpage=appointment&action=view');
    }
}