<?php 
    include "..\koneksi.php";

    if (mysqli_connect_error()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
    }

    // $kategori = $_GET['kategori'];
    $sql=mysqli_query($koneksi, "SELECT * FROM kasir1 WHERE kategori='$_GET[kategori]'");
    $d=mysqli_fetch_array($sql);
   

// <!-- <script> -->
    //  var kategori = document.getElementById("kategori");

    if ( $d = "jr1vip")
    {
        echo '<a target="_blank" href="cetaklaporan.php"</a>';
    } else {
        header("location:homekasir1.php");
    };
// <!-- </script> -->

?>