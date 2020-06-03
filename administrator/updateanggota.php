<?php
include "koneksi.php";
$username = $_POST['username'];
$pasword = $_POST['kunci'];
$nama = $_POST['nama'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$jabatan = $_POST['jabatan'];


$edit='UPDATE users SET kunci="'.$pasword.'", nama="'.$nama.'", dob="'.$dob.'", email="'.$email.'", jabatan="'.$jabatan.'" WHERE username="'.$username.'"';
$query=mysqli_query($conn,$edit);

if($query){
header ('location: daftaranggota.php');
}else{
echo "Gagal update data";

}
?>