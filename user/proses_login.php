<?php
    if ($_POST) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        echo $username.$password;

        include "koneksi.php";
        $query_login=mysqli_query($koneksi,"SELECT * FROM pelanggan where username = '".$username."'");
        echo mysqli_num_rows($query_login);
        if (mysqli_num_rows($query_login)>0) {
            $data_login = mysqli_fetch_array($query_login);
            session_start();
            $_SESSION['id_petugas']=$data_login['id_petugas'];
            $_SESSION['username']=$data_login['username'];
            $_SESSION['status_petugas']=true;
            echo "<script>alert('Login Berhasil');location.href='produk.php';</script>";
        }
        else{
            echo "<script>alert('Login Gagal');location.href='index.php';</script>";
        }
    }
?>