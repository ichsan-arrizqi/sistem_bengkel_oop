<?php
   session_start();
   $_SESSION['status_login_tukang'] = "";
   $_SESSION['nama_tukang'] = "";
   echo "<script>alert('Telah Logout');document.location.href='../index.php'</script>";
?>