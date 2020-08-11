<?php 
require '../library/controller.php';
session_start();
if (isset($_SESSION['status_login_tukang'])) {
	if (isset($_GET['take'])) {
		$take = new controller("localhost","root","","bengkel");
		$bekerja = $take->edit("tukang","nama",$_SESSION['nama_tukang']);
		if ($bekerja['status'] == "bekerja") {
			header("location:index.php?alert");
		}else{
			$status = array("status"=>"bekerja");
			$result = array("status"=>$_SESSION['nama_tukang']);
		$take->update("tukang",$status,"nama",$_SESSION['nama_tukang'],"","","");
		$take->update("antrian",$result,"id",$_GET['take'],"index.php","Take","fail");
		}
	}
	if (isset($_GET['finish'])) {
		$finish = new controller("localhost","root","","bengkel");
		$status = array("status"=>"ada");
		$finish->update("tukang",$status,"nama",$_SESSION['nama_tukang'],"","","");
		$finish->delete("antrian","id",$_GET['finish'],"index.php","Berhasil","Gagal");
	}
}
?>