<?php
session_start();
if($_SESSION['status_login_admin'] == "login"){
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
    <div class="container bg-light">

      <?php
      $result = new controller('localhost','root','','bengkel');
      ?>
    </style>

    <h1><strong>Pelanggan</strong></h1>
    <table class="table">
      <tr class="thead-dark bg-dark text-light">
        <th>id</th>
        <th>username</th>
        <th>password</th>
        <th>nama</th>
        <th>gmail</th>
        <th>opsi</th>
      </tr>
      <?php
      $data = $result->select('pelanggan');
      foreach($data as $d){
       ?>

       <tr class="bg-light">
        <td><?php echo $d['id'] ?></td>
        <td><?php echo $d['username'] ?></td>
        <td><?php echo $d['password'] ?></td>
        <td><?php echo $d['nama'] ?></td>
        <td><?php echo $d['gmail'] ?></td>
        <td><input type="button" class="btn btn-danger" onclick="return hapus_pelanggan()" value="Banned"></td>
      </tr>
      <?php
    } 
    ?>
  </table>
  <script type="text/javascript">
    function hapus_pelanggan()
    {
      var yakin = confirm('ANDA YAKIN INGIN MENGHAPUSNYA?🗑');
      if(yakin){
       document.location.href = "data.php?pelanggan_hapus=<?php echo $d['id'] ?>";
     }
   }
 </script>
 <h1><strong>Tukang</strong></h1>
 <input type="button" name="" value="TAMBAH" class="btn btn-primary">
 <table class="table">
  <tr class="thead-dark">
    <th>id</th>
    <th>username</th>
    <th>password</th>
    <th>nama</th>
    <th>spesialis</th>
    <th>status</th>
    <th colspan="2">opsi</th>
  </tr>
  <?php
  $tukang = new controller('localhost','root','','bengkel');
  $data = $tukang->select('tukang');
  while($value = mysqli_fetch_array($data)){
   ?>
   <tr class="bg-light">
    <td><?php echo $value['id'] ?></td>
    <td><?php echo $value['username'] ?></td>
    <td><?php echo $value['password'] ?></td>
    <td><?php echo $value['nama'] ?></td>
    <td><?php echo $value['spesialis'] ?></td>
    <td><?php echo $value['status'] ?></td>
    <td><input type="button" class="btn btn-danger" onclick="return hapus_tukang()" value="Pecat"></td>
    
    <script type="text/javascript">
      function hapus_tukang()
      {
        var yakin = confirm('ANDA YAKIN INGIN MENGHAPUSNYA?🗑');
        if(yakin){
         document.location.href = "data.php?tukang_hapus=<?php echo $value['id'] ?>";
       }
     }
   </script>
 </tr>
 <?php
}
?>
</table>
</div>
</body>
</html>
<?php
}else{
  echo "<script>alert('anda harus login');document.location.href='../'</script>";
}
?>