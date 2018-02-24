<?php


class Router{
	

	public function parseUrl($url_param){

		if(Session::isLogin()){
			
			switch ($url_param) {
				case '':
					
					$this->getController('AuthenticationController','home');
					break;
				
				case 'result':

					$this->getController('AuthenticationController','result');

					break;

				case 'search':
					
					$this->getController('AuthenticationController','search');

					break;
			}

		}else{

			switch ($url_param) {
				case '':
					
					$this->getController('AuthenticationController','home');
					break;
				
				case 'login':

					$this->getController('AuthenticationController','login');

					break;

				case 'register':

					$this->getController('AuthenticationController','register');

					break;


					case 'login/check':

					$this->getController('AuthenticationController','checkLogin');

					break;

					case 'register/store':

					$this->getController('AuthenticationController','registerStore');

					break;

				default:
					
					break;
			}
		}

		
	}

	public function getController($controller,$action)
	{
		$filename=__DIR__.'/controllers/'.$controller.'.php';

		if(file_exists($filename)){
			require_once $filename;

			$controllerInstance=new $controller;
		
			if(method_exists($controllerInstance, $action)){
				
				if( isset($_POST) )
				{
					 $request = (object) $_POST;
				     $controllerInstance->$action($request);

				}else{

					$controllerInstance->$action();
				}
			}
		}
	}





	



}

?>