<?php
$host     = 'localhost';
$user     = 'root'; // diisi dengan user database kalian biasanya
                    // defaultnya bernama root jika kita belum 
                    // merubahnya
$password = '';  //diisi dengan password database kalian biasanya
                 // defaultnya kosong
$db       = 'kitab_hutang'; //diisi dengan nama database kalian
  
$con = mysqli_connect($host, $user, $password, $db) or die(mysqli_error());

$query="SELECT * FROM hutang";
$result=$con->query($query)
    or die ($con->error);

$response = array();
$posts = array();
while($row=$result->fetch_assoc()){
$id=$row['id'];
$nama=$row['nama'];
$nominal=$row['nominal'];
$tanggal=$row['tanggalHutang'];
$alamat=$row['alamat'];
$statusnya=$row['statusnya'];
$posts[] = array(
    'names' => $nama,
    'nominalnya' => $nominal,
    'tanggalHutang' => $tanggal,
    'alamatadd' => $alamat,
    'statusnyaapa' => $statusnya
);
}
$response = $posts;

$fp = fopen('data-api-hutang.json', 'w');
fwrite($fp, json_encode($response, JSON_PRETTY_PRINT));
fclose($fp);
    header( 'Location: https://localhost/kitabhutang/data-api-hutang.json');
?>