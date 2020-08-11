<?php 
	session_start();
	$_SESSION['status_login_admin'] = "";
	echo "<script>alert('LOGOUT');document.location.href='../'</script>";
 ?>