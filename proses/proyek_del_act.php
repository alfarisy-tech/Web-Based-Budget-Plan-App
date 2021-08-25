<?php 
include '../koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi,"DELETE FROM tbl_proyek WHERE kode_proyek='$id'");
if ($data)
{
    echo "<script>  alert('Data Proyek berhasil dihapus !!'); location.href='../proyek' </script>";

}
?>