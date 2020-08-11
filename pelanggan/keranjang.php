<?php
session_start();
if($_SESSION['status_login_pelanggan'] == "login"){
  require '../library/controller.php';
  $pesanan = new controller("localhost","root","","bengkel");
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
         <li class="nav-item"><a class="nav-link" href="service.php">Service</a></li>
         <li class="nav-item"><a class="nav-link" href="product.php">Product</a></li>
         <li class="nav-item"><a class="nav-link" href="keranjang.php">Cart</a></li>
         <li class="nav-item"><a class="nav-link" href="logout.php"><?php echo $_SESSION['nama'] ?></a></li>
       </ul>
       <form class="form-inline my-2 my-lg-0" method="get" action="product.php?cari">
        <input require class="form-control mr-sm-2" name="cari" type="search" placeholder="Cari Produk Disini" aria-label="Cari">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button>
      </form>

    </div>
  </nav>
  <div class="container bg-light">
    <div class="card" style="margin : 2rem auto">
      <div class="card-header">
        <h1><strong><i>CART</i></strong></h1>
      </div>
      <div class="card-body">
        <table class="table">
          <tr class="thead-dark">
            <th>no</th>
            <th>id</th>
            <th>nama</th>
            <th>nama barang</th>
            <th>harga</th>
            <th>jumlah</th>
            <th>total</th>
            <th colspan="2">opsi</th>
          </tr>
          <?php 
          $result = $pesanan->where("pesanan","nama",$_SESSION['nama'],"");
          $no = 1;
          foreach ($result as $key) {
           ?>
           <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $key['id'] ?></td>
            <td><?php echo $key['nama'] ?></td> 
            <td><?php echo $key['nama_barang'] ?></td>
            <td><?php echo $key['harga'] ?></td>
            <td><?php echo $key['jumlah'] ?></td>
            <td><?php echo $key['total'] ?></td>
            
            <form method="post" action="data.php?batal=<?php echo $key['id'] ?>">
              <input type="hidden" name="jumlah" value="<?php echo $key['jumlah'] ?>">
              <input type="hidden" name="nama" value="<?php echo $key['nama_barang'] ?>">
              <td><input type="submit" name="" value="BATALKAN PESANAN" class="btn btn-danger"></td>
            </form>
          </tr>
          <?php 
        }
        ?>
      </table>
    </div>
    <div class="card-footer">
      <p class="text-danger"><strong><i>*List Pesanan Anda,Bayar Pesanan Anda Di Kasir</i></strong></p>
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