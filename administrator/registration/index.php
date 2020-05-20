<?php include($_SERVER["DOCUMENT_ROOT"] ."/includes/header.php"); ?>
<?php include($_SERVER["DOCUMENT_ROOT"] ."/administrator/registration/register.php"); ?>

<div class="container mregister">
<div id="login">
 <h1>SignUp</h1>
	<form action="register.php" id="registerform" method="post" name="registerform">
	    <p><label for="user_login">FullName<br>
		<input class="input" id="full_name" name="full_name" size="32"  type="text" value=""></label></p>

		<p><label for="user_pass">E-mail<br>
		<input class="input" id="email" name="email" size="32"type="email" value=""></label></p>

		<p><label for="user_pass">Username<br>
		<input class="input" id="username" name="username" size="20" type="text" value=""></label></p>

		<p><label for="user_pass">Password<br>
		<input class="input" id="password" name="password" size="32"   type="password" value=""></label></p>

		<p class="submit"><input class="button" id="register" name= "register" type="submit" value="Confirm"></p>
	    <p class="regtext">Are you registered? <a href= "../login">SignIn!</a>!</p>
	 </form>
</div>
</div>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"); ?>