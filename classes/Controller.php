<?php
abstract class Controller{
	protected $request;
	protected $action;

	public function __construct($action, $request){
		echo 'classes/Controller.php/constructior: action = '.$action.'<br />';
		$this->action = $action;
		$this->request = $request;
	}

	public function executeAction(){
		echo 'classes/Controller.php/executeAction<br />';
		return $this->{$this->action}();
	}

	protected function returnView($viewmodel, $fullview){
		$view = 'views/'.get_class($this).'/'.$this->action.'.php';
		echo 'classes/Controller.php/returnView: view = '.$view.' <br />';
		if($fullview){
			echo 'classes/Controller.php/returnView: views/main.php <br />';
			require('views/main.php');
		}else{
			echo 'classes/Controller.php/returnView: require($view) <br />';
			require($view);
		}
	}
}
?>