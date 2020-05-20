<?php
	session_start();
	include($_SERVER["DOCUMENT_ROOT"] . "/includes/connection.php"); 
	if(isset($_SESSION["session_username"])){
		echo "<script>alert('You are already registered');
		 document.location.href = 'http://glossary-master/administrator/'
		</script>";

	}

	if(isset($_POST["login"])){

		if(!empty($_POST['username']) && !empty($_POST['password'])) {
			$username=htmlspecialchars($_POST['username']);
			$password=htmlspecialchars($_POST['password']);
			$password=MD5($password);
			$query =$mysqli->query("SELECT * FROM usertbl WHERE username='".$username."' AND password='".$password."'");
			$numrows=mysqli_num_rows($query);
			if($numrows!=0){
				while($row=mysqli_fetch_assoc($query)){ //Перебираем логин\пароль 
				  $dbusername=$row['username'];
				  $dbpassword=$row['password'];
				}
				if($username == $dbusername && $password == $dbpassword){ //сравниваем логин\пароль
					   $_SESSION['session_username']=$username;	 
					 // если залогинен - идём сюда  
					   header("Location: ../administrator/");
				}
			} else { //Если не залогинен - ошибки
				echo  "Invalid username or password!";
			 }
		} else {
	  $message = "All fields are required!";
		}
	}
	?>
	
<?php include($_SERVER["DOCUMENT_ROOT"] ."/includes/header.php"); ?>
<div class="container mlogin">
<div id="login">
<h1>SignIn</h1>

<form action="" id="loginform" method="post"name="loginform">
	<p><label for="user_login">Username<br>

	<input class="input" id="username" name="username"size="20" type="text" value=""></label></p>
	<p><label for="user_pass">Password<br>

 	<input class="input" id="password" name="password"size="20" type="password" value=""></label></p> 

	<p class="submit"><input class="button" name="login" type= "submit" value="Log In"></p>
	<p><a href= "../registration">SignUp</a></p>
</form>

 </div>
  </div>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"); ?>
