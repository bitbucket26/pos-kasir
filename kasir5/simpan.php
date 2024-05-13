<?php
// <!-- tampilkan data dari database -->
include "../koneksi.php";
 
// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
// menangkap data yang di kirim dari form 
  $iduser = $_POST['iduser'];
  $nomornota   = $_POST['nomornota'];
  $nomorsep  = $_POST['nomorsep'];
  $nomormedrec = $_POST['nomormedrec'];
  $namapasien  = $_POST['namapasien'];
  $alamat  = $_POST['alamat'];
  $ruangperawatan = $_POST['ruangperawatan'];
  $hakrawatkelas = $_POST['hakrawatkelas'];
  $mulaitanggal = $_POST['mulaitanggal'];
  $sampaitanggal = $_POST['sampaitanggal'];
  $dirawatkelas	 = $_POST['dirawatkelas'];
  $yangmembayar = $_POST['yangmembayar'];
  $yangmenerima = $_POST['yangmenerima'];
  $tanggalbayar = $_POST['tanggalbayar'];
  $realcoastbpjs = $_POST['realcoastbpjs'];
  $ditanggungjr = $_POST['ditanggungjr'];
  $realcoast = $_POST['realcoast'];
  $tarifkelas1 = $_POST['tarifkelas1'];
  $tarifkelas2 = $_POST['tarifkelas2'];
  $total = $_POST['total'];
  $nota1 = $_POST['nota1'];
  $nota2 = $_POST['nota2'];
  $bilang = $_POST['bilang'];
  
// menginput data ke database
  $sql = "INSERT INTO kasir5 VALUES('$iduser','$nomornota','$nomorsep','$nomormedrec','$namapasien','$alamat','$ruangperawatan','$hakrawatkelas','$mulaitanggal','$sampaitanggal','$dirawatkelas','$yangmembayar','$yangmenerima','$tanggalbayar','$realcoastbpjs','$ditanggungjr','$realcoast','$tarifkelas1','$tarifkelas2','$total','$nota1','$nota2','$bilang')";
  $sql_admin = "INSERT INTO admin VALUES('$iduser','$nomornota','$nomorsep','$nomormedrec','$namapasien','$alamat','$ruangperawatan','$hakrawatkelas','$mulaitanggal','$sampaitanggal','$dirawatkelas','$yangmembayar','$yangmenerima','$tanggalbayar','$realcoastbpjs','$ditanggungjr','$realcoast','$tarifkelas1','$tarifkelas2','$total','$nota1','$nota2','$bilang')";
  mysqli_query($koneksi, $sql);
  mysqli_query($koneksi, $sql_admin);
  header ("location: homekasir5.php");
   

?>