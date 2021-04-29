<?php

$con = mysqli_connect("localhost", "root", "", "ukk");
if (mysqli_connect_errno()){
	echo "koneksi database gagal : " . mysqli_connect_error(); 
}
?>
