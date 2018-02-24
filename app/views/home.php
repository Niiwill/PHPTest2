<?php if (Session::isLogin()){   ?>

		<h1>Hello <?= $user->name ?></h1>

		
<?php }else{  ?>



<div style="width: 100px;height:50;background: #f5f5f5; float: left;padding: 25px;">
	<a href="login">LOGIN</a>
</div>

<div style="width: 100px;height:50;background: #f5f5f5;float: left;padding: 25px;">
	<a href="register">REGISTER</a>
</div>







<?php }  ?>



<br>
<div style="width: 200px;height:50;background: #f5f5f5;padding: 25px;margin-top: 100px">
	<form method="POST" action="/search"> 
		<label>SEARCH</label>
		
		<input type="text" name="text">
		<input type="submit" name="">
	</form>
</div>