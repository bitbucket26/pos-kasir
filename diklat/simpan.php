<?php
// <!-- tampilkan data dari database -->
include "koneksi.php";
 
// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
// menangkap data yang di kirim dari form 
  $nomor = $_POST['nomor'];
  $instansi   = $_POST['instansi'];
  $pendidikan   = $_POST['pendidikan'];
  $nilai   = $_POST['nilai'];
  $tanggalmulai  = $_POST['tanggalmulai'];
  $tanggalselesai = $_POST['tanggalselesai'];
  $jumlahbulan  = $_POST['jumlahbulan'];
  $jumlahpeserta  = $_POST['jumlahpeserta'];
  $ruangmagang = $_POST['ruangmagang'];
  $tanggalpembayaran = $_POST['tanggalpembayaran'];
  $total = $_POST['total'];
  $bilang = $_POST['bilang'];
  $keterangan = $_POST['keterangan'];

  
// menginput data ke database
  $sql = "INSERT INTO magang VALUES('$nomor','$instansi','$pendidikan','$nilai','$tanggalmulai','$tanggalselesai','$jumlahbulan','$jumlahpeserta','$ruangmagang','$tanggalpembayaran','$total','$bilang','$keterangan')";
  $sql_admin = "INSERT INTO adminmagang VALUES('$nomor','$instansi','$pendidikan','$nilai','$tanggalmulai','$tanggalselesai','$jumlahbulan','$jumlahpeserta','$ruangmagang','$tanggalpembayaran','$total','$bilang','$keterangan')";
  mysqli_query($koneksi, $sql);
  mysqli_query($koneksi, $sql_admin);
  header ("location: home.php");
  
?>