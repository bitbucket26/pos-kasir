<?php 
session_start();

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['role']==""){
    header("location:index.php?pesan=gagal");
}
$day = date ('Y-m-d',strtotime("days"));
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
        
        $sql=mysqli_query($koneksi, "SELECT * FROM diklatlainnya WHERE nomor='$_GET[id]'");
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
            <label class="fs-5"><u><b>NOTA PENGANTAR PEMBAYARAN</b></u></label>
        </div>
        <br>
        <div class="row">
            <div class="col-11 d-flex justify-content-end">
                <label class=""><b>Nomor : <?=$d['nomor']?></b></label>
            </div>
            <div class="col-1">
                
            </div>
        </div>
       
        <!-- Isi Kolom Nota -->
        
        
    <div class="row">  
        <div class="card" style="border: none;">
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-11">
                        <b>Rincian Tagihan Biaya Diklat Lainnya</b>
                    </div>
                </div>  
                <br>
            <!-- Baris 1 -->
            <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-3">
                    Nama Kegiatan
                    </div>
                    <div class="col-1 text-end">:
                    </div>
                    <div class="col-6 text-uppercase" style="border-bottom: 1px solid">
                    <?=$d['namakegiatan']?>
                    </div>
                    <div class="col-1 ">
                    </div>
                </div>
                

            <!-- Baris 2 -->
            <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-3">
                    Nama Institusi
                    </div>
                    <div class="col-1 text-end">:
                    </div>
                    <div class="col-6 text-uppercase" style="border-bottom: 1px solid">
                    <?=$d['institusi']?>
                    </div>
                    <div class="col-1 ">
                    </div>
                </div>

                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-3">
                    Waktu Pelaksanaan
                    </div>
                    <div class="col-1 text-end">:
                    </div>
                    <div class="col-6" style="border-bottom: 1px solid">
                    <?php echo date('d-M-Y', strtotime($d['tanggalmulai'])); ?> s/d <?php echo date('d-M-Y', strtotime($d['tanggalselesai'])); ?>
                    </div>
                    <div class="col-1 ">
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-3">
                    Ruangan
                    </div>
                    <div class="col-1 text-end">:
                    </div>
                    <div class="col-6 text-uppercase" style="border-bottom: 1px solid">
                    <?=$d['ruangan']?>
                    </div>
                    <div class="col-1 ">
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-3">
                    Rincian Biaya
                    </div>
                    <div class="col-1 text-end">:
                    </div>
                    <div class="col-6" style="border-bottom: 1px solid">
                    Rp. <?php echo number_format ($d['biaya'])?>,- x <?=$d['jumlahpeserta']?> Orang x <?=$d['jumlahhari']?> Hari
                    </div>
                    <div class="col-1 ">
                    </div>
                </div>

            <!-- baris 4 -->
            <div class="row" >
                <div class="col-1">
                    </div>
                <div class="col-3">
                Total Biaya
                </div>
                <div class="col-1 text-end">:
                </div>
                <div class="col-6 text-uppercase" style="border-bottom: 1px solid">
                Rp. <?php echo number_format ($d['total'])?>,-
                </div>
                <div class="col-1 ">
            </div>
            </div>
<br>
            <!-- <-- Baris 6 -->
            <div class="row">
                <div class="col-1">
                </div>
                <div class="col-3">
                Terbilang
                </div>
                <div class="col-1 text-end">:
                </div>
                <div class="col-6 fst-italic text-capitalize" style="border-bottom: 1px solid">
                <b><?=$d['terbilang']?></b>
                </div>
                <div class="col-1 ">
                </div>
            </div>
            <br>
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
            Indramayu, <?php echo date('d-M-Y'); ?>
            </div>
            <div class="col-1 ">
            </div>      
        </div>

        <!-- Baris 10 -->
        <div class="row">
            <div class="col-1 ">
            </div>
            <div class="col-4">
            </div>
            <div class="col-1 ">
            </div>
            <div class="col-1 ">
            </div>
            <div class="col-4 fw-bold text-center">
            Pengelola Diklat
            </div>
            <div class="col-1 ">
            </div>      
        </div>
        <br><br><br>
        <!-- Baris 11 -->
        <div class="row">
            <div class="col-1 ">
            </div>
            <div class="col-4 fw-bold text-center text-capitalize">
                
            </div>
            <div class="col-1 ">
            </div>
            <div class="col-1 ">
            </div>
            <div class="col-4 fw-bold text-center text-uppercase"><u>
            <?php echo $_SESSION['username'];?></u>
            </div>
            <div class="col-1 ">
            </div>      
        </div>
    </div>
    <br>
    <?php
        
    ?>
    </div>
        <script>
            window.print()
            header("location:homelainnya.php");
        </script>

</body>
</html>