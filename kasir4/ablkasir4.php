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

    <title>Ambulance</title>

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
                <form action="simpanabl4.php" method="post">
                    <?php
                        include "../koneksi.php";
         
                        // Check connection
                        if (mysqli_connect_error()){
                            echo "Koneksi database gagal : " . mysqli_connect_error();
                        }

                        $sql = mysqli_query($koneksi, "select max(nomor) as maxID from abladmin");
                        $data = mysqli_fetch_array($sql) or die( mysqli_error($data));
                        $kode = $data['maxID'];
                        $kode++;
                        $ket = "";
                        $kodeautoabl = $ket . sprintf("%07s", $kode)
                    ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">AMBULANCE</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <div class="row">
                                    <!-- Awal Kolom 1 -->
                                    <div class="col-sm-9">
                                        <div class="card">
                                            <div class="row" style="padding: 10px 10px;">
                                                <div class="col">
                                                    <label class="labeldata">Nomor</label>
                                                        <input type="number" value="<?php echo $kodeautoabl;?>" name="nomor" class="form-control" id="nomor" readonly>				
                                                    <label class="labeldata">Tanggal</label>
                                                    <?php $dt = new DateTime();
                                                       echo '<input type="date" name="tanggal" class="form-control" id="tanggal" value="' .$dt->format('Y-m-d'). '" readonly>'
                                                    ?>				
                                                    <label class="labeldata">Nama</label>
                                                        <input type="text" name="nama" class="form-control" id="nama" required>				
                                                    <?php 
                                                        include "pilihalamat.php";
                                                    ?>
                                                    <label class="labeldata">Alamat KTP</label>
                                                        <input type="text" name="alamatktp" class="form-control" id="alamatktp" readonly>
                                                    <label class="labeldata">Alamat Tujuan</label>
                                                        <input type="text" name="alamattujuan" class="form-control" id="alamattujuan" readonly>
                                                </div>
                                                <div class="col">
                                                    <label class="labeldata">Perawat Pendamping</label>
                                                                <select name="perawatpendamping" class="form-control" id="perawatpendamping" onchange="nilaiy(this.value)" required>
                                                                    <option value="Tidak">Tidak</option>
                                                                    <option value="Satu Kota">Satu Kota</option>
                                                                    <option value="Satu Provinsi (Wil.3)">Satu Provinsi (Wil.3)</option>
                                                                    <option value="Satu Provinsi Diluar (Wil.3)">Satu Provinsi Diluar (Wil.3)</option>
                                                                    <option value="Beda Provinsi">Beda Provinsi</option>
                                                                </select>
                                                                

                                                    

                                                    <label class="labeldata">Nilai</label>
                                                        
                                                        <input type="number" name="nilaix" class="form-control" id="nilaix" readonly>
                                                        <script>
                                                        function nilaiy(e) {
                                                            
                                                            // var e = (a) + (c);
                                                            // var a = document.getElementById("perawatpendamping").value;
                                                            console.log(e)
                                                            // minimal 2 = om
                                                            if (e == "Satu Kota"){
                                                            $("#nilaix").val(80000);
                                                            } else if(e == "Satu Provinsi (Wil.3)"){
                                                            $("#nilaix").val(200000);
                                                            } else if(e == "Satu Provinsi Diluar (Wil.3)"){
                                                            $("#nilaix").val(340000);
                                                            } else if(e == "Beda Provinsi"){
                                                            $("#nilaix").val(440000);
                                                            } else {
                                                            $("#nilaix").val(0);
                                                            }
                                                            
                                                        }
                                                        </script>
                                                    <label class="labeldata" hidden>Perawat</label>
                                                                <select name="perawat" class="form-control" id="perawat" required hidden>
                                                                    <option value="-">-</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                </select>
                                                    <label class="labeldata">Ruangan</label>
                                                    <select name="ruangan" class="form-control" id="ruangan" required>
                                                        <option value="x"></option>
                                                        <option value="Kidang Kencana 1">Kidang Kencana 1</option>
                                                        <option value="Kidang Kencana 2">Kidang Kencana 2</option>
                                                        <option value="Kidang Kencana 3">Kidang Kencana 3</option>
                                                        <option value="Gincu1">Gincu 1</option>
                                                        <option value="Gincu2">Gincu 2</option>
                                                        <option value="Gincu3">Gincu 3</option>
                                                        <option value="Gincu4">Gincu 4</option>
                                                        <option value="Cengkir1">Cengkir 1</option>
                                                        <option value="Cengkir2">Cengkir 2</option>
                                                        <option value="Cengkir3">Cengkir 3</option>
                                                        <option value="Manalagi1">Manalagi 1</option>
                                                        <option value="Manalagi2">Manalagi 2</option>
                                                        <option value="Arumanis">Arumanis</option>
                                                        <option value="Golek">Golek</option>
                                                        <option value="Kidang Mas">Kidang Mas</option>
                                                        <option value="ICU">ICU</option>
                                                        <option value="HCU">HCU</option>
                                                        <option value="NICU">NICU</option>
                                                        <option value="Malgova">Malgova</option>
                                                    </select>
                                                    <label class="labeldata">Kasir</label>
                                                    <input type="text" class="form-control" name="kasir" id="kasir" value="<?php echo $_SESSION['username']; ?>" readonly>			
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
                                            <label class="labeldata" >Supir Ambulance</label>
                                                                <select name="supir" class="form-control" id="supir" required>
                                                                    <option value="-">-</option>
                                                                    <option value="H.Wastana">H.Wastana</option>
                                                                    <option value="Mustain Muis">Mustain Muis</option>
                                                                    <option value="Sae Syamsul Rifai">Sae Syamsul Rifai</option>
                                                                    <option value="Toto Miharjo">Toto Miharjo</option>
                                                                </select>
                                                <label class="labeldata">Jarak Tempuh (km)</label>
                                                    
                                                    <input type="number" name="jaraktempuh" class="form-control" id="jaraktempuh" readonly>
                                                
                                                <label class="labeldata">Nilai Tetap</label>
                                                    
                                                    <input type="number" name="nilaitetap" class="form-control" id="nilaitetap" value="70000" readonly hidden>

                                                <label class="labeldata">Total Bayar</label>

                                                    <input type="number" name="total" class="form-control" id="total" readonly>
                                                    <input type="button" name="btntotal" class="btn btn-primary" id="btntotal" onclick="totals()" value="HITUNG">
                                                                <script>
                                                                    function totals(){
                                                                        var a = document.getElementById("nilaix").value;
                                                                        var b = document.getElementById("jaraktempuh").value;
                                                                        var c = document.getElementById("nilaitetap").value;
                                                                        var d = 10000;
                                                                        var e = parseInt(a) + parseInt(c);
                                                                        document.getElementById("total").value = (b * d) + (e);
                                                                    }
                                                                </script>
                                                <br>
                                                <p><label class="labeldata" hidden>Terbilang</label>

                                                    <textarea type="text" name="bilang" class="form-control" id="bilang" readonly hidden></textarea>
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
    <!-- <script src="../vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="../js/demo/chart-area-demo.js"></script> -->
    <!-- <script src="../js/demo/chart-pie-demo.js"></script> -->

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

        var input = document.getElementById("btntotal");
        input.addEventListener("keypress", function(event) {
        if (event.key === "onchange") {
           event.preventDefault();
              const nilai = document.getElementById("total").value;
              let hasil = terbilang(nilai) + "Rupiah";
              document.getElementById("bilang").value = hasil;
        }
        });
    </script>
    <!-- <script>
        function hitungjarak() {
                        var a = document.getElementById("nilaix").value;
                        var b = document.getElementById("jaraktempuh").value;
                        document.getElementById("total").value = (a) * (b);
                        
                    }
    </script> -->

</body>

</html>