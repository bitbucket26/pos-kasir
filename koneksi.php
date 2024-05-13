
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
?>