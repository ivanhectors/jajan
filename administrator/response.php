<?php
include('koneksi.php');
 
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM products ORDER BY p_id ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($conn, $sql); 
?>

<?php  
while ($row = mysqli_fetch_assoc($rs_result)) {
?>  
<div class="clearfix card" style="width: 20rem;">
 <img class="card-img-top" src="http://placehold.it/150x100" alt="">
 <div class="card-body">
   <h4 class="card-title"><?php echo $row['productName']?></h4>
   <p class="card-text"><?php echo $row['productLine']?></p>
 </div>
 <div class="card-footer">
   <a href="#" class="btn btn-primary">Find Out More!</a>
 </div>
</div>  
<?php  
};  
?>