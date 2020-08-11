<?php
session_start();
if($_SESSION['status_login_pelanggan'] == "login"){
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
  <body background="../wallpaper.jpg">
    <script src="../asset/js/jquery.js"></script> 
    <script src="../asset/js/popper.js"></script> 
    <script src="../asset/js/bootstrap.js"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Bengkel</a>

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
        <form class="form-inline my-2 my-lg-0" method="get" action="?menu=product.php?cari">
          <input require class="form-control mr-sm-2" name="cari" type="search" placeholder="Cari Produk Disini" aria-label="Cari">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button>
        </form>

      </div>
    </nav>
    <div class="container bg-light">
      <div class="card" style="margin : 2rem auto;">
        <div class="card-header">
          <div class="form-group">
            <h1><strong><i>PRODUCT</i></strong></h1>
            <a href="product.php"><input type="button" name="" value="ALL" class="btn btn-warning"></a>
            <a href="?jenis=motor"><input type="button" name="" value="MOTOR" class="btn btn-warning"></a>
            <a href="?jenis=mobil"><input type="button" name="" value="MOBIL" class="btn btn-warning"></a>
            <a href="?jenis=truck"><input type="button" name="" value="TRUCK" class="btn btn-warning"></a>
            <div class="form-row">
              <?php

              if(isset($_GET['jenis'])){
                $data = $product->cari("product","jenis",$_GET['jenis']);
              }elseif(isset($_GET['cari'])){
                $data = $product->cari("product","nama",$_GET['cari']);
              }else{
                $data = $product->select("product");
              }
              
              ?>
            </div>
          </div>
        </div>
        <div class="card-body">
          <?php 
          foreach($data as $d){
           ?>
           <div class="card">
            <div class="card-body">

              <a href="pesanan.php?id=<?php echo $d['id'] ?>"><img src="../picture/<?php echo $d['foto'] ?>" height="500" width="100%"></a>

            </div>
            <div class="card-footer bg-dark text-light">
              <div class="form">
                  <h1><?php echo $d['nama'] ?> </h1>
              </div>
              <div class="form">
                <h3>Rp.<?php echo $d['harga'] ?></h2>
              </div>
            </div>
          </div>
          <hr>
        <?php } ?>
      </div>
      <div class="card-footer">
        <p class="text-info"><strong><i>Bayar Product Dengan Ovo</i></strong></p>
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