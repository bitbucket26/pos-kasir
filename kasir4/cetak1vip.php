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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css"> -->
    <!-- <style>@page portrait { size: 210mm 140mm }</style> -->
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
        
        $sql=mysqli_query($koneksi, "SELECT * FROM kasir4 WHERE nomornota='$_GET[idi]'");
        $d=mysqli_fetch_array($sql);
        
    ?>
<section class="sheet padding-10mm" style="font-size:14px;">
    <div class="container-xxl">
        <!-- KOP -->
        <div class="d-flex justify-content-center w-100%" style="">
            <img src="../img/kop.png">
        </div>
            <br>
        <!-- Judul Nota -->
        <div class="d-flex justify-content-center">
            <label for="" class=""><b>BUKTI PENERIMAAN UANG DARI PASIEN RAWAT INAP</b></label>
        </div>
        <div class="d-flex justify-content-center">
            <label for="" class=""><b>PERMENKES NO.3 TAHUN 2023</b></label>
        </div>
        
        <!-- Nomor Nota -->
        <div class="colspan-12 text-end fw-bold">
                <td class="barisnota " style="text-align:right;">No.Nota :</td>
                <td class="barisnotaisi"><?=$d['nomornota']?></td>
        </div>
       
        <!-- Isi Kolom Nota -->
        
        <!-- Baris 1 -->
    <div class="row">  
        <div class="card border border-dark" style="border-radius: 15px;">
            <div class="row col-12"></div>
            <div class="row">
                <div class="col-2 align-items-start">
                Nomor SEP
                </div>
                <div class="col-4">:
                <?=$d['nomorsep']?>
                </div>
                <div class="col-2">
                Hak Rawat Kelas
                </div>
                <div class="col-4">:
                <?=$d['hakrawatkelas']?>
                </div>
            </div>

            <!-- Baris 2 -->
            <div class="row">
                <div class="col-2 ">
                Nomor Medrec
                </div>
                <div class="col-4">:
                <?=$d['nomormedrec']?>
                </div>
                <div class="col-2 text-capitalize"> 
                R. Perawatan
                </div>
                <div class="col-4 text-capitalize">:
                <?=$d['ruangperawatan']?>
                </div>
            
            </div>

            <!-- Baris 3 -->
            <div class="row">
                <div class="col-2">
                Nama Pasien
                </div>
                <div class="col-4 text-capitalize">:
                <?=$d['namapasien']?>
                </div>
                <div class="col-2">
                Dirawat Kelas
                </div>
                <div class="col-4">:
                <?=$d['dirawatkelas']?>
                </div>
            </div>

            <!-- Baris 4 -->
            <div class="row" >
                <div class="col-2">
                Alamat
                </div>
                <div class="col-4 text-capitalize">:
                <?=$d['alamat']?>
                </div>
                <div class="col-2">
                Mulai Tanggal
                </div>
                <div class="col-4">:
                <?=date('d-M-Y', strtotime($d['mulaitanggal']));?> S/d <?=date('d-M-Y', strtotime($d['sampaitanggal']));?>
                </div>       
            </div>
        </div>
    </div>
    <br>


        <!-- Baris 5 Perhitungan -->
    <div class="row">  
        <div class="card">
            <div class="row col-12"></div>
            <div class="row align-items-end" >
                <div class="col-1 align-items-start">
                </div>
                <div class="col-3 text-end">
                Real Coast 
                </div>
                <div class="col-3 text-start" name="rc">
                = Rp. <?php echo number_format ($d['realcoast'])?>,-
                </div>
                <div class="col-1"></div>
                <div class="col-4 text-center">
                <!-- Paling Besar 75% -->
                </div>
            </div>

            <div class="row col-12"></div>
            <div class="row align-items-end" >
                <div class="col-1 align-items-start">
                </div>
                <div class="col-3 text-end">
                Terif INA CBG Kelas 1 
                </div>
                <div class="col-3 " name="tarif1">
                = Rp. <?php echo number_format ($d['tarifkelas1'])?>,-
                </div>
                <!-- <div class="col-1"></div> -->
                <div class="col-5 text-end">
                <!-- <u>Tarif INA CBG Kelas 1 = Rp. <?php echo number_format ($d['nota2'])?>,-</u> -->
                </div>
            </div>

            <!-- Baris 6 -->
            <div class="row align-items-end">
                <div class="col-1">
                
                </div>
                <div class="col-3 text-end">
                <!-- Terif INA CBG Kelas 2 -->
                </div>
                <div class="col-3" name="" >
                <!-- = Rp. <?php echo number_format ($d['tarifkelas2'])?>,- -->
                </div>
                <div class="col-1"></div>
                <div class="col-4 text-center"><u>
                
                </div>
            </div>

            <!-- Baris 7 -->
            <div class="row" >
                <div class="col-1 ">
                </div>
                <div class="col-3 fw-bold">
                </div>
                <div class="col-3">
                    <u>&emsp;Rp. <?php echo number_format ($d['nota1'])?>,-</u>
                </div>
                <div class="col-5 fw-bold fst-italic">
                Terbilang : 
                </div>       
            </div>
            <!-- Baris 8 -->
            <div class="row" style="border-bottom: solid 1px;" >
            <div class="col-1 ">
                </div>
                <div class="col-3 fw-bold text-end">
                TOTAL BAYAR
                </div>
                <div class="col-3 fw-bold">
                <U>
                = Rp. <?php echo number_format ($d['total'])?>,- </U>
                </div>
                <div class="col-5 fw-bold fst-italic text-start ">
                <?=$d['bilang']?>
                </div>
            </div>
        </div>
    </div>

        <!-- Baris 9 -->
        <div class="row">
            <div class="col-1 ">
            </div>
            <div class="col-4 fw-bold text-center">
            
            </div>
            <div class="col-1 ">
            </div>
            <div class="col-1 ">
            </div>
            <div class="col-4 text-center">
            Indramayu, <?=date('d-M-Y', strtotime($d['tanggalbayar']));?>
            </div>
            <div class="col-1 ">
            </div>      
        </div>

        <!-- Baris 10 -->
        <div class="row">
            <div class="col-1 ">
            </div>
            <div class="col-4 fw-bold text-center">
            Yang Membayar
            </div>
            <div class="col-1 ">
            </div>
            <div class="col-1 ">
            </div>
            <div class="col-4 fw-bold text-center">
            Yang Menerima
            </div>
            <div class="col-1 ">
            </div>      
        </div>
        <br><br>
        <!-- Baris 11 -->
        <div class="row">
            <div class="col-1 ">
            </div>
            <div class="col-4 fw-bold text-center text-capitalize"><u>
            <?=$d['yangmembayar']?></u>
            </div>
            <div class="col-1 ">
            </div>
            <div class="col-1 ">
            </div>
            <div class="col-4 fw-bold text-center text-capitalize"><u>
            <?=$d['yangmenerima']?></u>
            </div>
            <div class="col-1 ">
            </div>      
        </div>
        
    <?php
        
    ?>
    </div>
        <script>
            window.print()
            header("location:homekasir4.php");
        </script>
</section>

</body>
</html>