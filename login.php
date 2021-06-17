<?php

// menjalankan session
session_start();

// melakukan pengecekan pada login
require 'login-action.php';
if (isset($_POST["login"])){
		ceklogin($_POST);
}

// melakuakn pengecekan session
if (isset($_SESSION["login"])) {
  echo "<script>document.location.href='index.php';</script>";
  exit;
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
    <link rel="stylesheet" href="login.css">

    <title>Login</title>
  </head>
  <body>
    <div class="container">
        <h4 class="text-center">Form Login</h2>
        <hr>

        <form action="" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" id="nama_pengguna" name="nama_pengguna" class="form-control" placeholder="Masukan Username Anda" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" id="kata_sandi" name="kata_sandi" class="form-control" placeholder="Masukan Password Anda" required>
            </div>

            <div class="form-footer mt-2">
              <p> Belum punya account? <a href="register.php">Register</a></p>
          </div>

            <button type="submit" name="login" class="btn btn-primary btn-block">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
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