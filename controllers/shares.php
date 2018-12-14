<?php
class shares extends Controller{
	protected function Index(){
		echo 'Controllers/shares.php/Index() <br />';
		$viewmodel = new ShareModel();
		$this->returnView($viewmodel->Index(), true);
	}
	protected function add(){
		echo 'Controllers/shares.php/add() <br />';
		if(!isset($_SESSION['is_logged_in'])){
			header('Location: '.ROOT_URL.'shares');
		}
		$viewmodel = new ShareModel();
		$this->returnView($viewmodel->add(), true);
	}	
}
?> 