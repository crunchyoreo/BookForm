 <?php
    include "conn.php";
    $query_db = mysqli_query($con,"select * from tb_ukk");
    echo "<div style='text-align:right'>";
    echo "<h2><tr><a href='add.php'>Tambah Buku</a></tr></h2>";
    echo "<table border = '2' width='100%'>
    <caption><h1>Form Buku</h1></caption>
    
    <tr>
    <th>Judul</th>
    <th>Pengarang</th>
    <th>Penerbit</th>
    <th>Gambar</th>
    </tr>";

    while($data = mysqli_fetch_array($query_db)) {
        echo"<tr>";
        echo"<td>".$data['judul']."</td>";
        echo"<td>".$data['pengarang']."</td>";
        echo"<td>".$data['penerbit']."</td>";
        echo"<td><img src='uploads/.".$data['gambar']."'width='200'/></td>";
        echo"<td><a href='edit.php?id=".$data['id']."'>Edit</a> |
        <a href='delete.php?id=".$data['id']."'>Hapus</a></td>";
        echo"</tr>";
    }
    echo "</table>";
    mysqli_close($con);
?>