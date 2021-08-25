<?php 
include '../koneksi.php';
if (isset($_POST['tambah'])){
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $nama=$_POST['nama'];
    $role=$_POST['role'];

    $data = mysqli_query($koneksi,"INSERT INTO tbl_user SET username='$username',password='$password',nama='$nama',role='$role' ");
    if ($data)
    {
        echo "<script>  alert('Data user berhasil ditambahkan !!'); location.href='../user' </script>";

    }
}


?>