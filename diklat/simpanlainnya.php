<?php
// <!-- tampilkan data dari database -->
include "../koneksi.php";

// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
// menangkap data yang di kirim dari form 
  $nomor = $_POST['nomor'];
  $namakegiatan = $_POST['namakegiatan'];
  $institusi   = $_POST['institusi'];
  $tanggalmulai  = $_POST['tanggalmulai'];
  $tanggalselesai = $_POST['tanggalselesai'];
  $ruangan = $_POST['ruangan'];
  $jumlahpeserta  = $_POST['jumlahpeserta'];
  $jumlahhari  = $_POST['jumlahhari'];
  $biaya  = $_POST['biaya'];
  $total = $_POST['total'];
  $terbilang = $_POST['terbilang'];
  $keterangan = $_POST['keterangan'];
  $tanggalproses = $_POST['tanggalproses'];

  
// menginput data ke database
  $sql = "INSERT INTO diklatlainnya VALUES('$nomor','$namakegiatan','$institusi','$tanggalmulai','$tanggalselesai','$ruangan','$jumlahpeserta','$jumlahhari','$biaya','$total','$terbilang','$keterangan','$tanggalproses')";
  $sql_admin = "INSERT INTO adminlainnya VALUES('$nomor','$namakegiatan','$institusi','$tanggalmulai','$tanggalselesai','$ruangan','$jumlahpeserta','$jumlahhari','$biaya','$total','$terbilang','$keterangan','$tanggalproses')";
  mysqli_query($koneksi, $sql);
  mysqli_query($koneksi, $sql_admin);
  header ("location: homelainnya.php");
  
?>