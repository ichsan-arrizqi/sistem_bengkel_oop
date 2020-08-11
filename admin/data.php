<?php
require '../library/controller.php';

if (isset($_GET['tambah'])) {
	try{
		$tambah = new controller("localhost","root","","bengkel");
		$rand = rand();
		$ekstensi = array('png','jpg','jpeg','gif','ico','PNG','JPG');
		$filename = $_FILES['foto']['name'];
		$size = $_FILES['foto']['size'];
		$ext = pathinfo($filename,PATHINFO_EXTENSION);
		if (!in_array($ext,$ekstensi)) {
			header("location:crud.php?tambah=EKSTENSI MEDIA TIDAK BISA❌");
		}else{
			if ($size < 104407000) {
				$upload = $rand."_".$filename;
				move_uploaded_file($_FILES['foto']['tmp_name'],'../picture/'.$upload);
				$fieldProduct = array('id','nama','harga','stok','jenis','foto');
				$valueProduct = array($_POST['id'],$_POST['nama'],$_POST['harga'],$_POST['stok'],$_POST['jenis'],$upload);
				$asd = $tambah->insert("product",$fieldProduct,$valueProduct,"product.php","Product Berhasil Ditambahkan","Product Gagal Ditambahkan");
				if ($asd) {
					echo "asd";
				}else{
					echo "asddsaa";
				}
			}else{
				header("location:crud.php?tambah=SIZE MEDIA TERLALU BESAR🗑");
			}
		}
	}catch(Exception $e){
		$e->getMessage();
	}
}
if (isset($_GET['update'])) {
	try {
		$update = new controller("localhost","root","","bengkel");
		$foto = $_FILES['foto']['name'];
		if ($foto == "") {
			$updateValue = array('nama'=>$_POST['nama'],'harga'=>$_POST['harga'],'stok'=>$_POST['stok'],'jenis'=>$_POST['jenis']);
			$update->update("product",$updateValue,'id',$_POST['id'],"product.php","Product Berhasil Diupdate","Product Gagal Diupdate");
		}else{
			$foto = rand()."_".$foto;
			move_uploaded_file($_FILES['foto']['tmp_name'],'../picture/'.$foto);
			$updateValue = array('nama'=>$_POST['nama'],'harga'=>$_POST['harga'],'stok'=>$_POST['stok'],'jenis'=>$_POST['jenis'],'foto'=>$foto);
			$update->update("product",$updateValue,'id',$_POST['id'],"product.php","Product Berhasil Diupdate","Product Gagal Diupdate");
		}	
	} catch (Exception $e) {
		$e->getMessage();
	}
}
if (isset($_GET['gambar'])) {
	$files = glob('../picture/*');
	foreach ($files as $file) {
		if (is_file($file)) {
			unlink($file);
			echo "<script>alert('BERHASIL MENGHAPUS MEDIA🗑');document.location.href='product.php'</script>";
		}else{
			echo "<script>alert('GAGAL MENGHAPUS MEDIA💾');document.location.href='product.php'</script>";
		}
	}
	echo "<script>alert('TIDAK ADA MEDIA SEPERTINYA🔍');document.location.href='product.php'</script>";
}
if (isset($_GET['pelanggan_hapus'])) {
	$pelanggan_hapus = new controller("localhost","root","","bengkel");
	$pelanggan_hapus->delete("pelanggan","id",$_GET['pelanggan_hapus'],"user.php");
}
if (isset($_GET['tukang_hapus'])) {
	$tukang_hapus = new controller("localhost","root","","bengkel");
	$tukang_hapus->delete("tukang","id",$_GET['tukang_hapus'],"user.php");
}
if (isset($_GET['batal'])) {
	$batal = new controller("localhost","root","","bengkel");
	$result = $batal->where("product","nama",$_POST['nama'],"");
	foreach ($result as $key) {
		$stok = $key['stok'];
		$nama_barang = $key['nama'];
	}
	$stok = $stok + $_POST['jumlah'];
	$updateValue = array('stok'=>$stok);
	$update = new controller("localhost","root","","bengkel");
	$update->update("product",$updateValue,'nama',$nama_barang,"","","");
	$update->delete("pesanan","id",$_GET['batal'],"product.php","Berhasil Dibatalkan","Gagal Dibatalkan");
}
if (isset($_GET['bayar'])) {
	$bayar = new controller("localhost","root","","bengkel");
	$fieldBayar = array("nama_barang","harga","jumlah","total");
	$valueBayar = array($_POST['nama_barang'],$_POST['harga'],$_POST['jumlah'],$_POST['total']);
	$bayar->insert("penghasilan",$fieldBayar,$valueBayar,"","","");
	
	$result = $bayar->edit("product","nama",$_POST['nama_barang']);
	$hasil = $result['stok'] - 0;
	$product = array("stok"=>$hasil);
	$bayar->update("product",$product,"id",$result['id'],"","","");
	$bayar->delete("pesanan","id",$_GET['bayar'],"product.php","Transaksi Berhasil","Transaksi Gagal");

}
if (isset($_GET['riwayat'])) {
	$riwayat = new controller("localhost","root","","bengkel");
	$riwayat->deleteAll("penghasilan","penghasilan.php","Riwayat Berhasil Dihapus","Riwayat Gagal Dihapus");
}
?>