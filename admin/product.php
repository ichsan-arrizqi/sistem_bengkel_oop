<?php
session_start();
if($_SESSION['status_login_admin'] == "login"){
  require '../library/controller.php';
  $product = new controller("localhost","root","","bengkel");
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
          <h1><strong><i>DAFTAR PRODUCT</i></strong></h1>
        </div>
        <div class="card-body">
          <a href="crud.php?tambah"><input type="button" name="tambah" value="TAMBAH" class="btn btn-primary"></a>
          <input type="button" onclick="return gambar()" value="HAPUS SEMUA DIRECTORY GAMBAR" class="btn btn-danger" name="">
          <script type="text/javascript">

            function gambar()
            {
              var password = prompt("MASUKAN PASSWORD UNTUK MENGHAPUS SEMUA FILES");
              if (password == "ichsanarrizqi") {
                alert("KATA SANDI BENAR!");document.location.href="data.php?gambar";
              }else{
                alert("KATA SANDI SALAH!");
              }
            }
          </script>
          <table class="table">
            <tr class="thead-dark">
              <th>id</th>
              <th>nama</th>
              <th>harga</th>
              <th>stok</th>
              <th>jenis</th>
              <th colspan="3">opsi</th>
            </tr>
            <?php 
            if (isset($_GET['cari'])) {
              $cari = new controller("localhost","root","","bengkel");
              $result = $cari->cari("product","nama",$_GET['cari']);
            }else{
              $result = $product->select("product");
            }
            ?>
            <?php
            foreach ($result as $key) {
              ?>
              <tr class="bg-light">
                <td><?php echo $key['id'] ?></td>
                <td><?php echo $key['nama'] ?></td>
                <td><?php echo $key['harga'] ?></td>
                <td><?php echo $key['stok'] ?></td>
                <td><?php echo $key['jenis'] ?></td>
                <td><a href="crud.php?lihat=<?php echo $key['id'] ?>"><input type="button" name="lihat" value="lihat" class="btn btn-info"></a></td>
                <td><a href="crud.php?edit=<?php echo $key['id'] ?>"><input type="button" name="edit" value="edit" class="btn btn-warning"></a></td>
                <td><input type="button" name="hapus" value="hapus" onclick="return hapus()" class="btn btn-danger"></td>
              </tr>
              <?php
            }
            ?>
          </table>
        </div>
        <div class="card-footer">

        </div>
      </div>
    </div>
    <script type="text/javascript">
      function hapus()
      {
        var yakin = confirm('Anda Yakin Ingin Menghapusnya?');
        if(yakin){
         document.location.href = "crud.php?hapus=<?php echo $key['id'] ?>";
       }
     }
   </script>
 </body>
 </html>
 <?php
}else{
  echo "<script>alert('anda harus login');document.location.href='../'</script>";
}
?>