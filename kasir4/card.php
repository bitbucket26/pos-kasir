
<?php
 
// $servername = "localhost";
// $database = "kasir";
// $username = "root";
// $password = "";
// $koneksi = mysqli_connect("localhost","root","","kasir");
include "../koneksi.php";
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

$day_sesi = date ('Y-m-d'); 

 $query_sesi = mysqli_query($koneksi,"SELECT sum(total) as total from kasir4 where (tanggalbayar)= '$day_sesi'");
 $row_sesi = $query_sesi->fetch_array();
 $total_sesi[] = $row_sesi['total'];

 ?>
 
            <div class="row">
                <div class="card border-left-info shadow h-100 py-2 align-items-left" style="margin-left: 32px; margin-bottom: 20px; padding: 10px; width: 30%;">
                    <div class="card-body">
                        <h1 class="card-title text-primary"><?php echo $_SESSION['username'];?></h1>
                        <h6 class="card-text">Pendapatan Kasir Hari Ini</h6>
                        <h3 class="card-text text-end">Rp.<?php echo number_format($total_sesi[0]);?></h3>
                    </div>
                </div>
            </div>