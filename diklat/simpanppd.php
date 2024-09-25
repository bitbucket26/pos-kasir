<?php
// <!-- tampilkan data dari database -->
include "../koneksi.php";

// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
// menangkap data yang di kirim dari form 
  $nomor = $_POST['nomor'];
  $institusi   = $_POST['institusi'];
  $sewaaula  = $_POST['sewaaula'];
  $konsumsi  = $_POST['konsumsi'];
  $honornarsum  = $_POST['honornarsum'];
  $total  = $_POST['total'];
  $terbilang = $_POST['terbilang'];
  $keterangan = $_POST['keterangan'];
  $tanggalproses = $_POST['tanggalproses'];

  
// menginput data ke database
  $sql = "INSERT INTO ppd VALUES('$nomor','$institusi','$sewaaula','$konsumsi','$honornarsum','$total','$terbilang','$keterangan','$tanggalproses')";
  $sql_admin = "INSERT INTO adminppd VALUES('$nomor','$institusi','$sewaaula','$konsumsi','$honornarsum','$total','$terbilang','$keterangan','$tanggalproses')";
  mysqli_query($koneksi, $sql);
  mysqli_query($koneksi, $sql_admin);
  header ("location: homeppd.php");
  
?>