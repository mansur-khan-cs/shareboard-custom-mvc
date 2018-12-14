<?php
class Users extends Controller{
	protected function register(){
		echo 'controllers/users.php/register() <br />';
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->register(), true);
	}
	protected function login(){
		echo 'controllers/users.php/login() <br />';
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->login(), true);
	}	

	public function logout(){
		echo 'controllers/users.php/logout() <br />';
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_data']);
		session_destroy();
		//Redirect
		header('Location: '.ROOT_URL);
	}	
}
?>