<?php
session_start();
if($_SESSION['status_login_admin'] == "login"){
  require '../library/controller.php';
  $penghasilan = new controller("localhost","root","","bengkel");
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bengkel|Pelanggan</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
  </head>
  <body>
    <script src="../asset/js/jquery.js"></script> 
    <script src="../asset/js/popper.js"></script> 
    <script src="../asset/js/bootstrap.js"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="logout.php">Bengkel</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a class="nav-link" href="user.php">User</a></li>
          <li class="nav-item"><a class="nav-link" href="product.php">Product</a></li>
          <li class="nav-item"><a class="nav-link" href="pesanan.php">Pesanan</a></li>
          <li class="nav-item"><a class="nav-link" href="penghasilan.php">Penghasilan</a></li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="get" action="product.php?cari">
          <input require class="form-control mr-sm-2" name="cari" type="search" placeholder="Cari Produk Disini" aria-label="Cari">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button>
        </form>

      </div>
    </nav>
    <div class="container">
      <div>
        <div class="card-header">
          <h1><strong><i>DAFTAR PENGHASILAN</i></strong></h1>
          <input type="button" class="btn btn-danger" value="HAPUS SEMUA RIWAYAT PENGHASILAN" name="" onclick="return riwayat()">

        </div>
        <script type="text/javascript">
          function riwayat()
            {
              var password = prompt("MASUKAN PASSWORD UNTUK MENGHAPUS RIWAYAT");
              if (password == "ichsanarrizqi") {
                document.location.href="data.php?riwayat";
              }else{
                alert("KATA SANDI SALAH!");
              }
            }
        </script>
        <div class="card-body">
          <table class="table">
            <tr class="thead-dark">
              <th>nama barang</th>
              <th>harga</th>
              <th>jumlah</th>
              <th>total</th>
            </tr>
            <?php 
              $result = $penghasilan->select("penghasilan");
              foreach ($result as $key) {
             ?>
            <tr>
              <td><?php echo $key['nama_barang'] ?></td>
              <td><?php echo $key['harga'] ?></td>
              <td><?php echo $key['jumlah'] ?></td>
              <td><?php echo $key['total'] ?></td>
            </tr>
            <?php 
              }
             ?>
          </table>
        </div>
        <div class="card-footer">
          <?php 
            $total = mysqli_query(mysqli_connect("localhost","root","","bengkel"),"SELECT SUM(total) as total FROM penghasilan");
            $jumlah = mysqli_query(mysqli_connect("localhost","root","","bengkel"),"SELECT SUM(jumlah) as jumlah FROM penghasilan");
            $fetchJumlah = mysqli_fetch_array($jumlah);
            $fetchTotal = mysqli_fetch_array($total);
           ?>
          <label for="jumlah">Jumlah Barang Yang Terjual : </label>
          <h1 id="jumlah"><?php echo $fetchJumlah['jumlah'] ?></h1>
          <label for="total">Total Semua : </label>
          <h1 id="total"><?php echo $fetchTotal['total'] ?></h1>
        </div>
      </div>
    </div>
</body>
</html>
<?php
}else{
  echo "<script>alert('anda harus login');document.location.href='../'</script>";
}
?>