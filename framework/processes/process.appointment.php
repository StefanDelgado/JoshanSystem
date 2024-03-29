<?php
include '../classes/class.appointment.php';

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
    case 'search':
        search_appointment();
}

function create_new_appointment(){
	$appointment = new Appointment();
    $lastName = ucwords($_POST['lname']);
    $firstName = ucwords($_POST['fname']);
    $purpose = ucwords($_POST['purpose']);
    $date = $_POST['date'];
    $time = $_POST['time'];
    $result = $appointment->new_appointment($lastName,$firstName,$purpose,$date,$time);
    if($result){
        $id = $appointment->get_appointment_id($lastName);
        header('location: ../index.php?page=appointment&subpage=appointment&action=profile&id='.$id);
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
	$appointment_id = isset($_GET['appointment_id']) ? $_GET['appointment_id'] : '';
    $appointment = new appointment();
    $result = $appointment->delete_appointment($appointment_id);
    if ($result) {
        header('location: ../index.php?page=appointment&subpage=appointment&action=profile&id=' . $appointment_id);
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

function search_appointment(){
    $table = $_POST['table'];
    $sort = $_POST['sort'];
    $search = $_POST['search'];

    $result = $appointment->search_appointment($table, $sort, $search);
    if($result){
        header('location: ../index.php?page=appointment&subpage=appointment&action=view');
    }
}