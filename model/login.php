<?PHP

include "model\model.php";

Class LoginModel extends Model{
	
	Public function login($data){
		$login = $this->conn->real_escape_string($data["login"]);
		$password = $this->conn->real_escape_string($data["password"]);
		$user_data = $this->select("`task_1_panda_group`", "`password`, `user_ID`", "`email` = '".$login."'")[0];
		print_r($user_data);
		if(password_verify($data["password"],$user_data["password"])){
			$_SESSION["user_ID"] = $user_data["user_ID"];
			$_SESSION["user"] = $data["login"];
			header("location: index.php?task=news&action=index");
		}
		else{
			header( "location: index.php?error=1");
		}
	}
	
	Public function register($data){
		$email="'".$data["email"]."'";
		$firstName = "'".$data["firstName"]."'";
		$lastName = "'".($data["lastName"])."'";
		$gender = "'".($data["gender"])."'";
		$hash_options=[
			'cost' => 12,
			];
		$password ="'".password_hash($data["password"],PASSWORD_BCRYPT, $hash_options)."'";
		if(count($this->select("`task_1_panda_group`", "`email`", "`email` = ".$email))>0){
			header('location: index.php?error=2');
		}
		else{
			try{
				$this->insert("`task_1_panda_group`", array("`email`", "`first_name`", "`last_name`", "`password`", "`gender`", "`created_at`", "`updeated_at`", "`is_active`"),
					array($email, $firstName, $lastName,$password, $gender, "NOW()", "NOW()", 0));
				header("location: /index.php?sucess=2");
			}
			catch(DBException $e) {
            echo 'The connect can not create: ' . $e->getMessage();
			}
		}
	}
	
	Public function logout(){
		session_destroy();
		header("location: index.php");
	}
}
?>