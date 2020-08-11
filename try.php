<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <input type="button" onclick="return nama()" name="">
   <script>
      // var yakin = confirm('apakah kamu yakin ingin meninggalkan halaman ini:(');
      // if(yakin){
      //    window.location = "https://localhost/bengkel/try.php";
      // }else{
      //    alert('dibatalkan oleh kau');
      // }
   </script>
   <?php 
      require 'library/controller.php';
      $ichsan = new controller("localhost","root","","bengkel");
      echo $ichsan->time_ago(Date("19:00:00"));
   ?>
<script>
   function nama()
   {
      var nama = prompt('siapa nama kau : ','');
      if (nama == "ichsanarrizqi") {
         alert("bisa");
      }else{
         alert("gagal");
      }
   }
</script>
</body>
</html>