<?php 
	   include "../koneksi.php";
         
       if (mysqli_connect_error()){
           echo "Koneksi database gagal : " . mysqli_connect_error();
       }
	     
	   $no=1;
	   $data=mysqli_query($koneksi, "SELECT * FROM kasir5 WHERE nomornota IN (SELECT MAX(nomornota) FROM kasir5)");
	   while($e=mysqli_fetch_array($data)){


	if($e['kategori']=="jr1vip"){
		header('location:cetak1vip.php?idi=' .$e['nomornota']);

	}else if($e['kategori']=="jr2vip"){
		header('location:cetak2vip.php?idi=' .$e['nomornota']);

	// }else if($e['kategori']=="jrumum"){
	// 	header('location:cetakjrumum.php?idi=' .$e['nomornota']);

	}else if($e['kategori']=="bpjs1vip"){
		header('location:cetak1vip.php?idi=' .$e['nomornota']);

	}else if($e['kategori']=="bpjs2vip"){
		header('location:cetak2vip.php?idi=' .$e['nomornota']);

	}else if($e['kategori']=="bpjs21"){
		header('location:cetak21.php?idi=' .$e['nomornota']);

	}else if($e['kategori']=="kyw1vip"){
		header('location:cetak1vip.php?idi=' .$e['nomornota']);

	}else if($e['kategori']=="kyw2vip"){
		header('location:cetak2vip.php?idi=' .$e['nomornota']);

	}else if($e['kategori']=="kyw21"){
		header('location:cetak21.php?idi=' .$e['nomornota']);

	}else{
		echo("Gagal Cetak Nota");
	}	
	   }
?>