<?php
class home extends Controller{
	protected function Index(){
		echo 'Controller home index <br />';
		$viewmodel = new HomeModel();
		$this->returnView($viewmodel->Index(), true);
	}
}
?>