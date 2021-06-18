<?php
//inisialisasi session
session_start();
 
//mengecek session
if( !isset($_SESSION['login']) ){
  $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
  header('Location: login.php');
}
 
?>

<?php
include("koneksi.php");

if(isset($_POST['tambah'])){
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $nominal = mysqli_real_escape_string($con, $_POST['nominal']);
    $tanggal = mysqli_real_escape_string($con, $_POST['tanggalHutang']);
    $alamat = mysqli_real_escape_string($con, $_POST['alamat']);
    $statusnya = mysqli_real_escape_string($con, $_POST['statusnya']);

    //buat query
    $sql = "INSERT INTO hutang (nama, nominal, tanggalHutang, alamat, statusnya) VALUE ('$nama','$nominal','$tanggal','$alamat','$statusnya')";
    $query = mysqli_query($con, $sql);

    //pengecekan query
    if($query){
        ?>
        <script type="text/javascript">alert('Data Berhasil Ditambahkan!'); document.location.href='index.php';</script>
        <?php
    } else {
        ?>
        <script type="text/javascript">alert('Data Gagal Ditambahkan!'); document.location.href='index.php';</script>
        <?php
    }
} else {
    die("Akses Dilarang/gagal");
}

?>