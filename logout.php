<?php
	
	session_start();

	session_destroy();

	//unset( $_SESSION['user_record'] );

	header('Location: ./index.php');

?>