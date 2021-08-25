 <?php
 if (isset($_POST['pass'])) {
        $a = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE id_user='" . $_SESSION['id_user'] . "' ");
        $b = mysqli_fetch_array($a);
        $c = $b['password'];
        $d = md5($_POST['pl']);
        if ($c == $d) {
            $e = mysqli_query($koneksi, "UPDATE tbl_user SET password='" . md5($_POST['pb']) . "' WHERE id_user = '" . $b['id_user'] . "' ");
            if ($e) {
        echo "<script>  alert('Data Password berhasil diubah !!'); location.href='../profile' </script>";
            }
        } else {
        echo "<script>  alert('Data Password Gagal diubah !!'); location.href='../profile' </script>";
        }
    }