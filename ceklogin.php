<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from users where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['role']=="admin"){
		session_start();
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/homeadmin.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['role']=="kasir1"){
		session_start();
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "kasir1";
		// alihkan ke halaman dashboard pegawai
		header("location:kasir1/homekasir1.php");
 
	// cek jika user login sebagai pengurus
	}else if($data['role']=="kasir2"){
		session_start();
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "kasir2";
		// alihkan ke halaman dashboard pengurus
		header("location:kasir2/homekasir2.php");

	// cek jika user login sebagai pengurus
	}else if($data['role']=="kasir3"){
		session_start();
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "kasir3";
		// alihkan ke halaman dashboard pengurus
		header("location:kasir3/homekasir3.php");

	// cek jika user login sebagai pengurus
	}else if($data['role']=="kasir4"){
		session_start();
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "kasir4";
		// alihkan ke halaman dashboard pengurus
		header("location:kasir4/homekasir4.php");

	// cek jika user login sebagai pengurus
	}else if($data['role']=="kasir5"){
		session_start();
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "kasir5";
		// alihkan ke halaman dashboard pengurus
		header("location:kasir5/homekasir5.php");

	}else if($data['role']=="diklat"){
		session_start();
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "diklat";
		// alihkan ke halaman dashboard pengurus
		header("location:diklat/home.php");
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
 
?>