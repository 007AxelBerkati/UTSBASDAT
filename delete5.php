<?php
//include file config.php
include('config.php');

$Essn = $_GET['essn'];
$pno = $_GET['pno'];
//jika benar mendapatkan GET id dari URL
if(isset($_GET['submit'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	//$Hours = $_GET['Hours'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	//$cek = mysqli_query($koneksi, "SELECT * FROM works_on WHERE Essn='$Essn' and Hours='$Hours'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	//if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM works_on WHERE Essn='$Essn' and pno='$pno'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php?page=tampil5";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php?page=tampil5";</script>';
		}
	//}else{
	//	echo '<script>alert("ID tidak ditemukan di database."); document.location="index.php?page=tampil5";</script>';
	//}
//}else{
	//echo '<script>alert("ID tidak ditemukan di database."); document.location="index.php?page=tampil5";</script>';
//}
}
?>
