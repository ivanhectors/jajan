<?php
include "koneksi.php";
$kritikid=$_GET['kritikid'];
$del="DELETE FROM kritik WHERE kritikid='$kritikid'";
$query=mysqli_query($conn,$del);


if($query){
?>
<script language="javascript">document.location.href="kritik.php?kritik";</script> <?php
}else{
echo "gagal hapus data";
}
?>
