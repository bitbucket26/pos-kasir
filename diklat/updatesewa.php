<?php
include "../koneksi.php";
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}


  $id = $_GET['nomor'];
  $namainstitusi   = $_GET['namainstitusi'];
  $tanggalmulai   = $_GET['tanggalmulai'];
  $tanggalselesai   = $_GET['tanggalselesai'];
  $total  = $_GET['total'];
  $terbilang = $_GET['terbilang'];
  $keterangan = $_GET['keterangan'];


//query update
mysqli_query($koneksi, "UPDATE sewa 
                                SET namainstitusi='$namainstitusi',
                                tanggalmulai='$tanggalmulai',
                                tanggalselesai='$tanggalselesai',
                                total='$total',
                                terbilang='$terbilang',
                                keterangan='$keterangan'
                                 WHERE nomor='$id' ");
                                
mysqli_query($koneksi, "UPDATE adminsewa
                                SET namainstitusi='$namainstitusi',
                                tanggalmulai='$tanggalmulai',
                                tanggalselesai='$tanggalselesai',
                                total='$total',
                                terbilang='$terbilang',
                                keterangan='$keterangan'
                                 WHERE nomor='$id' ");

// mengalihkan halaman kembali ke index.php
header("location:homesewa.php");
?>