<?php 
date_default_timezone_set('Asia/Jakarta');
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

    <title>JR UMUM</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

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
                    <form action="simpan.php" method="post">
                    <?php
                        include "../koneksi.php";
         
                        // Check connection
                        if (mysqli_connect_error()){
                            echo "Koneksi database gagal : " . mysqli_connect_error();
                        }

                        $sql = mysqli_query($koneksi, "select max(nomornota) as maxID from admin");
                        $data = mysqli_fetch_array($sql) or die( mysqli_error($data));
                        $kode = $data['maxID'];
                        $kode++;
                        $ket = "";
                        $kodeauto = $ket . sprintf("%07s", $kode)
                    ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">JR - UMUM</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <div class="row">
                                    <!-- Awal Kolom 1 -->
                                    <div class="col-sm-9">
                                        <div class="card">
                                            <div class="row" style="padding: 10px 10px;">
                                                <div class="col">
                                                    <label class="labeldata" >No.Nota</label>
                                                        <input type="text" value="<?php echo $kodeauto;?>" name="nomornota" class="form-control" id="nomornota" readonly>
                                                    <label class="labeldata" >No.SEP</label>
                                                        <input type="text" name="nomorsep" class="form-control" id="nomorsep" required>					
                                                    <label class="labeldata" >Nama Pasien</label>
                                                        <input type="text" name="namapasien" class="form-control" id="namapasien" required>				
                                                    <label class="labeldata" >Alamat</label>
                                                        <textarea type="text" name="alamat" class="form-control" id="alamat" required></textarea>
                                                </div>
                                                <div class="col">
                                                    <label class="labeldata" >Ruang Perawatan</label>
                                                        <?php 
                                                            include "ruangan.php";
                                                        ?>
                                                    <label class="labeldata" for="hakrawatkelas">Hak Rawat Kelas</label>
                                                                <select name="hakrawatkelas" class="form-control" id="hakrawatkelas" required>
                                                                    <option value="X"></option>
                                                                    <option value="VIP">VIP</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                </select>
                                                    <label class="labeldata" >Mulai Tanggal</label>
                                                        <input type="date" class="form-control" name="mulaitanggal" id="mulaitanggal" required>
                                                    <label class="labeldata" >Sampai Tanggal</label>
                                                        <input type="date" class="form-control" name="sampaitanggal" id="sampaitanggal" required>
                                                </div>
                                                <div class="col">
                                                    <label class="labeldata" >Nomor Medrec</label>
                                                        <input type="number" class="form-control" name="nomormedrec" id="nomormedrec" required>
                                                    <label class="labeldata" >Dirawat Kelas</label>
                                                            <select name="dirawatkelas" class="form-control" id="dirawatkelas" required>
                                                                    <option value="X"></option>
                                                                    <option value="VIP">VIP</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                            </select>
                                                    <label class="labeldata" >Yang Membayar</label>
                                                        <input type="text" class="form-control" name="yangmembayar" id="yangmembayar" required>
                                                    <label class="labeldata" >Yang Menerima</label>
                                                        <input type="text" class="form-control" name="yangmenerima" id="yangmenerima" value="<?php echo $_SESSION['username']; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <!-- Akhir Kolom 1 -->

                                    <!-- Awal Kolom 2 -->
                                    <div class="col-sm-3">
                                        <div class="card">
                                            <div class="row" style="width: 100%; margin-left: 1px; padding: 10px 10px;">
                                                    <label class="labeldata" >Tanggal Bayar</label>
                                        
                                                    
                                                    
                                                    <?php $dt = new DateTime();
                                                       echo '<input type="date" name="tanggalbayar" class="form-control" id="tanggalbayar" value="' .$dt->format('Y-m-d'). '" readonly>'
                                                    ?>

                                                    <label class="labeldata" >Real Coast</label>

                                                        <input type="number" name="realcoast" class="form-control" id="jrumumrealcoast" onchange="jumlahjrumum()" required>

                                                    <label class="labeldata" style="color: red;">Ditanggung JR (Enter)</label>

                                                        <input type="number" style="border:2px solid Tomato;" name="ditanggungjr" class="form-control" id="tanggungjr" onkeypress="jumlahjrumum()" required>

                                                    <label class="labeldata" >TOTAL</label>

                                                        <input type="text" name="total" class="form-control" id="jrumumtotal" >
                                                    
                                                    <label class="labeldata" >Terbilang</label>           

                                                        <textarea type="text" name="bilang" class="form-control" id="jrumumterbilang" required></textarea>
                                                    
                                                        <input type="text" name="nota1" id="nota1jrumum" class="form-control" value="0" readonly hidden>
                                                    
                                                        <input type="text" name="nota2" id="nota2jrumum" class="form-control" value="0" readonly hidden>



                                                        <input type="number" name="realcoastbpjs" class="form-control" value="0" hidden>
                                                    <input type="number" name="tarifkelas1" class="form-control" value="0" hidden>
                                                    <input type="number" name="tarifkelas2" class="form-control"  value="0" hidden>
                                                    <input type="text" name="iduser" class="form-control" value="3" hidden>
                                                        <br>
                                            </div>
                                                                              
                                            <!-- Modal simpan -->
                                            <?php
                                                include "simpandata.php" 
                                            ?>
                                            <!-- Akhir MODAL SIMPAN-->
                                        </div>
                                    </div>
                                      
                                    <!-- Akhir Kolom 2 -->

                                </div>
                            </div>
                        </div>

                    </form>
                    </div>
                </div>
            </div>


        </div>
                <!-- /.container-fluid -->

                </div>

<!-- Footer -->
<?php 
    include "footer.php";
?>
<!-- End of Footer -->
</div>
</div>
            
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php
    include "logoutmodal.php" 
    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

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

        var input = document.getElementById("tanggungjr");
        input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
           event.preventDefault();
              const nilai = document.getElementById("jrumumtotal").value;
              let hasil = terbilang(nilai) + "Rupiah";
              document.getElementById("jrumumterbilang").value = hasil;
        }
        });
    </script>
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

        var input = document.getElementById("jrumumtotal");
        input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
           event.preventDefault();
              const nilai = document.getElementById("jrumumtotal").value;
              let hasil = terbilang(nilai) + "Rupiah";
              document.getElementById("jrumumterbilang").value = hasil;
        }
        });
    </script>

</body>

</html>