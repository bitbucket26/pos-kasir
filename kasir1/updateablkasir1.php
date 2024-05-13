<?php
$servername = "localhost";
$database = "kasir";
$username = "root";
$password = "";
$koneksi = mysqli_connect("localhost","root","","kasir");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}


$id = $_GET['nomor'];
$nama = $_GET['nama'];
$alamatktp = $_GET['alamatktp'];
$tanggal = $_GET['tanggal'];
$alamattujuan = $_GET['alamattujuan'];
$total = $_GET['total'];


//query update
mysqli_query($koneksi, "UPDATE ablkasir1 
                                SET nama='$nama', 
                                alamatktp='$alamatktp', 
                                tanggal='$tanggal', 
                                alamattujuan='$alamattujuan',
                                total='$total'
                                 WHERE nomor='$id' ");
                                // mysqli_query($koneksi, $query);
mysqli_query($koneksi, "UPDATE abladmin
                                SET nama='$nama', 
                                alamatktp='$alamatktp', 
                                tanggal='$tanggal', 
                                alamattujuan='$alamattujuan',
                                total='$total'
                                 WHERE nomor='$id' ");
                                // mysqli_query($koneksi, $query_adm);

// mengalihkan halaman kembali ke index.php
header("location:homekasir1.php");
?>