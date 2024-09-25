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
  $jeniskegiatan = $_POST['jeniskegiatan'];
  $nama = $_POST['nama'];
  $pendidikan   = $_POST['pendidikan'];
  $institusi   = $_POST['institusi'];
  $programstudy   = $_POST['programstudy'];
  $judulpenelitian   = $_POST['judulpenelitian'];
  $tempatpenelitian   = $_POST['tempatpenelitian'];
  $tanggalmulai  = $_POST['tanggalmulai'];
  $tanggalselesai = $_POST['tanggalselesai'];
  $nilai   = $_POST['nilai'];
  $bulan = $_POST['bulan'];
  $keterangan = $_POST['keterangan'];
  $total = $_POST['total'];
  $terbilang = $_POST['terbilang'];

  
// menginput data ke database
  $sql = "INSERT INTO penelitian VALUES ('$nomor','$tanggalproses','$jeniskegiatan','$nama','$pendidikan','$institusi','$programstudy','$judulpenelitian','$tempatpenelitian','$tanggalmulai','$tanggalselesai','$nilai','$bulan','$keterangan','$total','$terbilang')";
  $sql_admin = "INSERT INTO adminpenelitian VALUES('$nomor','$tanggalproses','$jeniskegiatan','$nama','$pendidikan','$institusi','$programstudy','$judulpenelitian','$tempatpenelitian','$tanggalmulai','$tanggalselesai','$nilai','$bulan','$keterangan','$total','$terbilang')";
  mysqli_query($koneksi, $sql);
  mysqli_query($koneksi, $sql_admin);
  header ("location: homepenelitian.php");
  
?>