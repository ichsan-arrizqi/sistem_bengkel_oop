<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<link rel="stylesheet" href="asset/css/bootstrap.css">
	<script src="asset/js/jquery.js"></script>
	<script src="asset/js/popper.js"></script>
	<div class="container">
		<div id="card" class="card">
			<div class="card-header">
				<center>
					<h1 class="text-primary">Login</h1>
				</center>
			</div>
			<div class="card-body">
				<div class="col-12 d-flex justify-content-center">
					<img src="asd.png">
				</div>
				<form action="cek.php" method="post">
					<label for="username">Username</label>
					<input type="text" name="username" placeholder="Username" required class="form-control" id="username"> <br>
					<label for="password">Password</label>
					<input type="password" name="password" required placeholder="Password" class="form-control" id="password"> <br>
					<label for="multi">Multi User</label>
					<select name="multi" id="multi" class="form-control" required>
						<option value="">-- MultiUser --</option>
						<option value="admin">Admin</option>
						<option value="pelanggan">Pelanggan</option>
						<option value="tukang">Tukang</option>
					</select> <br>
					
				</div>
				<div class="card-footer">
						<div class="row">
								<div class="col-12 d-flex justify-content-center">
									<input type="submit" value="Sign In" class="btn btn-primary">
									<a href="register.php"><input type="button" style="margin-left : 3px" class="btn btn-primary" value="Sign Up"></a>
								</div>
						</div>
				</div>
			</div>
		</div>

	</form>
</body>
</html>