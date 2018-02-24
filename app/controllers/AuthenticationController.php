<?php

require_once(__DIR__.'/../validation/validation.php');
require_once(__DIR__."/../models/User.php");

class AuthenticationController {

	// HOME PAGE 
	public function home(){

		if(isset($_SESSION['user_id'])){
			$user_id=$_SESSION['user_id'];
 			$user=User::index($user_id);
		}
		require_once(__DIR__.'/../views/home.php');
	}

	// RESULT PAGE 
	public function search($search_text){
		
		if(empty($search_text->text)){
			header("Location: /");
		}else{
			$text=$search_text->text;
		}
	
		
		if($result=User::search($text)){
			$users = (object) $result;
			require_once(__DIR__.'/../views/results.php');
		}else{
			require_once(__DIR__.'/../views/resultsError.php');
		}
	}

	// LOGIN PAGE
	public function login(){
		require_once(__DIR__.'/../views/login.php');
	}

	// REGISTER PAGE
	public function register(){
		require_once(__DIR__.'/../views/register.php');
	}

	// CHECK USER PAGE
	public function checkLogin($request){
		// Validate::check('proveraa');
		
		if($user=User::loginIn($request)){
			Session::add($user->id);
	 		header("Location: /");
		}else{
			require_once(__DIR__.'/../views/loginError.php');
		}
	}

	// STRORE NEW USER
	public function registerStore($request){

		if($request->password == $request->repeat_password){
			
			if($userId=User::register($request)){
				Session::add($userId);
		 		header("Location: /");
			}else{
				require_once(__DIR__.'/../views/RegisterError.php');
			}
		}else{
			$errormessage="password pogresan";
			require_once(__DIR__.'/../views/register.php');
		}
	}
}

?>