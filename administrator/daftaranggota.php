
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
    <li class="breadcrumb-item active">Data Member's</li>
</ol>
<h3 style="text-align:center">Data Member's</h3>
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
            $sql = "SELECT id,username,email,mobile FROM users ORDER BY username ASC LIMIT ?,?";  
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $start_from, $limit);
            $stmt->execute();
            $stmt->bind_result($id,$username,$email,$mobile);
        ?>
        
        <table class="table table-bordered table-striped">
            <tr>
                <th style="text-align:center;">ID</th>
                <th style="text-align:center;">Username</th>
                <th style="text-align:center;">Email</th>
                <th style="text-align:center;">Telp</th>
                <th style="text-align:center;">Action</th>
            </tr>
            <?php while($stmt->fetch()) { ?>
                <tr>
                    <td style="text-align:center;"><?php echo $id ?></td>
                    <td><?php echo $username ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $mobile ?></td>
                    <td style="color:#fff;vertical-align: middle;text-align:center;"><a href="formubahanggota.php?username=<?php echo $username ?>" role="button" class="btn btn-primary" style="font-size:10px;">Ubah</a></td>
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