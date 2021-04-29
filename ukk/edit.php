<?php
include "conn.php";
$id = $_GET['id'];
$query_mysql = mysqli_query($con, "select * from tb_ukk where id='$id'");
$data = mysqli_fetch_array($query_mysql);
?>
<head>
    <style>
        .forms
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
    .button {
  background-color: #AEB6BF;
  border: none;
  color: #283747;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin-left: 100px;
  margin-top: -47px;
  cursor: pointer;
  border-radius: 30px;
}
h2
{
    text-align: center;
    font-family: cursive;
}
   .edits {
  background-color: #AEB6BF;
  border: none;
  color: #283747;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-family: cursive;;
  font-size: 20px;
  margin-left: 0px;
  cursor: pointer;
  border-radius: 30px;
}
    </style>
</head>
<body>
    <hr>
    <div class="forms">
    <form action="" method="POST" enctype="multipart/form-data">
        <center><table>
            <h2>Form Buku</h2>
            <tr>
                <td>Judul</td>
                <td>:</td>
                <td><input type="text" name="judul" value="<?php echo $data['judul'] ?>"></td>
            </tr>
            <tr>
                <td>Pengarang</td>
                <td>:</td>
                <td><input type="text" name="pengarang" value="<?php echo $data['pengarang'] ?>"></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td>:</td>
                <td><input type="text" name="penerbit" value="<?php echo $data['penerbit'] ?>"></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td>:</td>
                <td><?php echo"<span><img src='uploads/.".$data['gambar']."'width='200'/></span>";?>
                <td><input type="file" name="gambar"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                    <input type="submit" name="kirim" value="Edit" class="edits">
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><a href="index.php" style="text-decoration:none" class="button">Home</a></td>
            </tr>
        </table>
    </center>   
    </form>
    </div>

        <?php 
        if (isset($_POST['kirim'])) {
            $target = 'uploads/.'.basename($_FILES['gambar']['name']);
            $old_file = $data['gambar'];
            
            $id=$_POST['id'];
            $Judul=$_POST['judul'];
            $Pengarang=$_POST['pengarang'];
            $Penerbit=$_POST['penerbit'];
            $nama_file = $_FILES['gambar']['name'];
            $source = $_FILES['gambar']['tmp_name'];
            
            if($nama_file != ""){
                move_uploaded_file($source, $target);
            }else{
                $nama_file = $old_file;
            }

            $add = mysqli_query($con, "update tb_ukk set judul='$Judul', pengarang='$Pengarang', penerbit='$Penerbit', gambar='$nama_file' where id='$id'");

            if ($add) {
                header('Location: index.php');
            }else{
                echo "Gagal upload";
            }
        }
        ?>
    <?php  ?>
</body>
