<?php
class appointment{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_wbapp';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_appointment($lastName, $firstName, $purpose, $date, $time){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
		
		$status = 'Pending';

		$data = [
			[$lastName, $firstName, $purpose, $date, $time, $status],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_appointment (appointment_lastname, appointment_firstname, appointment_purpose, appointment_date, appointment_time, appointment_status) VALUES (?,?,?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}

		return true;

	}

	public function update_appointment($appointment_id,$lastName,$firstName,$purpose, $date, $time){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_appointment SET appointment_lastname=:appointment_lastname, appointment_firstname=:appointment_firstname, appointment_purpose=:appointment_purpose, appointment_date=:appointment_date, appointment_time=:appointment_time WHERE appointment_id=:appointment_id";

		$q = $this->conn->prepare($sql);
	$q->execute(array(':appointment_lastname'=>$lastName,':appointment_firstname'=>$firstName, ':appointment_purpose'=>$purpose, ':appointment_date'=>$date, ':appointment_time'=>$time, ':appointment_id'=>$appointment_id));
		return true;
	}
	// Update status
public function update_appointment_status($appointment_id,$status){
    /* Setting Timezone for DB */
    $NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
    $NOW = $NOW->format('Y-m-d H:i:s');

    $sql = "UPDATE tbl_appointment SET appointment_status=:appointment_status WHERE appointment_id=:appointment_id";

    $q = $this->conn->prepare($sql);
    $q->execute(array(':appointment_status'=>$status,':appointment_id'=>$appointment_id));
    return true;
}


	public function list_appointments(){
		$sql="SELECT * FROM tbl_appointment"; // Loads all table data
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
}
public function list_approve_appointments(){
	$sql = "SELECT * FROM tbl_appointment WHERE appointment_status = 'Approve'"; // Loads approve table data
	$q = $this->conn->query($sql) or die("failed!");
	while($r = $q->fetch(PDO::FETCH_ASSOC)){
	$data[]=$r;
	}
	if(empty($data)){
	   return false;
	}else{
		return $data;	
	}
}
/*public function search_appointment($table, $sort, $search) {
	// Connect to the database
	$db = new PDO('mysql:host=localhost;dbname=mydatabase', 'username', 'password');
  
	// Prepare the SQL query
	$query = "SELECT * FROM appointments";
  
	// Add the WHERE clause to filter the appointments by table
	if ($table !== '*') {
	  $query .= " WHERE table = :table";
	}
  
	// Add the ORDER BY clause to sort the appointments
	if ($sort === 'Ascending') {
	  $query .= " ORDER BY date, time ASC";
	} else {
	  $query .= " ORDER BY date, time DESC";
	}
  
	// Add the LIKE clause to search for appointments
	if ($search !== '') {
	  $query .= " AND (last_name LIKE :search OR first_name LIKE :search OR purpose LIKE :search OR date LIKE :search OR time LIKE :search OR status LIKE :search)";
	}
  
	// Prepare the statement
	$stmt = $db->prepare($query);
  
	// Bind the parameters
	if ($table !== '*') {
	  $stmt->bindValue(':table', $table);
	}
	if ($search !== '') {
	  $searchTerm = '%' . $search . '%';
	  $stmt->bindValue(':search', $searchTerm);
	}
  
	// Execute the statement
	$stmt->execute();
  
	// Fetch the filtered appointments
	$filteredAppointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
	// Return the filtered appointments
	return $filteredAppointments;
  }
*/

public function delete_appointment($appointment_id){
	$sql = "DELETE FROM tbl_appointment WHERE appointment_id = :appointment_id";
	$q = $this->conn->prepare($sql);
	$q->execute(array(':appointment_id'=>$appointment_id));
	return true;
}
	function get_appointment_id($lastName){
		$sql="SELECT appointment_id FROM tbl_appointment WHERE appointment_lastname = :lastname";	
		$q = $this->conn->prepare($sql);
		$q->execute(['lastname' => $lastName]);
		$appointment_id = $q->fetchColumn();
		return $appointment_id;
	}
	function get_appointment_lastName($id){
		$sql="SELECT appointment_lastName FROM tbl_appointment WHERE appointment_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$appointment_email = $q->fetchColumn();
		return $appointment_email;
	}
	function get_appointment_purpose($id){
		$sql="SELECT appointment_purpose FROM tbl_appointment WHERE appointment_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$appointment_purpose = $q->fetchColumn();
		return $appointment_purpose;
	}
	function get_appointment_date($id){
		$sql="SELECT appointment_date FROM tbl_appointment WHERE appointment_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$appointment_date = $q->fetchColumn();
		return $appointment_date;
	}
	function get_appointment_time($id){
		$sql="SELECT appointment_time FROM tbl_appointment WHERE appointment_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$appointment_time = $q->fetchColumn();
		return $appointment_time;
	}
	function get_appointment_status($id){
		$sql="SELECT appointment_status FROM tbl_appointment WHERE appointment_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$appointment_status = $q->fetchColumn();
		if($appointment_status==1){
			$appointment_status = 'Confirmed';
			return $appointment_status;
		} else {
			$appointment_status = 'Pending';
			return $appointment_status;
		}
		
	}
	
	
	function get_session(){
		if(isset($_SESSION['login']) && $_SESSION['login'] == true){
			return true;
		}else{
			return false;
			session_destroy();
			}
	}
	
	public function check_login($email,$password){
		
		$sql = "SELECT count(*) FROM tbl_users WHERE user_email = :email AND user_password = :password"; 
		$q = $this->conn->prepare($sql);
		$q->execute(['email' => $email,'password' => $password ]);
		$number_of_rows = $q->fetchColumn();
		

	
		if($number_of_rows == 1){
			
			$_SESSION['login']=true;
			$_SESSION['user_email']=$email;
			return true;
		}else{
			return false;
		}
	}
}