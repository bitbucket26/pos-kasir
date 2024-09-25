<?php
include "../koneksi.php";
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}


  $id = $_GET['nomor'];
  $institusi   = $_GET['institusi'];
  $sewaaula  = $_GET['sewaaula'];
  $konsumsi  = $_GET['konsumsi'];
  $honornarsum  = $_GET['honornarsum'];
  $total  = $_GET['total'];
  $terbilang = $_GET['terbilang'];
  $keterangan = $_GET['keterangan'];
  $tanggalproses = $_GET['tanggalproses'];


//query update
mysqli_query($koneksi, "UPDATE ppd 
                                SET institusi='$institusi',
                                sewaaula='$sewaaula',
                                konsumsi='$konsumsi',
                                honornarsum='$honornarsum',
                                total='$total',
                                terbilang='$terbilang',
                                keterangan='$keterangan'
                                 WHERE nomor='$id' ");
                                
mysqli_query($koneksi, "UPDATE adminppd
                                SET institusi='$institusi',
                                sewaaula='$sewaaula',
                                konsumsi='$konsumsi',
                                honornarsum='$honornarsum',
                                total='$total',
                                terbilang='$terbilang',
                                keterangan='$keterangan'
                                 WHERE nomor='$id' ");

// mengalihkan halaman kembali ke index.php
header("location:homeppd.php");
?>