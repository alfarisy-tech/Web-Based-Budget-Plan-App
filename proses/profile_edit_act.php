<?php 
include '../koneksi.php';
if (isset($_POST['edit'])){
	$id=$_POST['id'];

    $username=$_POST['username'];
    $nama=$_POST['nama'];
    $role=$_POST['role'];

    $data = mysqli_query($koneksi,"UPDATE  tbl_user SET username='$username',nama='$nama',role='$role' WHERE id_user='$id' ");
    if ($data)
    {
        echo "<script>  alert('Data profil berhasil diubah !!'); location.href='../profile' </script>";

    }
}


?>