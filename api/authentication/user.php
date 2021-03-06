<?php
include('password.php');
class User extends Password{

    private $_db;

    function __construct($db){
    	parent::__construct();

    	$this->_db = $db;
    }

    private function log_change(){
    	
		$ip_address = $_SERVER['REMOTE_ADDR'];
        $stmt = $this->_db->prepare('INSERT INTO logs (updated_by,action,data,table_name) values (:updated_by,"Login to xCRUD LTE Theme",:ip_address,"user")');
		$stmt->execute(array('updated_by' => $_SESSION['user_id'],'ip_address' => $ip_address));	
    }
	
	private function get_user_hash($username){

		try {
			$stmt = $this->_db->prepare('SELECT email ,firstname,lastname,password, username, user_id FROM user WHERE username = :username AND active="Yes" ');
			$stmt->execute(array('username' => $username));
			return $stmt->fetch();

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	
	public function get_roles($username){

		try {
			$stmt = $this->_db->prepare('SELECT email ,firstname,lastname,password, username, u.user_id,roles_name,r.sys_roles_id FROM user u 
			JOIN sys_user_roles su on su.user_id = u.user_id
			JOIN sys_roles r on r.sys_roles_id = su.sys_roles_id
			WHERE username = :username');
			$stmt->execute(array('username' => $username));
			$rows_level1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $rows_level1;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function isValidUsername($username){
		if (strlen($username) < 3){
			echo strlen($username);
			return false;
		}
		if (strlen($username) > 17){
			echo strlen($username);
			return false;
		}
		if (!ctype_alnum($username)) return false;
		return true;
	}

	public function login($username,$password){
		//if (!$this->isValidUsername($username)){
			//echo ">>>>>";
			//return false;
		//}
		if (strlen($password) < 3) return false;

		$row = $this->get_user_hash($username);
        if(!$row){
        	return false;
        }
		if($this->password_verify($password,$row['password']) == 1){

		    $_SESSION['loggedin'] = true;
		    $_SESSION['username'] = $row['username'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['firstname'] = $row['firstname'];
			$_SESSION['lastname'] = $row['lastname'];
		    $_SESSION['user_id'] = $row['user_id'];
			
			$this->log_change();		
			$arrResult = array(true,);
			
		    return true;
		}
	}

	public function logout(){
		session_destroy();
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}

}


?>
