<?php
    if ($_GET['id_petugas']) {
        include "koneksi.php";
        $query_hapus = mysqli_query($koneksi, "DELETE FROM petugas where id_petugas = '".$_GET['id_petugas']."'");
        if ($query_hapus) {
            // echo "berhasil";
            echo "<script> alert('Berhasil dihapus'); location.href='tampil_petugas.php'; </script>";
        }
        else{
            // echo "gagal";
            echo "<script> alert ('Gagal dihapus'); location.href='tampil_petugas.php'; </script>";
        }
    }
    else{
        echo "id_tidak ada";
    }
?>