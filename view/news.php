<?php

include "view/view.php";

class NewsView extends View{
	
	public function index(){
		$model=$this->loadModel('news');
		$this->set("data", $model->select("Task_1_News"));
		$this->render("header");
		$this->render("news");
		foreach ($this->data as $news){
			showNews($news);
		}
		$this->render("footer");
	}
	
	public function add(){
		$this->render('header');
		$this->render('addform');
		$this->render('footer');
	}
	
	public function edit($news){
		if($news["author_ID"] ==$_SESSION["user_ID"]){
			$model = $this->loadModel('news');
			$this->set('data', $model->select('`Task_1_News`',"*", "`note_id` =".$news["note_id"])[0]);
			$this->render('header');
			$this->render('editform');
			$this->render('footer');
		}
		else{
			$this->index();
		}
	}
}
?>