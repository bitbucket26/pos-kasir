<?php
include "../koneksi.php";
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}


$id = $_GET['nomornota'];
$nomorsep = $_GET['nomorsep'];
$namapasien = $_GET['namapasien'];
$alamat = $_GET['alamat'];
$tanggalbayar = $_GET['tanggalbayar'];
// $total = $_GET['total'];


//query update
mysqli_query($koneksi, "UPDATE kasir5
                                SET nomorsep='$nomorsep', 
                                namapasien='$namapasien', 
                                alamat='$alamat', 
                                tanggalbayar='$tanggalbayar' 
                                 WHERE nomornota='$id' ");
                                // mysqli_query($koneksi, $query);
mysqli_query($koneksi, "UPDATE admin
                                SET nomorsep='$nomorsep', 
                                namapasien='$namapasien', 
                                alamat='$alamat', 
                                tanggalbayar='$tanggalbayar' 
                                 WHERE nomornota='$id' ");
                                // mysqli_query($koneksi, $query_adm);

// mengalihkan halaman kembali ke index.php
header("location:homekasir5.php");
?>