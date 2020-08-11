<?php
session_start();
if($_SESSION['status_login_pelanggan'] == "login"){
  require '../library/controller.php';
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
        <form class="form-inline my-2 my-lg-0" method="get" action="product.php?cari">
          <input require class="form-control mr-sm-2" name="cari" type="search" placeholder="Cari Produk Disini" aria-label="Cari">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button>
        </form>

      </div>
    </nav>
      <div class="container">
        <div class="card" style="margin : 2rem auto">
          <div class="card-header">
            <h1><strong><i>SERVICE</i></strong></h1>
          </div>
          <div class="card-body bg-light text-dark">
            <div class="form">
              <?php 
              $antrian = new controller("localhost","root","","bengkel");
              $result = $antrian->edit("antrian","pemilik",$_SESSION['nama']);
              ?>
              <?php if ($result['pemilik'] == $_SESSION['nama']) { ?>

                <center><div class="alert alert-primary" role="alert">Anda Sedang Dalam Antrian</div></center>
                <table class="table">
                  <tr class="bg-info">
                    <th>id</th>
                    <th>merk kendaraan</th>
                    <th>kebutuhan</th>
                    <th>plat</th>
                    <th>pemilik</th>
                    <th>waktu</th>
                    <th>info</th>
                    <th>status</th>
                  </tr>
                  <?php 
                  $result = $antrian->where("antrian","pemilik",$_SESSION['nama']);
                  
                  foreach ($result as $key) {
                   ?>
                   <tr>
                    <td><?php echo $key['id'] ?></td>
                    <td><?php echo $key['merk_kendaraan'] ?></td>
                    <td><?php echo $key['kebutuhan'] ?></td>
                    <td><?php echo $key['plat'] ?></td>
                    <td><?php echo $key['pemilik'] ?></td>
                    <td><?php echo $antrian->time_ago(Date($key['tanggal'])) ?></td>
                    <td><?php echo $key['info'] ?></td>
                    <td><?php echo $key['status'] ?></td>
                  </tr>
                    
                <?php } ?>
                <?php 
                ?>
              </table>
            <?php }else{?>
              <form method="get" action="?kendaraan">
                <div class="form-row">
                  <div class="form-group">
                   <label for="kendaraan">Jenis Kendaraan Anda</label>
                   <select name="kendaraan" class="form-control" name="kendaraan" id="kendaraan" required>
                    <option value="">-- Pilih Jenis Kendaraan --</option>
                    <option value="mobil">Mobil</option>
                    <option value="motor">Motor</option>
                    <option value="truck">Truck</option>
                    <option value="bus">Bus</option>
                  </select>
                </div>
             </div>
             <script type="text/javascript">
               document.getElementById("kendaraan").addEventListener("change",function(){
                if (this.value) {
                  document.location.href="?kendaraan="+this.value;
                }
               });
             </script>
           </form>
           <?php
           $kendaraan = new controller('localhost','root','','bengkel');
           ?>
           <form action="antrian.php" method="post">
             <input type="hidden" name="jenis_kendaraan" value="<?php echo $_GET['kendaraan'] ?>">
             <div class="form-row">
              <div class="form-group col-md-6">
               <label for="kebutuhan">Kebutuhan Service</label>
               <select name="kebutuhan" id="kebutuhan" required class="form-control">
                <option value="">-- Kebutuhan/Problem Anda --</option>
                <option value="upgrade">upgrade</option>
                <option value="sparepart">spare part</option>
                <option value="service">service</option>
                <option value="steam">steam</option>
                <option value="sukucadang">suku cadang</option>
              </select>
            </div>
            <div class="form-group col-md-6">
             <label for="merk">Merk Kendaraan</label>
             <select name="merk" id="merk" required class="form-control">
              <option value="">-- Merk Kendaraan --</option>
              <?php
              $data =  $kendaraan->where('kendaraan','jenis_kendaraan',$_GET['kendaraan']);
              while($loop = mysqli_fetch_array($data)){
               echo "<option value=$loop[nama_product]>$loop[nama_product]</option>";
             }
             ?>
           </select>
         </div>
       </div>
       <div class="form-row">
        <div class="form-group col-md-6">
         <label for="plat">Plat Nomor Kendaraan</label>
         <input type="text" class="form-control" name="plat" id="plat" required>
       </div>
       <div class="form-group col-md-6">
         <label for="pemilik">Nama Pemilik</label>
         <input type="text" class="form-control" name="pemilik" readonly value="<?php echo $_SESSION['nama'] ?>" id="pemilik">
       </div>
     </div>
     <div class="form-group">
      <label for="info" class="text-info">*Info Tambahan bila perlu</label>
      <textarea name="info" class="form-control" id="info" cols="30" rows="10"></textarea>
    </div>
  </div>
</div>
<div class="card-footer bg-light text-dark">
 <center>
  <input type="submit" value="Buat" class="btn btn-success">
</center>
</div>
</div>
</div>
</form> 
<?php } ?>
</body>
</html>
<?php
}else{
  echo "<script>alert('anda harus login');document.location.href='../'</script>";
}
?>
