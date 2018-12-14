<?php

class Bootstrap{
	private $controller;
	private $action;
	private $request;

	public function __construct($request){
		$this->request = $request;
		if($this->request['controller'] == ""){
			$this->controller = 'home';
		}else{
			$this->controller = $this->request['controller'];
		}
		if($this->request['action'] == ""){
			$this->action = 'index';
		}else{
			$this->action = $this->request['action'];
		}		
		echo 'Bootstrap controller = '.$this->controller.', action = '.$this->action.'<br />';
	}

	public function createcontroller(){
		//check class
		if(class_exists($this->controller)){
			$parents = class_parents($this->controller);
			//check extend
			if(in_array('Controller', $parents)){
				if(method_exists($this->controller, $this->action)){
					echo 'controller object found <br />';
					return new $this->controller($this->action, $this->request);
				}else{
					echo '<h1>Method does not exist</h1>';
					return;
				}
			}else{
				echo '<h1>Base controller not found</h1>';
				return;
			}
		}else{
			echo '<h1>Controller class does not exist</h1>';
			return;
		}
	}
}