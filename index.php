<?PHP
session_start();
if(isset($_GET["task"])){
	if($_GET["task"] == "news"){
		require("controler/task1.php");
		$controler = new MainControler();
		if(isset($_GET["action"])){
			$controler->{$_GET["action"]}();
		}
	}else if($_GET["task"] == "login"){
		require("controler/login.php");
		$controler = new LoginControler();
		if(isset($_GET["action"])){
			$controler->{$_GET["action"]}();
		}
	}else{
		require("controler/login.php");
		$controler = new LoginControler();
		$controler->index();
	}
}
else{
	require("controler/login.php");
	$controler = new LoginControler();
	$controler->index();
}
?>
	