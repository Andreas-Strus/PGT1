<?php

include "controler/controler.php";

class MainControler extends Controler{
	
	public function add(){
		$view = $this->loadView('news');
		$view-> add();
	}
	
	public function insert(){
		$model = $this->loadModel('news');
		if(isset($_POST["`name`"])){ $_POST["`name`"] = "'".$_POST["`name`"]."'";}
		if(isset($_POST["`description`"])){ $_POST["`description`"] = "'".$_POST["`description`"]."'";}
		$model->insert("Task_1_News",array_keys($_POST),array_values($_POST));
		$this->redirect('?task=news&action=index');
	}
	
	public function update(){
		$model = $this->loadModel('news');
		$model->update($_POST);
		$this->redirect('?task=news&action=index');
	}
	
	public function edit(){
		$view = $this->loadView('news');
		$view->edit($_POST);
	}
	
	public function delete(){
		$model = $this->loadModel('news');
		$model->delete($_POST['note_id']);
		$this->redirect('?task=news&action=index');
	}
	
	public function index(){
		$view = $this->loadView('news');
		$view->index();
	}
}
?>