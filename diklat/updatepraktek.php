<?php

include "../koneksi.php";

 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}


  $id = $_GET['nomor'];
  $institusi = $_GET['institusi'];
  $pendidikan = $_GET['pendidikan'];
  $nilai   = $_POST['nilai'];
  $tanggalmulai = $_GET['tanggalmulai'];
  $tanggalselesai = $_GET['tanggalselesai'];
  $jumlahbulan = $_GET['jumlahbulan'];
  $jumlahpeserta = $_GET['jumlahpeserta'];
  $namapraktek= $_GET['$namapraktek'];
  $ruangpraktek = $_GET['ruangpraktek'];
  $tanggalpembayaran = $_GET['tanggalpembayaran'];
  $total = $_GET['total'];
  $bilang = $_GET['bilang'];
  $keterangan = $_GET['keterangan'];


//query update
mysqli_query($koneksi, "UPDATE praktek 
                                SET institusi='$institusi',
                                pendidikan='$pendidikan',
                                nilai='$nilai',
                                tanggalmulai='$tanggalmulai',
                                tanggalselesai='$tanggalselesai',
                                jumlahbulan='$jumlahbulan',
                                jumlahpeserta='$jumlahpeserta',
                                namapraktek='$namapraktek',
                                ruangpraktek='$ruangpraktek',
                                tanggalpembayaran='$tanggalpembayaran',
                                total='$total',
                                bilang='$bilang',
                                keterangan='$keterangan'
                                 WHERE nomor='$id' ");
                                
mysqli_query($koneksi, "UPDATE adminpraktek
                                SET institusi='$institusi',
                                pendidikan='$pendidikan',
                                nilai='$nilai',
                                tanggalmulai='$tanggalmulai',
                                tanggalselesai='$tanggalselesai',
                                jumlahbulan='$jumlahbulan',
                                jumlahpeserta='$jumlahpeserta',
                                namapraktek='$namapraktek',
                                ruangpraktek='$ruangpraktek',
                                tanggalpembayaran='$tanggalpembayaran',
                                total='$total',
                                bilang='$bilang',
                                keterangan='$keterangan'
                                 WHERE nomor='$id' ");

// mengalihkan halaman kembali ke index.php
header("location:homepraktek.php");
?>