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
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $nominal = mysqli_real_escape_string($con, $_POST['nominal']);
    $tanggal = mysqli_real_escape_string($con, $_POST['tanggalHutang']);
    $alamat = mysqli_real_escape_string($con, $_POST['alamat']);
    $statusnya = mysqli_real_escape_string($con, $_POST['statusnya']);

    //buat query
    $sql = "UPDATE hutang SET nama ='$nama', nominal='$nominal', tanggalHutang='$tanggal', alamat='$alamat', statusnya='$statusnya' WHERE id=$id";
    $query = mysqli_query($con, $sql);

    //pengecekan query
    if($query){
        ?>
        <script type="text/javascript">alert('Data Berhasil Diupdate!'); document.location.href='index.php';</script>
        <?php
    } else {
        ?>
        <script type="text/javascript">alert('Data Gagal Diupdate!'); document.location.href='index.php';</script>
        <?php
    }
} else {
    die("Akses Dilarang/gagal");
}

?>