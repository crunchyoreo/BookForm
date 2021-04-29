<?php
include "conn.php";
$id = $_GET['id'];
$query = mysqli_query($con, "DELETE FROM tb_ukk WHERE id='$id'");
if($query){
	echo "<script>alert('Data Berhasil Dihapus')</script>";
	echo "<script>window.location.href='index.php'</script>";
}else{
	echo "<script>alert('Data gagal Dihapus')</script>";
	echo "<script>window.location.href='index.php'</script>";
} 

?>