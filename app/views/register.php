
<?php

if(isset($errormessage)){
	echo $errormessage;
}

?>
<h1>REGISTER FORM</h1>
<br>
<form method="POST" action="register/store">
<label>Email:</label>
<input type="email" name="email">
<br>	
<label>Name:</label>
<input type="text" name="name">
<br>
<label>Password:</label>
<input type="Password" name="password">
<br>
<label>Repeat Password</label>
<input type="password" name="repeat_password">
<br>
<input type="submit" name="">
</form>