<?php 
    /*if(!isset($_SESSION["username"])){
        header("Location: /ukdwstore/loginform.php");
    }*/
    require_once("headerpage.php");
?>
 
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Add Product's</li>
</ol>
<div class="row">
    <div class="col-6">
        <h3>Add New Product's</h3>
        <form action="prosestambahproduk.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="p_name">Product Name:</label>
                <input type="text" class="form-control" name="p_name">
            </div>
            <div class="form-group">
                <label for="p_desc">Product Description :</label>
                <textarea class="form-control" name="p_desc" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="p_price">Price :</label>
                <input type="number" class="form-control" name="p_price">
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" class="form-control" name="stock">
            </div>
            <div class="form-group">
                <label for="p_type">Category :</label>
                <input type="option" class="form-control" name="p_type">
            </div>
            <div class="form-group">
                <label for="fileToUpload">Image :</label>
                <input type="file" name="fileToUpload">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>

<?php 
    require_once("footerpage.php");
?>