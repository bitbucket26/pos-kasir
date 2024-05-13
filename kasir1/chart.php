                    <div class="col-xl-6">
                    <div class="card shadow mb-4">
                    <?php

include "../koneksi.php";
 
// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
                        $day = date ('d-m-Y'); 
                        $day1 = date ('d-m-Y',strtotime("-1 days"));
                        $day2 = date ('d-m-Y',strtotime("-2 days"));
                        $day3 = date ('d-m-Y',strtotime("-3 days"));
                        $day4 = date ('d-m-Y',strtotime("-4 days"));
                        $day5 = date ('d-m-Y',strtotime("-5 days"));
                        $day6 = date ('d-m-Y',strtotime("-6 days"));

                        if (empty($a)) {
                            echo "";
                            error_reporting(0);
                        } 
                        

                            $query = mysqli_query($koneksi,"SELECT sum(total) as total from kasir1 where DAY(tanggalbayar)= '$day' group by date(tanggalbayar)");
                            $row = $query->fetch_array();
                            $totals[] = $row['total'];
                         
                            $query1 = mysqli_query($koneksi,"SELECT sum(total) as total from kasir1 where DAY(tanggalbayar)= '$day1' group by date(tanggalbayar)");
                            $row1 = $query1->fetch_array();
                            $total1[] = $row1['total'];
                         
                            $query2 = mysqli_query($koneksi,"SELECT sum(total) as total from kasir1 where DAY(tanggalbayar)= '$day2' group by date(tanggalbayar)");
                            $row2 = $query2->fetch_array();
                            $total2[] = $row2['total'];
                           
                            $query3 = mysqli_query($koneksi,"SELECT sum(total) as total from kasir1 where DAY(tanggalbayar)= '$day3' group by date(tanggalbayar)");
                            $row3 = $query3->fetch_array();
                            $total3[] = $row3['total'];
                           
                            $query4 = mysqli_query($koneksi,"SELECT sum(total) as total from kasir1 where DAY(tanggalbayar)= '$day4' group by date(tanggalbayar)");
                            $row4 = $query4->fetch_array();
                            $total4[] = $row4['total'];
                           
                            $query5 = mysqli_query($koneksi,"SELECT sum(total) as total from kasir1 where DAY(tanggalbayar)= '$day5' group by date(tanggalbayar)");
                            $row5 = $query5->fetch_array();
                            $total5[] = $row5['total'];
                            
                            $query6 = mysqli_query($koneksi,"SELECT sum(total) as total from kasir1 where DAY(tanggalbayar)= '$day6' group by date(tanggalbayar)");
                            $row6 = $query6->fetch_array();
                            $total6[] = $row6['total'];

                            $query7 = mysqli_query($koneksi,"SELECT sum(total) as total from kasir1 where DAY(tanggalbayar)= '$day6' group by date(tanggalbayar)");
                            $row7 = $query7->fetch_array();
                            $total7[] = $row7['total'];
                        ?>
                        <div>
                        <canvas id="myCharts" style="position: relative; height:80vh; width:50vw; padding: 20px 20px;"></canvas>
                        </div>
                        
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <script>
                        const ctx = document.getElementById('myCharts');

                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                            labels: ['6 Hari Lalu','5 Hari Lalu','4 Hari Lalu','3 Hari Lalu','2 Hari Lalu','1 Hari lalu','Hari Ini'],
                            datasets: [{
                                label: 'Pendapatan 7 Hari Terakhir',
                                data: [<?php echo $total6['0']?>, <?php echo $total5['0'] ?>, <?php echo $total4['0'] ?>, <?php echo $total3['0'] ?>, <?php echo $total2['0'] ?>, <?php echo $total1['0'] ?>, <?php echo $totals['0'] ?>],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 205, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(201, 203, 207, 0.2)'
                                    ],
                                    borderColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(255, 159, 64)',
                                    'rgb(255, 205, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(54, 162, 235)',
                                    'rgb(153, 102, 255)',
                                    'rgb(201, 203, 207)'
                                    ],
                                borderWidth: 1
                            }]
                            },
                            options: {
                            scales: {
                                y: {
                                beginAtZero: true
                                }
                            }
                            }
                        });
                        </script>
                        </div>
                    </div>