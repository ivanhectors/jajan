<?php
include "koneksi.php";
$id_artikel=$_GET['id_artikel'];
$del="DELETE FROM artikel WHERE id_artikel='$id_artikel'";
$query=mysqli_query($conn,$del);


if($query){
?>
<script language="javascript">document.location.href="lihatartikel.php?lihatartikel";</script> <?php
}else{
echo "gagal hapus data";
}
?>
