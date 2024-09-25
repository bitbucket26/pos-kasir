<?php
// <!-- tampilkan data dari database -->
include "../koneksi.php";

// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
// menangkap data yang di kirim dari form 
  $nomor = $_POST['nomor'];
  $tanggalproses = $_POST['tanggalproses'];
  $institusi   = $_POST['institusi'];
  $namapraktek   = $_POST['namapraktek'];
  $ruangpraktek = $_POST['ruangpraktek'];
  $pendidikan = $_POST['pendidikan'];
  $tanggalmulai  = $_POST['tanggalmulai'];
  $tanggalselesai = $_POST['tanggalselesai'];
  $nilai   = $_POST['nilai'];
  $jumlahpeserta  = $_POST['jumlahpeserta'];
  $jumlahhari  = $_POST['jumlahhari'];
  $keterangan = $_POST['keterangan'];
  $total = $_POST['total'];
  $terbilang = $_POST['terbilang'];
  // $nilai1 = $_POST['nilai1'];
  // $nilai2 = $_POST['nilai2'];
  // $nilai3 = $_POST['nilai3'];

  
// menginput data ke database
  $sql = "INSERT INTO praktek VALUES('$nomor','$tanggalproses','$institusi','$namapraktek','$ruangpraktek','$pendidikan','$tanggalmulai','$tanggalselesai','$nilai','$jumlahpeserta','$jumlahhari','$keterangan','$total','$terbilang')";
  $sql_admin = "INSERT INTO adminpraktek VALUES('$nomor','$tanggalproses','$institusi','$namapraktek','$ruangpraktek','$pendidikan','$tanggalmulai','$tanggalselesai','$nilai','$jumlahpeserta','$jumlahhari','$keterangan','$total','$terbilang')";
  mysqli_query($koneksi, $sql);
  mysqli_query($koneksi, $sql_admin);
  header ("location: homepraktek.php");
  
?>