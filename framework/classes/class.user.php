<?php
class User{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_wbapp';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_user($email,$password,$lastname,$firstname,$nickname,$gender,$address, $access){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$data = [
			[$lastname,$firstname,$email,$nickname,$gender,$address,$password, $access],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_users (user_lastname, user_firstname, user_email, user_nickname, user_gender, user_address, user_password, user_access) VALUES (?,?,?,?,?,?,?,?)");
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

	public function update_user($lastname,$firstname, $access, $id, $email, $address, $gender){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_users SET user_lastname=:user_lastname, user_firstname=:user_firstname, user_access=:user_access, user_email=:user_email, user_nickname=:user_nickname, user_address=:user_address, user_gender=:user_gender WHERE user_id=:user_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':user_lastname'=>$lastname,':user_firstname'=>$firstname,':user_access'=>$access,':user_email'=>$email, ':user_nickname'=>$nickname,  ':user_address'=>$address, ':user_gender'=>$gender,':user_id'=>$id));
		return true;
	}

	public function list_users(){
		$sql="SELECT * FROM tbl_users";
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
public function profile_users($id){
    $sql = "SELECT * FROM tbl_users WHERE `user_id` = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([':id' => $id]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(empty($data)){
        return false;
    }else{
        return $data;	
    }
}
public function delete_user($user_id){
	$sql = "DELETE FROM tbl_users WHERE user_id = :user_id";
	$q = $this->conn->prepare($sql);
	$q->execute(array(':user_id'=>$user_id));
	return true;
}

function get_user_by_name($firstname, $lastname) {

    // Query the database to check for a user with the same first name and last name
    $query = "SELECT * FROM tbl_users WHERE user_firstname = ? AND user_lastname = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$firstname, $lastname]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the result if a duplicate user is found, otherwise return false
    if (count($result) > 0) {
        return $result;
    } else {
        return false;
    }
}

	function get_user_id($email){
		$sql="SELECT user_id FROM tbl_users WHERE user_email = :email";	
		$q = $this->conn->prepare($sql);
		$q->execute(['email' => $email]);
		$user_id = $q->fetchColumn();
		return $user_id;
	}
	function get_user_email($id){
		$sql="SELECT user_email FROM tbl_users WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_email = $q->fetchColumn();
		return $user_email;
	}
	function get_user_firstname($id){
		$sql="SELECT user_firstname FROM tbl_users WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_firstname = $q->fetchColumn();
		return $user_firstname;
	}
	function get_user_lastname($id){
		$sql="SELECT user_lastname FROM tbl_users WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_lastname = $q->fetchColumn();
		return $user_lastname;
	}
	function get_user_nickname($id){
		$sql="SELECT user_nickname FROM tbl_users WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_nickname = $q->fetchColumn();
		return $user_nickname;
	}
	function get_user_access($id){
		$sql="SELECT user_access FROM tbl_users WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_access = $q->fetchColumn();
		return $user_access;
	}
	function get_user_gender($id){
		$sql="SELECT user_gender FROM tbl_users WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_gender = $q->fetchColumn();
		return $user_gender;
	}
	function get_user_address($id){
		$sql="SELECT user_address FROM tbl_users WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_address = $q->fetchColumn();
		return $user_address;
	}
	
	function get_session(){
		if(isset($_SESSION['login']) && $_SESSION['login'] == true){
			return true;
		}else{
			return false;
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