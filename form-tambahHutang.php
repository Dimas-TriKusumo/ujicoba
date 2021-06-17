<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Tambah Data - Kitab Hutang</title>
  </head>
  <body>
            <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm fixed-top" style="background-color: #212529;">
        <div class="container">
            <a class="navbar-brand" href="homeadmin.php" style="color: white;">Kitab Hutang</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <form class="d-flex">
      <a class="nav-link" href="tambahHutang.php" style="color: white;">Kembali</a>
    </form>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="container">
        <h2 class="alert alert-primary text-center mt-5">Form Tambah Hutang</h2>
        <form action="tambahHutang.php" method="POST">
        <div class="form-group">
              <div class="form-group">
                  <input type="hidden" name="id" class="form-control" required>
              </div>

              <div class="form-group">
                <label">Nama</label>
                <input type="text" class="form-control" name="nama" required>
              </div>

              <div class="form-group">
                <label">Nominal</label>
                <input type="number" name="nominal" class="form-control" required>
              </div>

              <div class="form-group">
                <label">Tanggal Hutang</label>
                <input type="date" name="tanggalHutang" class="form-control" required>
              </div>

              <div class="form-group">
                <label">Alamat</label>
                <input type="text" name="alamat" class="form-control" required>
              </div>

              <div class="form-group">
                <label">Status</label>
                <input type="text" name="status" class="form-control" required>
              </div>

              <button type="submit" name="submit" class="btn btn-primary mt-3">Tambah</button>

            </div>
        </div>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>  