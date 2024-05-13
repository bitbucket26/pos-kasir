<?php 
    include "../koneksi.php";
    $tahun1 = date ('Y', strtotime("-1 year"));
    mysqli_query($koneksi, "delete from admin where tanggalbayar='$tahun1'")
                                      or die(mysqli_error($koneksi));
    header("location:homeadmin.php");
?>
?>