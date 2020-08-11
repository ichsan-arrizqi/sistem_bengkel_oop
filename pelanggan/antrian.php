<?php
try{
	require '../library/controller.php';
	$tanggal = date("H:m:s");
	$field = array('merk_kendaraan','kebutuhan','plat','pemilik','tanggal','info','jenis_kendaraan');
	$list = array($_POST['merk'],$_POST['kebutuhan'],$_POST['plat'],$_POST['pemilik'],$tanggal,$_POST['info'],$_POST['jenis_kendaraan']);
	$antrian = new controller('localhost','root','','bengkel');
	$antrian->insert('antrian',$field,$list,"service.php","Berhasil,Kendaraan Anda Sudah Masuk Antrian","Hanya Satu Kendaraan Saja untuk Satu Akun");
}catch(Exception $e){
	echo $e->getMessage();
}
?>