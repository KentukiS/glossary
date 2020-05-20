<?php 
include($_SERVER["DOCUMENT_ROOT"] . "/includes/connection.php"); 
if(isset($_POST["register"])){
	
	if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) { // проверка на пустоту полей
		$full_name= htmlspecialchars($_POST['full_name']);
		$email=htmlspecialchars($_POST['email']);
		$username=htmlspecialchars($_POST['username']);
		$password=htmlspecialchars($_POST['password']);
		$password=MD5($password);
		$query= $mysqli->query("SELECT * FROM usertbl WHERE username='".$username."'");
		$numrows=mysqli_num_rows($query);
		if($numrows==0){
			$sql="INSERT INTO usertbl (full_name, email, username,password) VALUES('$full_name','$email', '$username', '$password')"; 
			$result=$mysqli->query($sql);
		 	if($result){
				$message = "Account Successfully Created";
				echo "<script> setTimeout(function(){
              location='http://glossary-master/administrator/login';
            }, 3000); </script>";
			} else {
		 		$message = "Failed to insert data information!";
		  	}
		} else {
			$message = "That username already exists! Please try another one!";
	   	}
	} else {
	$message = "All fields are required!";
		   }
	}
?>

<?php if (!empty($message)) {echo "<p class=\"error\">" . $message . "</p>";} ?>
