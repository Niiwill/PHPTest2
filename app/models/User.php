<?php


class User {

	// INDEX STRANA  
	public static function index($id){

		$db=Database::getInstance();
		$result=$db->query("SELECT * FROM `users` WHERE id='".$id."' ");

		if ($result->num_rows > 0){

			return $result=$result->fetch_object();
			
		}else{
			return false;
		}
		
	}

	// LOGOVANJE USERA
	public static function loginIn($request){

		$request->password=md5($request->password);
		
		$db=Database::getInstance();
		$result=$db->query("SELECT * FROM `users` WHERE email='".$request->email."' AND password='".$request->password."' LIMIT 1 ");

   		if ($result->num_rows > 0){

			return $result=$result->fetch_object();
			
		}else{
			return false;
		}
		
		
	}

	// REGISTROVANJE USERA
	public static function register($request){

		$request->password=md5($request->password);

		$db=Database::getInstance();
		$db->query("INSERT INTO `users`(`name`, `email`, `password`) VALUES ('".$request->name."', '".$request->email."','".$request->password."')");

		if (mysqli_connect_errno()){
			return false;
		}else{
			return $db->insert_id;
		}

	}


	// TRAZENJE KORISNIKA
	public static function search($search_text){

		$db=Database::getInstance();
		$result=$db->query("SELECT * FROM `users` WHERE name LIKE '%".$search_text."%' OR email LIKE '%".$search_text."%' ");

		if ($result->num_rows > 0){
			while ($row = mysqli_fetch_assoc($result)) {
		   		$users[]=$row;
			}	
		}else{
			return false;
		}

		return $users;

	}
}



?>