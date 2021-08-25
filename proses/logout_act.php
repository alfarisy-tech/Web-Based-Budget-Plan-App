<?php
session_start();
unset($_SESSION['usernamme']);
unset($_SESSION['password']);
session_destroy();
echo "<script>  alert('Anda berhasil keluar !'); location.href='../index' </script>";
