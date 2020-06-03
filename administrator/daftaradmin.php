<?php
require_once("koneksi.php");
require_once("headerpage.php");
?>
<style>
    li {
    float: left;
    list-style: outside none none;
    padding-left: 5px; }
</style>
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
    <li class="breadcrumb-item active">Data Administrator</li>
</ol>
<h3 style="text-align:center">Data Administrator Website</h3>
<br></br>
<div class="row">
    <div class="col-md-12">
        <?php 
            $limit = 10;  
            if (isset($_GET["page"])) { 
                $page  = $_GET["page"]; 
            } else { 
                $page=1; 
            };
              
            $start_from = ($page-1) * $limit;  
            $sql = "SELECT username,nama,email,telp,aturan FROM administrator ORDER BY nama ASC LIMIT ?,?";  
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $start_from, $limit);
            $stmt->execute();
            $stmt->bind_result($username,$nama,$email,$telp,$aturan);
        ?>
        
        <table class="table table-bordered table-striped">
            <tr>
                <th style="text-align:center;">Username</th>
                <th style="text-align:center;">Name</th>
                <th style="text-align:center;">Email</th>
                <th style="text-align:center;">Telp</th>
                <th style="text-align:center;">Role</th>
            </tr>
            <?php while($stmt->fetch()) { ?>
                <tr>
                    <td style="text-align:center;"><?php echo $username ?></td>
                    <td><?php echo $nama ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $telp ?></td>
                    <td><?php echo $aturan ?></td>
                </tr>
            <?php } ?>
        </table>

        <?php 
            $stmt->close();
            
            $sqlpaging = "SELECT COUNT(username) FROM administrator";  
            $result = $conn->query($sqlpaging);
            $row = $result->fetch_row();  
            $total_records = $row[0];  
            $total_pages = ceil($total_records / $limit);  
            $pagLink = "<ul class='pagination '><h5>Pages : </h5>" ;  
            for ($i=1; $i<=$total_pages; $i++) {  
                         $pagLink .= "<li><a href='daftaradmin.php?page=".$i."'>".$i."</a></li>";  
            };  
            echo $pagLink . "</ul>";  

            $conn->close();
        ?>
    </div>
</div>

<?php 
require_once("footerpage.php");
?>