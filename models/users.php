<?php
class UserModel extends Model{
	public function register(){
		echo 'models/users.php/register() <br />';
		//Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if($post['submit']){
			if($post['name'] == '' || $post['email'] == '' || $post['password'] == ''){
				Messages::setMsg('Plz fill in all fields', 'error');
				return;
			}
			// Insert into MySQL
			$password = md5($post['password']);
			$this->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
			$this->bind(':name', $post['name']);
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			$this->execute();
			//verify
			if($this->lastInsertId()){
				//Redirect
				header('Location: '.ROOT_URL.'users/login');
			}
		}
	}
	public function login(){
		echo 'models/users.php/login() <br />';
		//Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if($post['submit']){				
 		    $password = md5($post['password']);
			$this->query('SELECT * from users where email = :email and password = :password');
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			$row = $this->single();
			//verify
			if($row){
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user_data'] = array(
					"id"    =>  $row['id'],
					"name"  =>  $row['name'],
					"email" =>  $row['email']
				);
				header('Location: '.ROOT_URL.'shares');
			}else{
				Messages::setMsg('Incorrect log in', 'error');
			}
		}
	}
}
?>