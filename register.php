<!DOCTYPE html>
<html>
<head>
	<title>selamat datang</title>
	<link rel="stylesheet" href="asset/css/bootstrap.css">
</head>
<script src="asset/js/jquery.js"></script>
<script src="asset/js/popper.js"></script>
<?php 
if (isset($_GET['menu'])) {
		$user = $_POST['username'];
		$password = md5($_POST['password']);
		$nama = $_POST['nama'];
		$gmail = $_POST['gmail'];
		$con = mysqli_connect("localhost","root","","bengkel");
		$sql = mysqli_query($con,"INSERT INTO pelanggan VALUES(DEFAULT,'$user','$password','$nama','$gmail')");
		echo "<script>alert('Selamat Anda Sudah Terdaftar');document.location.href='index.php'</script>";
}
?>
<body>
	<div class="container">
		<div id="card" class="card sm">
			<div class="card-header">
				<center>
					<h1 class="text-primary">Registry</h1>
				</center>
			</div>
			<div class="card-body">
				<img src="asd.png">
				<form action="?menu=" method="post">
					<label for="username">Username</label>
					<input type="text" name="username" placeholder="Username" required class="form-control" id="username"> <br>
					<label for="username">Password</label>
					<input type="password" name="password" required="" placeholder="Password" class="form-control" id=""> <br>
					<label for="username">Name</label>
					<input type="text" name="nama" placeholder="Name" required="" class="form-control" id=""> <br>
					<label for="username">Gmail</label>
					<input type="text" name="gmail" placeholder="Gmail" required="" class="form-control" id="gmail">
				</div>
				<div class="card-footer">
					<center>
						<input type="submit" value="Sign Up" class="btn btn-primary">
					</center>
				</div>
			</div>
		</div>
	</form>
</body>
</html>