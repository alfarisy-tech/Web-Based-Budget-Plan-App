<?php 
include '../koneksi.php';
if (isset($_POST['tambah'])){
    $id_proyek=$_POST['id_proyek'];
    $bahan=$_POST['bahan'];
    $satuan=$_POST['satuan'];
    $harga=$_POST['harga'];
    $jumlah=$_POST['jumlah'];
    $total=$_POST['total'];

    $data = mysqli_query($koneksi,"INSERT INTO tbl_rincian SET id_proyek='$id_proyek',bahan='$bahan',satuan='$satuan',harga='$harga',jumlah='$jumlah',total='$total' ");
    if ($data)
    {
        echo "<script>  alert('Data Rincian Proyek berhasil ditambahkan !!'); location.href='../rincian' </script>";

    }
}


?>