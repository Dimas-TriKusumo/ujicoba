<?php 

// membuat koneksi database
$con = mysqli_connect("localhost","root","","kitab_hutang");

// membuat fungsi untuk register akun
function register($infologin){
	global $con;
	
	$username = htmlspecialchars(stripcslashes($infologin["nama_pengguna"])) ;
	$password = mysqli_real_escape_string($con,$infologin["kata_sandi"]);
	$cpassword = mysqli_real_escape_string($con,$infologin["rekata_sandi"]);

	// melakukan pengecekan apakah username sudah terdaftar atau belum, jika belum dia berhasil registrasi
	// jika belum, dia akan gagal karena username sudah ada
	$cek = mysqli_query($con, "SELECT nama_pengguna FROM pengguna WHERE nama_pengguna = '$username' ");
	if (mysqli_num_rows($cek) > 0){
		echo "<script>alert('Username sudah ada !');</script>";
		return false;
	}

	// melakukan pengecekan apakah passwordnya sama atau tidak
	if ($password !== $cpassword) {
		echo "<script>alert('Password tidak sama !');</script>";
		return false;
	} 
	
	// implementasi password hash
	$password = password_hash($password, PASSWORD_DEFAULT);

	// jika berhasil data akan di masukan kedalam database
	$query = mysqli_query($con, "INSERT INTO pengguna (nama_pengguna, kata_sandi) VALUES ('$username','$password')");
	return mysqli_affected_rows($con);
	
}

// membuat fungsi untuk login akun
		function ceklogin($datalogin){
			global $con;
			$username = $datalogin["nama_pengguna"];
			$password = $datalogin["kata_sandi"];

			// mengecek user & password apakah ada atau tidak, cocok atau tidak
			$cekuser = mysqli_query($con, "SELECT * FROM pengguna WHERE nama_pengguna='$username'");
			if (mysqli_num_rows($cekuser) === 1){
				$hasil = mysqli_fetch_assoc($cekuser);
				if (password_verify($password,$hasil["kata_sandi"])){
					$_SESSION["user"] = $username;
					$_SESSION["login"] = true;
				}
				
				// jika username dan password tidak sama, maka akan muncul peringatan gagal
			} else {
				print "<p style=\"color:red; font-style: italic;\"> Username / Password Salah !</p>";
			}
		}

 ?>

