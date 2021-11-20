<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Daftar Produk</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

  </head>
  <body>
    <header>
    <?php
        include "navbar.php";
    ?>
    </header>

    <main>
    <section class="py-5 text-center container">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Daftar Produk</h1>
            <p class="lead text-muted">Silakan cari Produk</p>
            <form method="POST" action="produk.php" class="d-flex">
                    <input class="form-control me-2" type="search" name="cari"
                    placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php
          include "koneksi.php";
          if (isset($_POST['cari'])) {
              $cari = $_POST['cari'];
              $query_produk = mysqli_query($koneksi, "select * from produk where id_produk = '$cari' or nama_produk like '%$cari%'");
          }
          else{
              $query_produk = mysqli_query($koneksi, "select * from produk");
          }
          while($data_produk = mysqli_fetch_array($query_produk)){
          ?>  
          <div class="col">
            <div class="card shadow-sm">
                <img src="../admin/foto/<?=$data_produk['foto_produk']?>" class="bd-placeholder-img card-img-top" width="150px" height="200px" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                <rect width="199%" height="100%" fill="#55595c"/></img>

                <div class="card-body">
                <p class="card-text"><b><?=$data_produk['nama_produk']?></b></p>
                <p class="card-text"><?=$data_produk['deskripsi']?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a href="beli_produk.php?id_produk=<?=$data_produk['id_produk']?>" type="button" class="btn btn-sm btn-outline-secondary">beli</a>
                    </div>
                    <medium class="text-muted"><?=$data_produk['harga']?></medium>
                </div>
                </div>
            </div>
            </div>
          <?php
          }
          ?>
        </div>
        </div>
    </div>

    </main>
    
    
      
  </body>
</html>