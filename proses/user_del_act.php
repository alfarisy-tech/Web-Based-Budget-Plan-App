<?php 
include '../koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi,"DELETE FROM tbl_user WHERE id_user='$id'");
if ($data)
{
    echo "<script>  alert('Data User berhasil dihapus !!'); location.href='../user' </script>";

}
?>