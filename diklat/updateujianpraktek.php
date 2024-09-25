<?php

include "../koneksi.php";

 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}


  $id = $_GET['nomor'];
  $namaujian = $_GET['namaujian'];
  $institusi   = $_GET['institusi'];
  $tanggalmulai  = $_GET['tanggalmulai'];
  $tanggalselesai = $_GET['tanggalselesai'];
  $pendidikan   = $_GET['pendidikan'];
  $nilai   = $_GET['nilai'];
  $ruangan = $_GET['ruangan'];
  $jumlahpeserta  = $_GET['jumlahpeserta'];
  $total = $_GET['total'];
  $terbilang = $_GET['terbilang'];
  $keterangan = $_GET['keterangan'];


//query update
mysqli_query($koneksi, "UPDATE ujianpraktek 
                                SET namaujian='$namaujian',
                                institusi='$institusi',
                                tanggalmulai='$tanggalmulai',
                                tanggalselesai='$tanggalselesai',
                                pendidikan='$pendidikan',
                                nilai='$nilai',
                                ruangan='$ruangan',
                                jumlahpeserta='$jumlahpeserta',
                                total='$total',
                                terbilang='$terbilang',
                                keterangan='$keterangan'
                                 WHERE nomor='$id' ");
                                
mysqli_query($koneksi, "UPDATE adminujianpraktek
                                SET namaujian='$namaujian',
                                institusi='$institusi',
                                tanggalmulai='$tanggalmulai',
                                tanggalselesai='$tanggalselesai',
                                pendidikan='$pendidikan',
                                nilai='$nilai',
                                ruangan='$ruangan',
                                jumlahpeserta='$jumlahpeserta',
                                total='$total',
                                terbilang='$terbilang',
                                keterangan='$keterangan'
                                 WHERE nomor='$id' ");

// mengalihkan halaman kembali ke index.php
header("location:homeujianpraktek.php");
?>