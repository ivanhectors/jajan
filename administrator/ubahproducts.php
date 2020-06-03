<?php
include "koneksi.php";
$p_id = $_POST['p_id'];
$p_name = $_POST['p_name'];
$p_price = $_POST['p_price'];
$p_desc = $_POST['p_desc'];
$stock = $_POST['stock'];
$p_type = $_POST['p_type'];




$sql="UPDATE products SET p_type='".$_POST['p_type']."', p_desc='".$_POST['p_desc']."', p_name='".$_POST['p_name']."', p_price='".$_POST['p_price']."', stock='".$_POST['stock']."' WHERE p_id='".$_POST['p_id']."'";

$query=mysqli_query($conn,$sql);

if($query){
header ('location: viewproducts.php');
}else{
echo "Gagal update data";

}
?>