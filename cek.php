<?php 

require 'library/controller.php';
session_start();

$user = $_POST['username'];
$pass = $_POST['password'];

$login = new controller('localhost','root','','bengkel');
switch ($_POST['multi']) {
	case 'admin':
	if($login->login('admin',$user,$pass) > 0){
		$_SESSION['status_login_admin'] = "login";
		echo '<script>alert("Selamat Datang Admin");document.location.href="admin"</script>';
	}else{
		echo '<script>alert("Username dan Password salah");document.location.href="index.php"</script>';
	}
	break;
	case 'pelanggan':
	if ($login->login('pelanggan',$user,$pass) > 0) {
		$namaUser = $login->where('pelanggan','username',$user,'');
		$num = mysqli_fetch_array($namaUser);
		$_SESSION['nama'] = $num['nama'];
		$_SESSION['status_login_pelanggan'] = 'login';
		echo "<script>alert('Selamat Datang');document.location.href='pelanggan/product.php'</script>";
	}else{
		echo "<script>alert('Cek Kembali Username dan Password');document.location.href='index.php'</script>";
	}
	break;
	case 'tukang':
	if($login->login('tukang',$user,$pass) > 0){
		$namaUser = $login->where('tukang','username',$user,'');
		$num = mysqli_fetch_array($namaUser);	
		$_SESSION['nama_tukang'] = $num['nama'];
		$_SESSION['status_login_tukang'] = "login";
		echo "<script>alert('Selamat Bekerja');document.location.href='tukang'</script>";
	}else{
		echo "<script>alert('Cek Kembali Username dan Password');document.location.href='index.php'</script>";
	}
	break;
	default:
		# code...
	break;
}

?>