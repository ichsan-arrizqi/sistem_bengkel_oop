<?php
 session_start();
 require '../library/controller.php';
 if ($_SESSION['status_login_tukang'] == "") {
   echo "<script>alert('login dulu');document.location.href='../'</script>";
 }else{
  $tukang = new controller("localhost","root","","bengkel");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bengkel|Tukang</title>
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
        <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="take.php">Taken</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php"><?php echo $_SESSION['nama_tukang'] ?></a></li>
         
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="card" style="margin : 2rem auto">
    <div class="card-header">
      <h1><strong>Antrian Kendaraan</strong></h1>
    </div>
      <div class="card-body">
      <?php if (isset($_GET['alert'])): ?>
      <div class="alert alert-danger" role="alert">Selesaikan terlebih dahulu!</div>
    <?php endif ?>
    <table class="table">
      <tr class="thead-dark">
        <th>id</th>
        <th>merk kendaraan</th>
        <th>kebutuhan</th>
        <th>plat</th>
        <th>pemilik</th>
        <th>tanggal</th>
        <th>info</th>
        <th>status</th>
        <th>ambil</th>
      </tr>
      <?php 
        $tukangSpesialis = $tukang->where("tukang","nama",$_SESSION['nama_tukang']);
        foreach ($tukangSpesialis as $key) {
          $spesialis = $key['spesialis'];
        }
        $ForeachTukang = $tukang->whereLogic("antrian","jenis_kendaraan",$spesialis,'AND','status','');
        foreach ($ForeachTukang as $key) {
       ?>
      <tr class="tbody-light">
        <td><?php echo $key['id'] ?></td>
        <td><?php echo $key['merk_kendaraan'] ?></td>
        <td><?php echo $key['kebutuhan'] ?></td>
        <td><?php echo $key['plat'] ?></td>
        <td><?php echo $key['pemilik'] ?></td>
        <td><?php echo $key['tanggal'] ?></td>
        <td><?php echo $key['info'] ?></td>
        <td><?php echo $key['status'] ?></td>
        <td><a href="data.php?take=<?php echo $key['id'] ?>"><input type="button" name="" class="btn btn-primary" value="Take a job"></a></td>
      </tr>
    <?php } ?>
    </table>
      </div>
    </div>
  </div>
</body>
</html>
<?php } ?>