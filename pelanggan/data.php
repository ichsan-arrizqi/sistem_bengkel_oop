<?php 
session_start();
require '../library/controller.php';
if (isset($_GET['batal'])) {
	$batal = new controller("localhost","root","","bengkel");
	$result = $batal->where("product","nama",$_POST['nama'],"");
	foreach ($result as $key) {
		$stok = $key['stok'];
		$nama_barang =$key['nama'];
	}
	$stok = $stok + $_POST['jumlah'];
	$updateValue = array('stok'=>$stok);
	$update = new controller("localhost","root","","bengkel");
	$update->update("product",$updateValue,'nama',$nama_barang,"","","");
	$update->delete("pesanan","id",$_GET['batal'],"keranjang.php","Berhasil di keluarkan di keranjang","Gagal Mohon Laporkan Kepada Admin Kami");
}else{
	$data = new controller("localhost","root","","bengkel");
	$field = array('nama','nama_barang','harga','jumlah','total');
	$total = $_POST['harga'] * $_POST['jumlah'];
	$value = array($_SESSION['nama'],$_POST['nama'],$_POST['harga'],$_POST['jumlah'],$total);
	$data->insert("pesanan",$field,$value,"","","");

	$data = $data->edit("product","id",$_POST['id']);
	$stok = $data['stok'] - $_POST['jumlah'];
	$updateValue = array('stok'=>$stok);
	$update = new controller("localhost","root","","bengkel");
	$update->update("product",$updateValue,'id',$_POST['id'],"product.php","Berhasil Product Anda sudah Masuk Keranjang","Gagal Mohon Laporkan Kepada Admin Kami");
}
?>