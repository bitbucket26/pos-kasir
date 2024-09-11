<?php
// <!-- tampilkan data dari database -->
include "../koneksi.php";

// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
// menangkap data yang di kirim dari form 
  $nomor = $_POST['nomor'];
  $namainstitusi   = $_POST['namainstitusi'];
  $tanggalmulai  = $_POST['tanggalmulai'];
  $tanggalselesai  = $_POST['tanggalselesai'];
  $total  = $_POST['total'];
  $terbilang = $_POST['terbilang'];
  $keterangan = $_POST['keterangan'];
  $tanggalpembayaran = $_POST['tanggalpembayaran'];

  
// menginput data ke database
  $sql = "INSERT INTO sewa VALUES('$nomor','$namainstitusi','$tanggalmulai','$tanggalselesai','$total','$terbilang','$keterangan','$tanggalpembayaran')";
  $sql_admin = "INSERT INTO adminsewa VALUES('$nomor','$namainstitusi','$tanggalmulai','$tanggalselesai','$total','$terbilang','$keterangan','$tanggalpembayaran')";
  mysqli_query($koneksi, $sql);
  mysqli_query($koneksi, $sql_admin);
  header ("location: homesewa.php");
  
?>