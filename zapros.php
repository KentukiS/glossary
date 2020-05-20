<?php 
  	$db_host = "localhost"; 
    $db_user = "root"; // Логин БД
    $db_password = ""; // Пароль БД
    $db_base = 'gloss'; // Имя БД
	

	 $mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);

    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }

		  
?>
