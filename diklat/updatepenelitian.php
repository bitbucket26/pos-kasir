<?php

include "../koneksi.php";

 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}


  $id = $_GET['nomor'];
  $tanggalproses = $_GET['tanggalproses'];
  $jeniskegiatan = $_GET['jeniskegiatan'];
  $nama = $_GET['nama'];
  $pendidikan   = $_GET['pendidikan'];
  $institusi   = $_GET['institusi'];
  $programstudy   = $_GET['programstudy'];
  $judulpenelitian   = $_GET['judulpenelitian'];
  $tempatpenelitian   = $_GET['tempatpenelitian'];
  $tanggalmulai  = $_GET['tanggalmulai'];
  $tanggalselesai = $_GET['tanggalselesai'];
  $nilai   = $_GET['nilai'];
  $bulan = $_GET['bulan'];
  $keterangan = $_GET['keterangan'];
  $total = $_GET['total'];
  $terbilang = $_GET['terbilang'];


//query update
mysqli_query($koneksi, "UPDATE penelitian 
                                SET jeniskegiatan='$jeniskegiatan',
                                nama='$nama',
                                pendidikan='$pendidikan',
                                institusi='$institusi',
                                programstudy='$programstudy',
                                judulpenelitian='$judulpenelitian',
                                tempatpenelitian='$tempatpenelitian',
                                tanggalmulai='$tanggalmulai',
                                tanggalselesai='$tanggalselesai',
                                nilai='$nilai',
                                bulan='$bulan',
                                keterangan='$keterangan',
                                total='$total',
                                terbilang='$terbilang'
                                 WHERE nomor='$id' ");
                                
mysqli_query($koneksi, "UPDATE adminpenelitian
                               SET jeniskegiatan='$jeniskegiatan',
                                nama='$nama',
                                pendidikan='$pendidikan',
                                institusi='$institusi',
                                programstudy='$programstudy',
                                judulpenelitian='$judulpenelitian',
                                tempatpenelitian='$tempatpenelitian',
                                tanggalmulai='$tanggalmulai',
                                tanggalselesai='$tanggalselesai',
                                nilai='$nilai',
                                bulan='$bulan',
                                keterangan='$keterangan',
                                total='$total',
                                terbilang='$terbilang'
                                 WHERE nomor='$id' ");

// mengalihkan halaman kembali ke index.php
header("location:homepenelitian.php");
?>