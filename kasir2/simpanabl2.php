<?php
// <!-- tampilkan data dari database -->
$koneksi = mysqli_connect("localhost","root","","kasir");
 
// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
// menangkap data yang di kirim dari form 
  $nomor = $_POST['nomor'];
  $tanggal = $_POST['tanggal'];
  $nama   = $_POST['nama'];
  $alamatktp  = $_POST['alamatktp'];
  $alamattujuan = $_POST['alamattujuan'];
  $perawatpendamping  = $_POST['perawatpendamping'];
  $nilai  = $_POST['nilaix'];
  $perawat = $_POST['perawat'];
  $ruangan = $_POST['ruangan'];
  $supir = $_POST['supir'];
  $jaraktempuh = $_POST['jaraktempuh'];
  $total = $_POST['total'];
  $kasir = $_POST['kasir'];
  $bilang = $_POST['bilang'];
  
  
// menginput data ke database
  $sqlabl = "INSERT INTO ablkasir2 VALUES('$nomor','$tanggal','$nama','$alamatktp','$alamattujuan','$perawatpendamping','$nilai','$perawat','$ruangan','$supir','$jaraktempuh','$total','$kasir','$bilang')";
  $sql_abladmin = "INSERT INTO abladmin VALUES('$nomor','$tanggal','$nama','$alamatktp','$alamattujuan','$perawatpendamping','$nilai','$perawat','$ruangan','$supir','$jaraktempuh','$total','$kasir','$bilang')";
  mysqli_query($koneksi, $sqlabl);
  mysqli_query($koneksi, $sql_abladmin);
  header ("location: homekasir2.php");
   

?>