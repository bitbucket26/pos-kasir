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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Penelitian</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php 
            include "sidebar.php";
        ?>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
        
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <?php 
                        include "topbarnav.php"; 
                    ?>

                    <!-- Topbar Navbar -->
                    <?php
                        include "topbarnavbar.php"; 
                    ?>

                </nav>
                <!-- End of Topbar -->



<!-- Begin Page Content -->
<div class="container-fluid">


<!-- Input Data -->
<form action="simpanpenelitian.php" method="post">
<?php

    include "../koneksi.php";

    // Check connection
    if (mysqli_connect_error()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
    }

    $sql = mysqli_query($koneksi, "select max(nomor) as maxID from adminpenelitian");
    $data = mysqli_fetch_array($sql) or die( mysqli_error($data));
    $kode = $data['maxID'];
    $kode++;
    $ket = "";
    $kodeautoabl = $ket . sprintf("%07s", $kode)
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Penelitian</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <div class="row">
                <!-- Awal Kolom 1 -->
                <div class="col-sm-9">
                    <div class="card">
                        <div class="row" style="padding: 10px 10px;">
                            <div class="col">
                            <div class="row g-2">
                                    <div class="col-md">
                                        <div class="form-floating">
                                        <label class="labeldata">Nomor</label>
                                        <input type="number" value="<?php echo $kodeautoabl;?>" name="nomor" class="form-control" id="nomor" readonly>	
                                        </div>
                                    </div>	
                                    <div class="col-md">
                                        <div class="form-floating">
                                        <label class="labeldata">Tanggal</label>
                                        <?php $dt = new DateTime();
                                            echo '<input type="date" name="tanggalproses" class="form-control" id="tanggalproses" value="' .$dt->format('Y-m-d'). '" readonly>'
                                        ?>
                                        </div>
                                    </div>	
                                </div>	
                                			
                                <label class="labeldata">Jenis Kegiatan</label>
                                            <select name="jeniskegiatan" class="form-control" id="jeniskegiatan" onchange="nilaik(this.value)" required>
                                                <option value="P">-pilih-</option>
                                                <option value="Studi Pendahuluan">Studi Pendahuluan</option>
                                                <option value="Penelitian">Penelitian</option>
                                            </select>	
                                <label class="labeldata">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="instansi" >	
                                <label class="labeldata">Kategori Pendidikan</label>
                                    <!-- <input type="text" name="pendidikan" class="form-control" id="pendidikan" > -->
                                            <select name="pendidikan" class="form-control" id="pendidikan" onchange="nilaik(this.value)" required>
                                                <option value="P">-pilih-</option>
                                                <option value="SMU / D1">SMU / D1</option>
                                                <option value="D III">D III</option>
                                                <option value="D IV / S1">D IV / S1</option>
                                                <option value="PROFESI">PROFESI</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                                <option value="MAHASISWA ASING">MAHASISWA ASING</option>
                                                <option value="KARYAWAN / UMUM">KARYAWAN / UMUM</option>
                                                <option value="PEMINJAMAN STATUS PASIEN / LES">PEMINJAMAN STATUS PASIEN / LES</option>
                                            </select>
                                				
                                                     <script>
                                                        function nilaik(e) {
                                                            
                                                            const a = document.getElementById("jeniskegiatan").value;
                                                            // var b = document.getElementById("jeniskegiatan").value;
                                                            // // var a = document.getElementById("perawatpendamping").value;
                                                            console.log(e)
                                                            // minimal 2 = om
                                                            if (a == "Studi Pendahuluan" && e == "SMU / D1"){
                                                            $("#nilai").val(50000);
                                                            } else if(a == "Studi Pendahuluan" && e == "D III"){
                                                            $("#nilai").val(125000);
                                                            } else if(a == "Studi Pendahuluan" && e == "D IV / S1"){
                                                            $("#nilai").val(150000);
                                                            } else if(a == "Studi Pendahuluan" && e == "PROFESI"){
                                                            $("#nilai").val(175000);
                                                            } else if(a == "Studi Pendahuluan" && e == "S2"){
                                                            $("#nilai").val(200000);
                                                            } else if(a == "Studi Pendahuluan" && e == "S3"){
                                                            $("#nilai").val(250000);
                                                            } else if(a == "Studi Pendahuluan" && e == "MAHASISWA ASING"){
                                                            $("#nilai").val(3250000);
                                                            } else if(a == "Studi Pendahuluan" && e == "KARYAWAN / UMUM"){
                                                            $("#nilai").val(250000);
                                                            } else if(a == "Studi Pendahuluan" && e == "PEMINJAMAN STATUS PASIEN / LES"){
                                                            $("#nilai").val(5000);
                                                            } else if (a == "Penelitian" && e == "SMU / D1"){
                                                            $("#nilai").val(100000);
                                                            } else if(a == "Penelitian" && e == "D III"){
                                                            $("#nilai").val(150000);
                                                            } else if(a == "Penelitian" && e == "D IV / S1"){
                                                            $("#nilai").val(250000);
                                                            } else if(a == "Penelitian" && e == "PROFESI"){
                                                            $("#nilai").val(275000);
                                                            } else if(a == "Penelitian" && e == "S2"){
                                                            $("#nilai").val(300000);
                                                            } else if(a == "Penelitian" && e == "S3"){
                                                            $("#nilai").val(350000);
                                                            } else if(a == "Penelitian" && e == "MAHASISWA ASING"){
                                                            $("#nilai").val(6000000);
                                                            } else if(a == "Penelitian" && e == "KARYAWAN / UMUM"){
                                                            $("#nilai").val(400000);
                                                            } else {
                                                            $("#nilai").val(0);
                                                            }
                                                        }
                                                    </script>  		
                                <label class="labeldata">Institusi</label>
                                    <input type="text" name="institusi" class="form-control" id="institusi" >
                                <label class="labeldata">Program Study</label>
                                    <input type="text" name="programstudy" class="form-control" id="programstudy" >
                                
                           
                                   
                            </div>
                            <div class="col">
                            
                            <label class="labeldata">Judul Penelitian</label>
                            <input type="text" name="judulpenelitian" class="form-control" id="judulpenelitian" >    
                            <label class="labeldata">Tempat Penelitian</label>
                                <input type="text" name="tempatpenelitian" class="form-control" id="tempatpenelitian" >

                                <div class="row g-2">
                                    <div class="col-md">
                                        <div class="form-floating">
                                        <label for="floatingInputGrid">Mulai Tanggal</label>
                                        <input type="date" class="form-control" name="tanggalmulai" id="tanggalmulai" required>
                                        </div>
                                    </div>	
                                    <div class="col-md">
                                        <div class="form-floating">
                                        <label for="floatingInputGrid">Sampai Tanggal</label>
                                        <input type="date" class="form-control" name="tanggalselesai" id="tanggalselesai" onkeypress="totale()" required>
                                        </div>
                                    </div>	
                                </div>
                                <script>
                                                function totalx(){
                                                    var x = document.getElementById("nilai").value;
                                                    var y = document.getElementById("bulan").value;
                                                    document.getElementById("total").value = (x) * (y);
                                                }
                                            </script>	
                                <div class="row g-2">
                                    <div class="col-md">
                                        <div class="form-floating">
                                        <label class="labeldata">Nilai</label>
                                    <input type="number" name="nilai" class="form-control" id="nilai" required readonly>
                                        </div>
                                    </div>	
                                    <div class="col-md">
                                        <div class="form-floating">
                                        <label class="labeldata" style="color: red;">Bulan ( Enter )</label>
                                        <input type="number" class="form-control" style="border:2px solid Tomato;" name="bulan" id="bulan" onkeypress="totalx()">
                                        </div>
                                    </div>	
                                </div>		
                                
                                
                                	
                                
                                <div class="form-floating">
                                    <label for="floatingTextarea2">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" style="height: 120px"></textarea>
                                </div>		
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <!-- Akhir Kolom 1 -->

                <!-- Awal Kolom 2 -->
                <div class="col-sm-3">
                    <div class="card" style="padding: 10px 10px;">
                        
                            <label class="labeldata">Total Bayar</label>

                                <input type="number" name="total" class="form-control" id="total" required>

                            <label class="labeldata">Terbilang</label>
                                <textarea type="text" name="terbilang" class="form-control" id="terbilang" required></textarea>
<br>
                                <!-- <input type="button" name="btntotal" class="btn btn-primary" id="btntotal" onclick="totale()" value="HITUNG"> -->
                                            
                            <!-- Modal simpan -->
                        <?php
                            include "simpandata.php" 
                        ?>
                        <!-- Akhir MODAL SIMPAN-->
                        </div>
                                                          
                        
                    </div>
                </div>
                  
                <!-- Akhir Kolom 2 -->

            </div>
        </div>
    </div>

</form>
</div>












            <!-- Footer -->
            <?php 
                include "footer.php";
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php
    include "logoutmodal.php"; 
    ?>
                                        
    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>

    <script src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.js"></script> 
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.bootstrap5.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script> 
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.html5.min.js"></script> 
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.print.min.js"></script> 
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.colVis.min.js"></script> 

    <script>
        Math.fmod = function (a,b) { return Number((a - (Math.floor(a / b) * b)).toPrecision(8)); };
        function terbilang(nilai) {
            const huruf = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
            let temp = "";
            if (nilai < 12) {
                temp = " "+ huruf[nilai];
            } else if (nilai <20) {
                temp = terbilang(nilai - 10)+ " Belas";
            } else if (nilai < 100) {
                temp = terbilang(Math.floor(nilai/10))+" Puluh"+ terbilang(nilai % 10);
            } else if (nilai < 200) {
                temp = " Seratus" + terbilang(nilai - 100);
            } else if (nilai < 1000) {
                temp = terbilang(Math.floor(nilai/100)) + " Ratus" + terbilang(nilai % 100);
            } else if (nilai < 2000) {
                temp = " Seribu" + terbilang(nilai - 1000);
            } else if (nilai < 1000000) {
                temp = terbilang(Math.floor(nilai/1000)) + " Ribu" + terbilang(nilai % 1000);
            } else if (nilai < 1000000000) {
                temp = terbilang(Math.floor(nilai/1000000)) + " Juta" + terbilang(nilai % 1000000);
            } else if (nilai < 1000000000000) {
                temp = terbilang(Math.floor(nilai/1000000000)) + " Milyar" + terbilang(Math.fmod(nilai,1000000000));
            } else if (nilai < 1000000000000000) {
                temp = terbilang(Math.floor(nilai/1000000000000)) + " Trilyun" + terbilang(Math.fmod(nilai,1000000000000));
            }     
            return temp;
        }

        var input = document.getElementById("bulan");
        input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
           event.preventDefault();
              const nilai = document.getElementById("total").value;
              let hasil = terbilang(nilai) + "Rupiah";
              document.getElementById("terbilang").value = hasil;
        }
        });
    </script>

    
</body>

</html>