<?php 
include '../koneksi.php';
if (isset($_POST['tambah'])){
    $kode_proyek=$_POST['id'];
    $judul=$_POST['judul'];
    $divisi=$_POST['divisi'];
    $tanggal=$_POST['tanggal'];

    $data = mysqli_query($koneksi,"INSERT INTO tbl_proyek SET kode_proyek='$kode_proyek',judul='$judul',divisi='$divisi',tanggal='$tanggal' ");
    if ($data)
    {
        echo "<script>  alert('Data Proyek berhasil ditambahkan !!'); location.href='../proyek' </script>";

    }
}


?>