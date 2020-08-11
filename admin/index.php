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
            <form class="form-inline my-2 my-lg-0" method="get" action="?menu=product.php?cari">
                <input require class="form-control mr-sm-2" name="cari" type="search" placeholder="Cari Produk Disini" aria-label="Cari">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button>
            </form>

        </div>
    </nav>
    <div class="container bg-light">
        <center><h1><strong>WORKING HARD</strong></h1></center>
    </div>
</body>
</html>
<?php
}else{
    echo "<script>alert('anda harus login');document.location.href='../'</script>";
}
?>