<?php 
session_start();

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['role']==""){
    header("location:index.php?pesan=gagal");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Nota</title>
</head>
<body class="notaprint" style="background-color: white;">
    
    <?php	
       include "../koneksi.php";
         
       // Check connection
       if (mysqli_connect_error()){
           echo "Koneksi database gagal : " . mysqli_connect_error();
       }
        
        $sql=mysqli_query($koneksi, "SELECT * FROM ablkasir1 WHERE nomor='$_GET[id]'");
        $d=mysqli_fetch_array($sql);
    ?>

    <div class="container-xxl">
        <!-- KOP -->
        <div class="d-flex justify-content-center w-100%" >
            <img src="../img/kop.png">
        </div>
            <br>
        <!-- Judul Nota -->
        <div class="d-flex justify-content-center">
            <label class=""><b>RINCIAN PEMBAYARAN</b></label>
        </div>
        <br>
       
        <!-- Isi Kolom Nota -->
        
        <!-- Baris 1 -->
    <div class="row">  
        <div class="card border border-dark" style="border-radius: 15px;">
            <div class="row col-12"></div>
            <div class="row">
                <div class="col-2 align-items-start">
                No.Nota
                </div>
                <div class="col-4">:
                <?=$d['nomor']?>
                </div>
                <div class="col-2">
                Tujuan
                </div>
                <div class="col-4">:
                <?=$d['alamattujuan']?>
                </div>
            </div>

            <!-- Baris 2 -->
            <div class="row">
                <div class="col-2 ">
                Nama Lengkap
                </div>
                <div class="col-4">:
                <?=$d['nama']?>
                </div>
                <div class="col-2 text-capitalize"> 
                Jarak
                </div>
                <div class="col-4 text-capitalize">:
                <?=$d['jaraktempuh']?> km
                </div>
            
            </div>

            <!-- Baris 3 -->
            <div class="row">
                <div class="col-2">
                Alamat Pasien
                </div>
                <div class="col-4 text-capitalize">:
                <?=$d['alamatktp']?>
                </div>
                <div class="col-2">
                </div>
                <div class="col-4">
                </div>
            </div>
        </div>
    </div>
    <br>


        <!-- Baris 4 Perhitungan -->
    <div class="row">  
        <div class="card">
            <!-- <div class="row col-12"></div> -->
            <div class="row align-items-end" >
                <div class="col-1 text-center border border-dark">
                No.
                </div>
                <div class="col-5 text-start border border-dark">
                Jenis Layanan
                </div>
                <div class="col-3 border border-dark" name="rc">
                Supir / Perawat
                </div>
                <div class="col-3 text-end border border-dark">
                Jumlah
                </div>
            </div>
            <!-- Baris 5 -->
            <div class="row align-items-end" >
                <div class="col-1 text-center border border-dark">
                1
                </div>
                <div class="col-5 text-start border border-dark">
                Sewa Mobil ambulance
                </div>
                <div class="col-3 border border-dark" name="rc">
                <?=$d['supir']?>
                </div>
                <div class="col-3 text-end border border-dark">
                <?=$d['total']?>
                </div>
            </div>

            <!-- Baris 6 -->
            <div class="row align-items-end" >
                <div class="col-1 text-center border border-dark">
                2
                </div>
                <div class="col-5 text-start border border-dark">
                Jasa Perawat Pendamping
                </div>
                <div class="col-3 text-start border border-dark" name="rc">
                <?=$d['nilai']?>
                </div>
                <div class="col-3 text-end border border-dark">
                <?=$d['nilai']?>
                </div>
            </div>
            <!-- baris 7  -->
            <div class="row align-items-end" >
                <div class="col-9 text-end border border-dark"><b>
                Jumlah</b>
                </div>
                <div class="col-3 text-end border border-dark">
                <?=$d['total']?>
                </div>
            </div>
        </div>
    </div>
    <br>
    <?php
        
    ?>
    </div>
        <script>
            window.print()
            header("location:home.php");
        </script>

</body>
</html>