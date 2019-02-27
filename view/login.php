<?PHP

include "view/view.php";

class LoginView extends View{
	public function login(){
		$this->render('header');
		$this->render('loginform');
		$this->render('footer');
	}
	
	public function register(){
		$this->render('header');
		$this->render('registerform');
		$this->render('footer');
	}
	
	public function index(){
		$this->render('header');
		$this->render('footer');
	}
}
?>