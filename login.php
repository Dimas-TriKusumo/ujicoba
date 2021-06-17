<?php
session_start();

require 'koneksi.php';
   if(isset($_POST["login"])){
	   ceklogin($_POST);
   }

   function ceklogin($datalogin){
	   global $conn;
	   $username = $datalogin["username"];
	   $password = $datalogin["password"];

	   $cekuser = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '$username'");

	   if(mysqli_num_rows($cekuser) === 1){

		   $hasil = mysqli_fetch_assoc($cekuser);

		   if(password_verify($password,$hasil["password"])){
			   $_SESSION["user"] = $username;
			   $_SESSION["login"] = true;

			   if(isset($datalogin["rememberme"])){
				   setcookie("login","tetap_ingat", time()+30);
			   } else {
				   echo "cookie belum dibuat";
			   }
			   echo "<script>alert('Anda Berhasil Login!'); document.location.href='index.php';</script>";
		   }
	   } else {
		   print "<p style=\"color:red; font-style: italic;\"> Username atau Password Salah!</p>";
	   }
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

        <form action="login.php" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Masukan Username Anda">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" id="InputPassword" name="password" class="form-control" placeholder="Masukan Password Anda">
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