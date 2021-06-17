<?php
  //menyertakan file program koneksi.php pada register
require('koneksi.php');
//inisialisasi session
session_start();
 
$error = '';
$validate = '';
 
//mengecek apakah sesssion username tersedia atau tidak jika tersedia maka akan diredirect ke halaman index
if( isset($_SESSION['username']) ) header('Location: index.php');
 
//mengecek apakah form disubmit atau tidak
if( isset($_POST['submit']) ){
         
        
        //cara sederhana mengamankan dari sql injection
        $username = mysqli_real_escape_string($con, ($_POST['username']));
         //cara sederhana mengamankan dari sql injection
        $password = mysqli_real_escape_string($con, ($_POST['password']));
        
        //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
        if(!empty(trim($username)) && !empty(trim($password))){
 
            //select data berdasarkan username dari database
            $query      = "SELECT * FROM pengguna WHERE username ='$username'";
            $result     = mysqli_query($con, $query);
            $rows       = mysqli_num_rows($result);
 
            if ($rows != 0) {
                $hash   = mysqli_fetch_assoc($result)['password'];
                if(password_verify($password, $hash)){
                    $_SESSION['username'] = $username;
                    header('Location: index.php');
                }
                             
            //jika gagal maka akan menampilkan pesan error
            } else {
                $error =  'Register User Gagal !!';
            }
             
        }else {
            $error =  'Data tidak boleh kosong !!';
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
            <?php if($error != ''){ ?>
                <div class="alert alert-danger" role="alert"><?= $error; ?></div>
            <?php } ?>
            <div class="form-group">
                <label>Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Masukan Username Anda">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" id="InputPassword" name="password" class="form-control" placeholder="Masukan Password Anda">
                <?php if($validate != '') {?>
                            <p class="text-danger"><?= $validate; ?></p>
                        <?php }?>
            </div>

            <div class="form-footer mt-2">
              <p> Belum punya account? <a href="register.php">Register</a></p>
          </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
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