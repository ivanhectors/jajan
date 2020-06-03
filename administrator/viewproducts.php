<?php
require_once("koneksi.php");
require_once("headerpage.php");
?>
<style>
.pagination {

}

.pagination a {
    color: black;
    float: right;
	margin-left: 20px;
	border: 1px solid #ddd;
    padding: 5px 14px;
	background: #e9ecef;

} 
.pagination a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}
.pagination a:hover:not(.active) {
	background-color: #343a40;
	color : #fff;
	
	}
.pagination ul {
    color: black;
    float: left;
    padding: 8px 16px;

}
</style>

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">View Product's</li>
</ol>
<h4 style="text-align:center;">All Product's</h4>
<hr>
<div class="row">
  
        <?php 
            $limit = 6;  
            if (isset($_GET["page"])) { 
                $page  = $_GET["page"]; 
            } else { 
                $page=1; 
            };
            
            $start_from = ($page-1) * $limit;  
            $sql = "SELECT p_id,p_name,p_desc,p_price,stock,p_image FROM products ORDER BY p_name ASC LIMIT ?,?";  
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $start_from, $limit);
            $stmt->execute();
            $stmt->bind_result($ProdukID,$NamaProduk,$Deskripsi,$HargaJual,$stock,$Gambar);
        ?>
        <?php while($stmt->fetch()) { ?>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3">
                        <img src="../<?=$Gambar?>" width="100" />
                    </div>
                    <div class="col-md-9">
                        <strong><?=$NamaProduk?></strong>
						<hr>
                        <p style="font-style: italic;"><?=$Deskripsi?></p>
						<hr>
                        Price : <strong>Rp.<?=$HargaJual?></strong> &nbsp Stock : <strong><?=$stock?></strong><br/>
						<hr>
                        <a href="formubahproducts.php?p_id=<?=$ProdukID?>" class='btn btn-success btn-sm'>Edit Product's</a> &nbsp<a href="hapusproduk.php?p_id=<?=$ProdukID?>" class='btn btn-danger btn-sm'>Delete Product's</a>
                        <br></br>
                    </div>
                </div>
            </div>
        <?php } ?>
 
</div>





<div class="row">
        <?php 
            $stmt->close();
            $bnsp = "&bnsp ";
            $sqlpaging = "SELECT COUNT(p_id) FROM products";  
            $result = $conn->query($sqlpaging);
            $row = $result->fetch_row();  
            $total_records = $row[0];  
            $total_pages = ceil($total_records / $limit);  
            $pagLink = "<ul class='pagination'> <h5 style='text-align:center;vertical-align: middle;'>Page :</h5>";  
            for ($i=1; $i<=$total_pages; $i++) {  
                         $pagLink .= "<li><a href='viewproducts.php?page=".$i."'>".$i."</a></li>";  
            };  
            echo $pagLink . "</ul>";  
            $conn->close();
        ?>

<?php 

require_once("footerpage.php");
?>