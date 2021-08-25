<?php 
include '../koneksi.php';
if (isset($_POST['edit'])){
    $id_rincian=$_POST['id_rincian'];
    $bahan=$_POST['bahan'];
    $satuan=$_POST['satuan'];
    $harga=$_POST['harga'];
    $jumlah=$_POST['jumlah'];
    $total=$harga*$jumlah;

    $data = mysqli_query($koneksi,"UPDATE  tbl_rincian SET bahan='$bahan',satuan='$satuan',harga='$harga',jumlah='$jumlah',total='$total' WHERE id_rincian='$id_rincian' ");
    if ($data)
    {
        echo "<script>  alert('Data Rincian Proyek berhasil Diubah !!'); location.href='../rincian' </script>";

    }
}


?>