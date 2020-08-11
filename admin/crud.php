<?php

require '../library/controller.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD | PRODUCT</title>
	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
</head>

<body>
	<div class="container">
		<?php if (isset($_GET['lihat'])) { ?>
			<?php 
			$lihat = new controller("localhost","root","","bengkel");
			$resultLihat = $lihat->where("product","id",$_GET['lihat'],"");
			foreach ($resultLihat as $key) {
				?>
				<div class="card">
					<div class="card-header bg-dark text-light">
						<center><img style="border-radius: 50%;" src="../asd.png"><br><h1><strong><?php echo $key['nama'] ?> | PRODUCT</strong></h1></center>
					</div>
					<div class="card-body">
						<center><img src="../picture/<?php echo $key['foto']; ?>" width="500" height="300"></center>
					</div>
					<div class="card-footer">
						<label for="nama">Nama : </label>
						<h1 id="nama"><?php echo $key['nama'] ?></h1>
						<label for="harga">Harga : </label>
						<h1 id="harga"><?php echo $key['harga'] ?></h1>
						<label for="stok">Stok Barang : </label>
						<h1 id="stok"><?php echo $key['stok'] ?></h1>
					</div>
				</div>
				<?php
			}
			?>
		<?php } ?>
		<?php if (isset($_GET['edit'])) { ?>
			<?php 
			$edit = new controller("localhost","root","","bengkel");
			$result = $edit->where("product","id",$_GET['edit'],"");
			foreach ($result as $key) {
				?>
				<div class="card">
					<div class="card-header bg-dark text-light">
						<center><img style="border-radius: 50%;" src="../asd.png"><br><h1><strong>EDIT | PRODUCT</strong></h1></center>
						<center><img src="../picture/<?php echo $key['foto'] ?>" width="500" height="300"></center>
					</div>
					<div class="card-body">
						<form method="post" action="data.php?update" enctype="multipart/form-data">
							<div class="form">
								<div class="form-group">
									<label for="id">id</label>
									<input type="text" id="id" readonly value="<?php echo $key['id']; ?>" name="id" class="form-control">
								</div>
								<div class="form-group">
									<label for="nama">nama</label>
									<input type="text" required="" id="nama" value="<?php echo $key['nama'] ?>" name="nama" class="form-control">
								</div>
								<div class="form-group">
									<label for="harga">harga</label>
									<input type="number" required="" id="harga" value="<?php echo $key['harga'] ?>" name="harga" class="form-control">
								</div>
								<div class="form-group">
									<label for="stok">stock</label>
									<input type="number" required="" id="stok" value="<?php echo $key['stok'] ?>" name="stok" class="form-control">
								</div>
								<div class="form-group">
									<label for="jenis">jenis</label>
									<select name="jenis" required="" class="form-control">
										<option value="">-- pilihan --</option>
										<option value="mobil">mobil</option>
										<option value="motor">motor</option>
										<option value="truck">truck</option>
									</select>
								</div>
								<div class="form-group">
									<label for="foto">foto</label>
									<input type="file" id="foto" name="foto" class="form-control">
								</div>
							</div>
						<?php } ?>
						<div class="card-footer">
							<center><input type="submit" class="btn btn-success" value="UPDATE" name=""></center>
						</div>
					</form>
				</div>
			</div>
		<?php } ?>

		<?php if (isset($_GET['hapus'])) { ?>
			<?php 
			$hapus = new controller("localhost","root","","bengkel");
			$hapus->delete("product","id",$_GET['hapus'],"product.php","Product Berhasil Dihapus","Product Gagal Dihapus");
			?>
		<?php } ?>
		<?php if (isset($_GET['tambah'])) { ?>
			<div class="card">
				<div class="card-header text-light bg-dark">
					<center><img style="border-radius: 50%;" src="../asd.png"><br><h1><strong>TAMBAH | PRODUCT</strong></h1></center>
				</div>
				<div class="card-body">
					<form method="post" action="data.php?tambah" enctype="multipart/form-data">
						<div class="form">
							<div class="form-group">
								<label for="id">id</label>
								<input type="text" id="id" required="" name="id" class="form-control">
							</div>
							<div class="form-group">
								<label for="nama">nama</label>
								<input type="text" id="nama" required="" name="nama" class="form-control">
							</div>
							<div class="form-group">
								<label for="harga">harga</label>
								<input type="number" id="harga" required="" name="harga" class="form-control">
							</div>
							<div class="form-group">
								<label for="stok">stock</label>
								<input type="number" id="stok" required="" name="stok" class="form-control">
							</div>
							<div class="form-group">
								<label for="jenis">jenis</label>
								<select name="jenis" class="form-control" required="">
									<option value="mobil">mobil</option>
									<option value="motor">motor</option>
									<option value="truck">truck</option>
								</select>
							</div>
							<div class="form-group">
								<label for="foto">foto</label>
								<b class="text-danger">*<?php echo @$_GET['tambah']; ?></b>
								<input type="file" required="" id="foto" name="foto" class="form-control">
							</div>
						</div>
					</div>
					<div class="card-footer">
						<center><input type="submit" class="btn btn-success" value="TAMBAH" name="">
						</center>
					</div>
				</form>
			</div>
		<?php } ?>
		<?php if (isset($_GET['transaksi'])) { ?>
			<?php if(isset($_POST['total'])){ ?>
				<div class="card">
					<div class="card-header">
					</div>
					<div class="card-body">
						<form method="post" action="data.php?bayar=<?php echo $_GET['transaksi'] ?>">
							<input type="hidden" name="nama_barang" value="<?php echo $_POST['nama_barang'] ?>">
							<input type="hidden" name="harga" value="<?php echo $_POST['harga'] ?>">
							<input type="hidden" name="jumlah" value="<?php echo $_POST['jumlah'] ?>">
							<label for="total">Total</label>
							<input type="text" id="total" class="form-control col-md-5" name="total" value="<?php echo $_POST['total']?>" readonly>
							<label for="uang">Uang</label>
							<input type="number" id="uang" class="form-control col-md-5" name="uang">
							<label for="kembali">Kembali</label>
							<input type="text" id="kembali" class="form-control col-md-5" readonly="" name="kembali">
							<p id="alert"></p>

						</div>
						<div class="card-footer">
							<input type="submit" id="submit" class="btn btn-primary" value="Bayar" name="">
						</form>
					</div>
				</div>
				<script type="text/javascript">

					let kembali = document.getElementById('kembali')
					let total = document.getElementById('total')
					let alert = document.getElementById('alert')
					document.getElementById('uang').addEventListener('input',function(){
						kembali.value = Number(this.value) - Number(total.value)
						if (kembali.value <= 0) {
							alert.style.color = "red"
							alert.innerHTML = "Kurang"
						}else{
							alert.innerHTML = ""
						}
					});
				</script>
				<?php 
				 ?>
			<?php }?>
		<?php } ?>
	</div>
</body>
</html>