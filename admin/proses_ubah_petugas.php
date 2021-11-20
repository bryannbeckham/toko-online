<?php
    $id_produk = $_POST['id_petugas'];
    $nama_produk = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    
    include "koneksi.php";
    $input = mysqli_query($koneksi, "UPDATE petugas SET nama_petugas='".$nama_petugas."', username='".$username."', password='".md5($password)."', level='".$level."' where id_petugas = '".$id_petugas."'");

    if ($input) {
        echo "<script>alert('Berhasil');location.href='tampil_petugas.php';</script>";
    }
    else {
        echo "<script>alert('Gagal');location.href='tampil_petugas.php';</script>";
    }
?>