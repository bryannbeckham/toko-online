<?php
    $id_produk = $_POST["id_produk"];
    $nama_produk = $_POST["nama_produk"];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    
    include "koneksi.php";
    if ($_FILES['foto']['tmp_name']) {
        $temp = $_FILES['foto']['tmp_name'];
        $type = $_FILES['foto']['type'];
        $size = $_FILES['foto']['size'];
        $name = rand(0,9999).$_FILES['foto']['name'];
        $folder = "foto/";

        if ($size < 2048000 and ($type =='image/jpeg' or $type == 'image/png'))
        {
            $query_foto = mysqli_query($koneksi, "SELECT * FROM produk where id_produk = '".$_POST['id_produk']."'");
            $data_foto = mysqli_fetch_array($query_foto);
            unlink('foto/'.$data_foto['foto_produk']);
            
            move_uploaded_file($temp, $folder . $name);
            $input = mysqli_query($koneksi, "UPDATE produk SET 
            nama_produk='".$nama_produk."', deskripsi='".$deskripsi."',
            harga='".$harga."', foto_produk='".$name."'
            where id_produk='".$id_produk."'");

            // if ($input) {
            //     echo "<script>alert('Berhasil');location.href='tampil_produk.php';</script>";
            // }
            // else {
            //     echo "<script>alert('Gagal');location.href='tampil_produk.php';</script>";
            // }
        }
    }
    else{
        $input = mysqli_query($koneksi, "UPDATE produk SET nama_produk='".$nama_produk."', 
        deskripsi='".$deskripsi."', harga='".$harga."' where id_produk='".$id_produk."'");

        if ($input) {
            echo "<script>alert('Berhasil');location.href='tampil_produk.php';</script>";
        }
        else {
            echo "<script>alert('Gagal');location.href='tampil_produk.php';</script>";
        }
    }
    
?>