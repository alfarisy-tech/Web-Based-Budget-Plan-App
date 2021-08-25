<?php 
include '../koneksi.php';
if (isset($_POST['edit'])){

    $kode_proyek=$_POST['id'];
    $judul=$_POST['judul'];
    $divisi=$_POST['divisi'];
    $tanggal=$_POST['tanggal'];
    
    $data = mysqli_query($koneksi,"UPDATE tbl_proyek SET judul='$judul',divisi='$divisi',tanggal='$tanggal' WHERE kode_proyek='$kode_proyek' ");
    if ($data)
    {
        echo "<script>  alert('Data Proyek berhasil diubah !!'); location.href='../proyek' </script>";

    }
}


?>