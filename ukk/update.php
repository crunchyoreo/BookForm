<?php
include "conn.php";
$id = $_POST['id'];
$Judul = $_POST['judul'];
$Pengarang = $_POST['pengarang'];
$Penerbit = $_POST['penerbit'];
$Gambar = $_POST['gambar'];

$update = mysqli_query($con, "UPDATE tb_ukk set judul='$Judul', pengarang='$Pengarang', penerbit='$Penerbit', gambar='$Gambar' where id='$id'") or die (mysqli_error($con));

if($update){
	echo "<script>alert('Data Berhasil Disimpan')</script>";
	echo "<script>window.location.href='index.php'</script>";

}else{
	echo "<script>alert('Data gagal Disimpan')</script>";
	echo "<script>window.location.href='index.php'</script>";
	
}
?>