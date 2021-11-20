<?php 
    include "koneksi.php";

    $sql = "select * from pelanggan";
    $result = $koneksi->query($sql);

    foreach($result as $result){
        $nama = $_POST["nama"];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $username = $_POST['username'];
        $password = $_POST['password'];
    }


?>