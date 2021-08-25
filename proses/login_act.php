<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include '../koneksi.php';

// menangkap data yang dikirim dari form login
$username = mysqli_escape_string($koneksi, $_POST['username']);
$password = mysqli_escape_string($koneksi, md5($_POST['password']));


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "select * from tbl_user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

    $data = mysqli_fetch_array($login);

    // cek jika user login sebagai admin
    if ($data['role'] == "admin" or $data['role'] == "user" or $data['role'] == "pimpinan"  ) {

        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['role'] = $data['role'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['id_user'] = $data['id_user'];
        // alihkan ke halaman dashboard admin
        echo "<script> location.href='../home' </script>";
    }
} else {
    echo "<script>  alert('Username atau Password yang Anda masukkan salah!'); location.href='../index' </script>";

}
