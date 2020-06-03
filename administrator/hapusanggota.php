<?php
include "koneksi.php";
$username=$_GET['username'];
$del="DELETE FROM users WHERE username='$username'";
$query=mysqli_query($conn,$del);
 

if($query){
?>
<script language="javascript">document.location.href="daftaranggota.php?daftaranggota";</script> <?php
}else{
echo "gagal hapus data";
}
?>
