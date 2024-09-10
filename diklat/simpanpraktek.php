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
  $pendidikan   = $_POST['pendidikan'];
  $nilai   = $_POST['nilai'];
  $tanggalmulai  = $_POST['tanggalmulai'];
  $tanggalselesai = $_POST['tanggalselesai'];
  $jumlahbulan  = $_POST['jumlahbulan'];
  $jumlahpeserta  = $_POST['jumlahpeserta'];
  $namapraktek = $_POST['namapraktek'];
  $ruangpraktek = $_POST['ruangpraktek'];
  $tanggalpembayaran = $_POST['tanggalpembayaran'];
  $total = $_POST['total'];
  $bilang = $_POST['bilang'];
  $keterangan = $_POST['keterangan'];

  
// menginput data ke database
  $sql = "INSERT INTO praktek VALUES('$nomor','$institusi','$pendidikan','$nilai','$tanggalmulai','$tanggalselesai','$jumlahbulan','$jumlahpeserta','$namapraktek','$ruangpraktek','$tanggalpembayaran','$total','$bilang','$keterangan')";
  $sql_admin = "INSERT INTO adminpraktek VALUES('$nomor','$institusi','$pendidikan','$nilai','$tanggalmulai','$tanggalselesai','$jumlahbulan','$jumlahpeserta','$namapraktek','$ruangpraktek','$tanggalpembayaran','$total','$bilang','$keterangan')";
  mysqli_query($koneksi, $sql);
  mysqli_query($koneksi, $sql_admin);
  header ("location: homepraktek.php");
  
?>