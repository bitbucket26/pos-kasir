<?php

include "../koneksi.php";

 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}


  $id = $_GET['nomor'];
  $namakegiatan = $_GET['namakegiatan'];
  $institusi   = $_GET['institusi'];
  $tanggalmulai  = $_GET['tanggalmulai'];
  $tanggalselesai = $_GET['tanggalselesai'];
  $ruangan = $_GET['ruangan'];
  $jumlahpeserta  = $_GET['jumlahpeserta'];
  $jumlahhari  = $_GET['jumlahhari'];
  $biaya  = $_GET['biaya'];
  $total = $_GET['total'];
  $terbilang = $_GET['terbilang'];
  $keterangan = $_GET['keterangan'];
  // $tanggalproses = $_GET['tanggalproses'];


//query update
mysqli_query($koneksi, "UPDATE diklatlainnya
                                SET namakegiatan='$namakegiatan',
                                institusi='$institusi',
                                tanggalmulai='$tanggalmulai',
                                tanggalselesai='$tanggalselesai',
                                ruangan='$ruangan',
                                jumlahpeserta='$jumlahpeserta',
                                jumlahhari='$jumlahhari',
                                biaya='$biaya',
                                total='$total',
                                terbilang='$terbilang',
                                keterangan='$keterangan'
                                 WHERE nomor='$id' ");
                                
mysqli_query($koneksi, "UPDATE adminlainnya
                               SET namakegiatan='$namakegiatan',
                                institusi='$institusi',
                                tanggalmulai='$tanggalmulai',
                                tanggalselesai='$tanggalselesai',
                                ruangan='$ruangan',
                                jumlahpeserta='$jumlahpeserta',
                                jumlahhari='$jumlahhari',
                                biaya='$biaya',
                                total='$total',
                                terbilang='$terbilang',
                                keterangan='$keterangan'
                                 WHERE nomor='$id' ");

// mengalihkan halaman kembali ke index.php
header("location:homelainnya.php");
?>