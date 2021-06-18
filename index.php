<?php
//inisialisasi session
session_start();
 
//mengecek session
if( !isset($_SESSION['login']) ){
  $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
  header('Location: login.php');
}
 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Buku Hutang</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">KITAB HUTANG</a>
          <a class="navbar-brand" href="logout.php">Log Out</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>
   </div>

   <main>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Daftar Hutang </h1>
      <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">

      <form class="d-flex" method="post" enctype="multipart/form-data">
        <input class="form-control me-2" type="text" name="keyword" placeholder="Cari Komoditas" aria-label="Search" required>
        <button class="btn btn-outline-success" name="cari" type="submit">Cari</button>
      </form>
      </div>
      <div class="btn-group me-2">
        <button type="button" onclick= "tambahdata()" class="btn btn-sm btn-outline-secondary">
      <span data-feather="file"></span>
      Tambah Data
    </button>
    <button type="button" onclick= "refresh()" class="btn btn-sm btn-outline-secondary">
      <span data-feather="refresh-ccw"></span>
    </button>
    </div>
    <script>function tambahdata(){location.href = "form-tambahHutang.php";} </script>
    <script>function refresh(){location.href = "index.php";} </script>
    </div>
    </div>


  <!-- Table -->

   <div>
   <table class="table table-hover mt-3 " style="font-size: large;">
    <thead>
      <tr>
        <th style="visibility: hidden;">ID</th>
        <th>Nama</th>
        <th>Utang Pelanggan</th>
        <th>Date</th>
        <th>Alamat</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>

    <?php
    include 'koneksi.php';
      $no = 1;
      if(isset($_POST["cari"])){
      $search = mysqli_real_escape_string($con,$_POST['keyword']);
      $query = mysqli_query($con, "SELECT * FROM hutang WHERE nama LIKE '%$search%' ORDER BY nama ASC");    
      } else {
        $query = mysqli_query($con, "SELECT * FROM hutang ORDER BY nama ASC");
      }

      while ($row = mysqli_fetch_array($query)) {
      ?>
      <tr>
        <td style="visibility: hidden;"><?php echo $row['id'];?></td>
        <td><?php echo $row['nama'];?></td>
        <td>Rp.<?php echo $row['nominal'];?></td>
        <td><?php echo $row['tanggalHutang'];?></td>
        <td><?php echo $row['alamat']; ?></td>
        <td><?php echo $row['statusnya']; ?></td>
        <td>
          <a href="form-updateHutang.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-flat btn-sm"> <span data-feather="edit"></span> Edit</a>
        <?php
            }
        ?> 
      
    </tbody>
  </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>