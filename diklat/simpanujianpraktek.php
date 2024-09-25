<?php
// <!-- tampilkan data dari database -->
include "../koneksi.php";

// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
// menangkap data yang di kirim dari form 
  $nomor = $_POST['nomor'];
  $namaujian = $_POST['namaujian'];
  $institusi   = $_POST['institusi'];
  $tanggalmulai  = $_POST['tanggalmulai'];
  $tanggalselesai = $_POST['tanggalselesai'];
  $pendidikan   = $_POST['pendidikan'];
  $nilai   = $_POST['nilai'];
  $ruangan = $_POST['ruangan'];
  $jumlahpeserta  = $_POST['jumlahpeserta'];
  $total = $_POST['total'];
  $terbilang = $_POST['terbilang'];
  $keterangan = $_POST['keterangan'];
  $tanggalproses = $_POST['tanggalproses'];

  
// menginput data ke database
  $sql = "INSERT INTO ujianpraktek VALUES('$nomor','$namaujian','$institusi','$tanggalmulai','$tanggalselesai','$pendidikan','$nilai','$ruangan','$jumlahpeserta','$total','$terbilang','$keterangan','$tanggalproses')";
  $sql_admin = "INSERT INTO adminujianpraktek VALUES('$nomor','$namaujian','$institusi','$tanggalmulai','$tanggalselesai','$pendidikan','$nilai','$ruangan','$jumlahpeserta','$total','$terbilang','$keterangan','$tanggalproses')";
  mysqli_query($koneksi, $sql);
  mysqli_query($koneksi, $sql_admin);
  header ("location: homeujianpraktek.php");
  
?>