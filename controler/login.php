<?php

include "controler/controler.php";

class LoginControler extends Controler{
	public function login(){
		$view = $this->loadView('login');
		$view->login();
	}
	
	public function register(){
		$view = $this->loadView('login');
		$view->register();
	}
	
	public function logout(){
		$model = $this->loadModel('login');
		$model->logout();
	}
	
	public function register2(){
		$model = $this->loadModel('login');
		$model->register($_POST);
	}
	
	public function login2(){
		$model = $this->loadModel('login');
		$model->login($_POST);
	}
	public function index(){
		$view = $this->loadView('login');
		$view->login($_POST);
	}
		
}
?>