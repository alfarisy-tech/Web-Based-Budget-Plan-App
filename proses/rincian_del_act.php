<?php 
include '../koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi,"DELETE FROM tbl_rincian WHERE id_rincian='$id'");
if ($data)
{
    echo "<script>  alert('Data Rincian berhasil dihapus !!'); location.href='../rincian' </script>";

}
?>