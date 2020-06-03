<?php
    require_once('headerpage.php');
    ?>

<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">
          <a href="viewproducts.php" >View Orders</a>
        </li>
</ol>


<?php
    require_once('koneksi.php');

	$post_at = "";
	$post_at_to_date = "";
	
	$queryCondition = "";
	if(!empty($_POST["search"]["post_at"])) {			
		$post_at = $_POST["search"]["post_at"];
		list($fid,$fim,$fiy) = explode("-",$post_at);
		
		$post_at_todate = date('Y-m-d');
		if(!empty($_POST["search"]["post_at_to_date"])) {
			$post_at_to_date = $_POST["search"]["post_at_to_date"];
			list($tid,$tim,$tiy) = explode("-",$_POST["search"]["post_at_to_date"]);
			$post_at_todate = "$tiy-$tim-$tid";
		}
		
		$queryCondition .= "WHERE date BETWEEN '$fiy-$fim-$fid' AND '" . $post_at_todate . "'";
	}

	$sql = "SELECT * from orders " . $queryCondition . " ORDER BY date desc";
	$result = mysqli_query($conn,$sql);
?>

<html>
	<head>
    <title>Transaction This Year</title>		
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	<style>
	.table-content{border-top:#CCCCCC 4px solid; width:50%;}
	.table-content th {padding:5px 20px; background: #F0F0F0;vertical-align:top;} 
	.table-content td {padding:5px 20px; border-bottom: #F0F0F0 1px solid;vertical-align:top;} 
	</style>
	</head>
	 
	<body>
    <div class="table-responsive">
		<h2 class="title_with_link">Transaction This Year</h2>
  <form name="frmSearch" method="post" action="">
	 <p class="search_input">
		<input type="text" placeholder="From Date" id="post_at" name="search[post_at]"  value="<?php echo $post_at; ?>" class="input-control" />
	    <input type="text" placeholder="To Date" id="post_at_to_date" name="search[post_at_to_date]" style="margin-left:10px"  value="<?php echo $post_at_to_date; ?>" class="input-control"  />			 
		<input type="submit" name="go" value="Search" >
	</p>
<?php if(!empty($result))	 { ?>
    <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
        <tr>
                      
          <th  style="font-size:14px;vertical-align: middle;"><span >Order ID</span></th>
          <th  style="font-size:14px;vertical-align: middle;"><span>Product ID</span></th>          
          <th  style="font-size:14px;text-align:center;vertical-align: middle;"><span>Name</span></th>
          <th  style="font-size:14px;text-align:center;vertical-align: middle;"><span>Address</span></th>
          <th  style="font-size:14px;text-align:center;vertical-align: middle;"><span>Phone</span></th>	  
          <th  style="font-size:14px;text-align:center;vertical-align: middle;"><span>Date</span></th>
        </tr>
      </thead>
    <tbody>
	<?php
		while($row = mysqli_fetch_array($result)) {
	?>
        <tr>
			<td style="font-size:14px;vertical-align: middle;"><?php echo $row["ord_id"]; ?></td>
			<td style="font-size:14px;vertical-align: middle;"><?php echo $row["p_id"]; ?></td>
			<td style="font-size:14px;vertical-align: middle;"><?php echo $row["fullname"]; ?></td>
            <td style="font-size:14px;vertical-align: middle;"><?php echo $row["address"]; ?>, <?php echo $row["city"]; ?>, <?php echo $row["state"]; ?>, <?php echo $row["pincode"]; ?>.</td>
            <td style="font-size:14px;vertical-align: middle;"><?php echo $row["mobile"]; ?></td>
            <td style="font-size:14px;vertical-align: middle;"><?php echo $row["date"]; ?></td>
		</tr>
   <?php
		}
   ?>
   <tbody>
  </table>
<?php } ?>
  </form>
  </div>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
$.datepicker.setDefaults({
showOn: "button",
buttonImage: "../images/datepicker.png",
buttonText: "Date Picker",
buttonImageOnly: true,
dateFormat: 'dd-mm-yy'  
});
$(function() {
$("#post_at").datepicker();
$("#post_at_to_date").datepicker();
});
</script>
</body></html>


<?php
    require_once('footerpage.php');
    ?>