<?php
session_start();
if($_SESSION['status_login_pelanggan'] == "login"){
  require '../library/controller.php';

  $lihat = new controller("localhost","root","","bengkel");
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
    <script src="../asset/js/bootstrap.js"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="/bengkel">Bengkel</a>

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
      <div class="container">
        <form method="post" action="data.php">
          <?php if (isset($_GET['id'])) { ?>
            <?php 
            $lihat = new controller("localhost","root","","bengkel");
            $resultLihat = $lihat->where("product","id",$_GET['id'],"");
            foreach ($resultLihat as $key) {
              ?>
              <div class="card" style="margin : 2rem auto">
                <div class="card-header">
                  <center><img style="border-radius: 50%;" src="../asd.png"><br><h1><strong><?php echo $key['nama'] ?> | PRODUCT</strong></h1></center>
                  <input type="hidden" name="id" value="<?php echo $key['id'] ?>">
                </div>
                <div class="card-body">
                  <center><img src="../picture/<?php echo $key['foto']; ?>" width="500" height="300"></center>
                </div>
                <div class="card-footer">
                  <label for="nama">Nama : </label>
                  <h1 id="nama" name="nama"><?php echo $key['nama'] ?></h1>
                  <input type="hidden" name="nama" value="<?php echo $key['nama'] ?>">
                  <label for="harga">Harga : </label>
                  <h1>Rp.<?php echo $key['harga'] ?></h1>
                  <input type="hidden" id="harga" name="harga" value="<?php echo $key['harga'] ?>">
                  <input type="hidden" name="harga" value="<?php echo $key['harga'] ?>">
                  <label for="stok">Stok Barang : </label>
                  <h1 id="stok"><?php echo $key['stok'] ?></h1>
                  <label for="jumlah">Masukan Jumlah Yang Ingin Anda Pesan : </label>
                  <select id="jumlah" name="jumlah" class="form-control col-md-5" required="">
                    <?php 
                    $a = 0;
                    while ($a <= $key['stok']) {
                      ?>
                      <option value="<?php echo $a; ?>"><?php echo $a ?></option>
                      <?php
                      $a++;
                    } ?>
                  </select>
                  <label for="total">Total : </label>
                  <div class="form-row">
                    
                  <h1>Rp.</h1><h1 id="totalH1" name="totalH1">0</h1>
                  </div>
                  <input type="hidden" id="total" name="total" class="form-control col-md-5">
                </div>

                <div class="card-footer">
                  <center><input type="submit" id="btn" name="" value="PESAN" class="btn btn-success">
                    <p id="alert"></p>
                  </center>
                </div>
              </form> <script type="text/javascript">
                document.getElementById("btn").disabled = true
                document.getElementById("jumlah").addEventListener("change",function(){
                  var harga = document.getElementById("harga").value;
                  var total = document.getElementById("total").value;
                  total = this.value * Number(harga);
                  document.getElementById("totalH1").innerHTML = total
                  if (total == 0) {
                    document.getElementById('btn').disabled = true
                    document.getElementById('alert').style.color = "red"
                    document.getElementById('alert').innerHTML = "*Harap Masukan Jumlah Yang Ingin Anda Pesan"
                  }else{
                    document.getElementById('btn').disabled = false
                    document.getElementById('alert').innerHTML = ""
                  }
                })
              </script>
            </div>
            <?php
          }
          ?>
        <?php } ?>
      </div>
  </body>
  </html>
  <?php
}else{
  echo "<script>alert('anda harus login');document.location.href='../'</script>";
}
?>