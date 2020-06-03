<?php 
    require_once("headerpage.php");
?>

<?php
include "koneksi.php";
$p_id=$_GET['p_id'];
$select='SELECT * FROM products WHERE p_id="'.$p_id.'"';
$query=mysqli_query($conn,$select);
?>
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="viewproducts.php">View Products</a>
        </li>
        <li class="breadcrumb-item active">Edit Products</li>
</ol>

<div class="row">
        <div class="col-12">
          <h1>Edit Products</h1>

        </div>


        
<form action="ubahproducts.php" method="post" id="frmbis" role="form" class="form-horizontal" style="margin-left:1cm">
                
<?php
while($row=mysqli_fetch_array($query)){
?>

<input type="hidden" name="p_id" value="<?php echo $p_id;?>"/>
<div class="form-group"> 
            <label>Product Name : </label>
                <input type="text" name="p_name" class="form-control" id="p_name" value="<?php echo $row['p_name'];?>" >
        </div>
        <div class="form-group">
            <label>Product Description :</label>
                <textarea type="text" name="p_desc" class="form-control" id="p_desc" rows="5" COLS="50"><?php echo $row['p_desc'];?></textarea>
        </div>  
        <div class="form-group">
            <label>Price :</label>
                <input type="number" name="p_price" class="form-control" id="p_price" value="<?php echo $row['p_price'];?>">
        </div>
              <div class="form-group">
                <label>Stock :</label>
                    <input type="number" name="stock" class="form-control" id="stock" value="<?php echo $row['stock'];?>">
            </div>
            <div class="form-group">
            <label>Category :</label>
                <input type="text" name="p_type" class="form-control" id="p_type" value="<?php echo $row['p_type'];?>">
        </div>

              <div class="form-group" style="float : right">  
                                    
              
                    <button type="submit" class="btn btn-primary">Update</button> <button type="button" class="btn btn-danger">Cencel</button>
                   </div>
            </div> 

<?php
}
?>
        </form>
        
        

       <?php 
    require_once("footerpage.php");
?>    
            </table>
            
   </div>
