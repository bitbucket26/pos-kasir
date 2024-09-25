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

    <title>Sewa Ruangan</title>

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
<form action="simpanppd.php" method="post">
<?php

    include "../koneksi.php";

    // Check connection
    if (mysqli_connect_error()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
    }

    $sql = mysqli_query($koneksi, "select max(nomor) as maxID from adminppd");
    $data = mysqli_fetch_array($sql) or die( mysqli_error($data));
    $kode = $data['maxID'];
    $kode++;
    $ket = "";
    $kodeautoabl = $ket . sprintf("%07s", $kode)
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pelatihan Peserta Didik</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <div class="row">
                <!-- Awal Kolom 1 -->
                <div class="col-sm-6">
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
                                        <label class="labeldata" >Tanggal</label>
                                        <?php $dt = new DateTime();
                                            echo '<input type="date" name="tanggalproses" class="form-control" id="tanggalproses" value="' .$dt->format('Y-m-d'). '" readonly>'
                                        ?>
                                        </div>
                                    </div>	
                                </div>
                                                <script>
                                                // function nilaii(e) {
                                                            
                                                //             // var e = (a) + (c);
                                                //             // var a = document.getElementById("perawatpendamping").value;
                                                //             console.log(e)
                                                //             // minimal 2 = om
                                                //             if (e == "YA"){
                                                //             $("#sewaaula").val(150000),$("#konsumsi").val(150000);
                                                //             } else {
                                                //             $("#honornarsum").val(0),$("#sewaaula").val(0),$("#konsumsi").val(0);
                                                //             }
                                                //         }
                                                // </script>
                                                <script>
                                                function totales(){
                                                    var a = document.getElementById("sewaaula").value;
                                                    var b = document.getElementById("konsumsi").value;
                                                    var c = document.getElementById("honornarsum").value;
                                                    
                                                    document.getElementById("total").value = parseInt(a) + parseInt(b) + parseInt(c);;
                                                }
                                            </script>
                                <label class="labeldata">Nama Institusi</label>
                                <input type="text" name="institusi" class="form-control" id="institusi" required>
                                <div class="row g-2">
                                    <div class="col-md">
                                        <div class="form-floating">
                                        <label class="labeldata">Sewa Aula</label>
                                        <input type="number" name="sewaaula" class="form-control" value="150000" id="sewaaula" readonly>
                                        </div>
                                    </div>	
                                    <div class="col-md">
                                        <div class="form-floating">
                                       
                                        <label class="labeldata">Konsumsi</label>
                                        <input type="number" name="konsumsi" class="form-control" value="150000" id="konsumsi" readonly>
                                        </div>
                                    </div>	
                                </div> 
                                <label class="labeldata" style="color: red;">Honor Narasumber (Enter)</label>
                                    <input type="number" name="honornarsum" style="border:2px solid Tomato;" class="form-control" id="honornarsum" onkeypress="totales()" required>
                               
                                		
                                
                            </div>
                        </div>
                    </div>
                    <br>
                   
                </div>
                <!-- Akhir Kolom 1 -->

                <!-- Awal Kolom 2 -->
                <div class="col-sm-6">
                    <div class="card" style="padding: 10px 10px;">
                    <label class="labeldata">Total</label>
                            <input type="number" name="total" class="form-control" id="total" readonly>
                    <label class="labeldata">Terbilang</label>
                            <textarea type="text" name="terbilang" class="form-control" id="terbilang" required></textarea>
                                <div class="form-floating">
                                    <label for="floatingTextarea2">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" style="height: 100px"></textarea>
                                </div>
                                <br>
                        <?php
                            include "simpandata.php" 
                        ?>
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

        var input = document.getElementById("honornarsum");
        input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
           event.preventDefault();
              const nilai = document.getElementById("total").value;
              let hasil = terbilang(nilai) + "Rupiah";
              document.getElementById("terbilang").value = hasil;
        }
        });
    </script>



<!-- <script type="text/javascript">
 
    // www.malasngoding.com
    function terbilang(nilai) {
      // deklarasi variabel nilai sebagai angka matemarika
      // Objek Math bertujuan agar kita bisa melakukan tugas matemarika dengan javascript
      nilai = Math.floor(Math.abs(nilai));
 
      // deklarasi nama angka dalam bahasa indonesia
      var huruf = [
        '',
        'Satu',
        'Dua',
        'Tiga',
        'Empat',
        'Lima',
        'Enam',
        'Tujuh',
        'Delapan',
        'Sembilan',
        'Sepuluh',
        'Sebelas',
        ];
 
      // menyimpan nilai default untuk pembagian
      var bagi = 0;
      // deklarasi variabel penyimpanan untuk menyimpan proses rumus terbilang
      var penyimpanan = '';
 
      // rumus terbilang
      if (nilai < 12) {
        penyimpanan = ' ' + huruf[nilai];
      } else if (nilai < 20) {
        penyimpanan = terbilang(Math.floor(nilai - 10)) + ' Belas';
      } else if (nilai < 100) {
        bagi = Math.floor(nilai / 10);
        penyimpanan = terbilang(bagi) + ' Puluh' + terbilang(nilai % 10);
      } else if (nilai < 200) {
        penyimpanan = ' Seratus' + terbilang(nilai - 100);
      } else if (nilai < 1000) {
        bagi = Math.floor(nilai / 100);
        penyimpanan = terbilang(bagi) + ' Ratus' + terbilang(nilai % 100);
      } else if (nilai < 2000) {
        penyimpanan = ' Seribu' + terbilang(nilai - 1000);
      } else if (nilai < 1000000) {
        bagi = Math.floor(nilai / 1000);
        penyimpanan = terbilang(bagi) + ' Ribu' + terbilang(nilai % 1000);
      } else if (nilai < 1000000000) {
        bagi = Math.floor(nilai / 1000000);
        penyimpanan = terbilang(bagi) + ' Juta' + terbilang(nilai % 1000000);
      } else if (nilai < 1000000000000) {
        bagi = Math.floor(nilai / 1000000000);
        penyimpanan = terbilang(bagi) + ' Miliar' + terbilang(nilai % 1000000000);
      } else if (nilai < 1000000000000000) {
        bagi = Math.floor(nilai / 1000000000000);
        penyimpanan = terbilang(nilai / 1000000000000) + ' Triliun' + terbilang(nilai % 1000000000000);
      }
 
      // mengambalikan nilai yang ada dalam variabel penyimpanan
      return penyimpanan;
    }
 
    // membuat event pada saat form angka di ketik
    document.getElementById("total").addEventListener("keyup", function(){
 
        // deklarasi id angka ke variabel input
        var input = document.getElementById("total").value;
 
        // menyimpan hasil terbilang ke variabel huruf;
        let huruf = terbilang(input) + " Rupiah" ;
 
        // menampilkan hasil terbilang ke id huruf
        document.getElementById("terbilang").innerHTML  = huruf;
    });
 
</script> -->
 
    
</body>

</html>