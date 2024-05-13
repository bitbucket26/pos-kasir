<?php 
// <!-- tampilkan data dari database -->
include "../koneksi.php";
 
// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

    if(isset($_GET['id'])){
    mysqli_query($koneksi, "delete from kasir4 where nomornota='$_GET[id]'")
                                      or die(mysqli_error($koneksi));
                                      
    echo "<p><b> Data Berhasil Dihapus </b></p>";
    echo "<meta http-equiv=refresh-content=2;URL='login.php'>";
    header("location:home.php");
    }
?>

