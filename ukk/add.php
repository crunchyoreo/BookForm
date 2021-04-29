<!DOCTYPE html>
<html>
<head>
	<title>Input Data</title>
</head>
<style>
	.sub
	{
  background-color: #AEB6BF;
  border: none;
  color: #283747;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 10px;
}
	.button {
  background-color: #AEB6BF;
  border: none;
  color: #283747;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  font-family: arial;
  margin-left: -130px;
  cursor: pointer;
  border-radius: 10px;
}
.form
{
	margin-top: 130px;
	margin-left: 360px;
    width: 500px;
    padding: 50px 0;
    color: white;
    box-shadow: 0 0 20px 2px rgba(0, 0, 0, 5);
    border-radius: 8px;
    background-color: #283747;
    font-family: cursive;
}
h2
{
	font-family: cursive;
}
</style>
<body>
	<hr>
	<div class="form">
	<form action="" method="POST" enctype="multipart/form-data">
		<center><table>
			<h2>Form Input Data</h2>
			<tr>
				<td>Judul</td>
				<td>:</td>
				<td><input type="text" name="judul"></td>
			</tr>
			<tr>
				<td>Pengarang</td>
				<td>:</td>
				<td><input type="text" name="pengarang"></td>
			</tr>
			<tr>
				<td>Penerbit</td>
				<td>:</td>
				<td><input type="text" name="penerbit"></td>
			</tr>
			<tr>
				<td>Gambar</td>
				<td>:</td>
				<td><input type="file" name="gambar"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="kirim" value="Submit" class="sub"></td>
				<td><a href="index.php" class="button">Back</a></td>
			</tr>
		</table>
		</center>
	</form>
	</div>
	<?php
include "conn.php";
if (isset($_POST['kirim']))
{
	$target = 'uploads/.'.basename($_FILES['gambar']['name']);

	$Judul = $_POST['judul'];
	$Pengarang = $_POST['pengarang'];
	$Penerbit = $_POST['penerbit'];
	$nama_file = $_FILES['gambar']['name'];
	$source = $_FILES['gambar']['tmp_name'];

	$add = mysqli_query($con, "insert into tb_ukk(judul, pengarang, penerbit, gambar) values('$Judul', '$Pengarang', '$Penerbit', '$nama_file')") or die (mysqli_error($con));

	move_uploaded_file($source, $target);

	if($add){
		header('Location: index.php');
	}else{
		echo "Upload Data Gagal";
	}	
}
?>
</body>
</html>