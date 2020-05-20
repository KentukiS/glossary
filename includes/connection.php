<?php
	include($_SERVER["DOCUMENT_ROOT"] . "/config.php");

	 $mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);

    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }
?>