<?php 
	session_start();
	$_SESSION['status_login_pelanggan'] = "";
	echo "<script>alert('anda telah logout');document.location.href='../'</script>";
	
 ?>