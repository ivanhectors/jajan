<?php
include "koneksi.php";
$p_id=$_GET['p_id'];
$del="DELETE FROM products WHERE p_id='$p_id'";
$query=mysqli_query($conn,$del);


if($query){
?>
<script language="javascript">document.location.href="viewproducts.php?viewproducts";</script> <?php
}else{
echo "gagal hapus data";
}
?>