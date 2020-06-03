<?php include ( "connection.php" ); ?>
<?php 

if (isset($_REQUEST['search'])) {

	$epid = mysql_real_escape_string($_REQUEST['search']);
	if($epid != "" && ctype_alnum($epid)){
		
	}else {

	}
}else {

}

$search_value = "";
$search_value = trim($_GET['keywords']);

?>

<!DOCTYPE html>
<html>
<head>
	<title>SAREE</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="homepageheader">
		<div class="signinButton loginButton">
			<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
				<?php 
					if ($user!="") {
						echo '<a style="text-decoration: none; color: #fff;" href="logout.php">LOG OUT</a>';
					}
					else {
						echo '<a style="text-decoration: none; color: #fff;" href="signin.php">SIGN IN</a>';
					}
				 ?>
				
			</div>

		</div>
		<div style="float: left; margin: 5px 0px 0px 23px;">
			<a href="index.php">
				<img style=" height: 75px; width: 130px;" src="image/ebuybdlogo.png">
			</a>
		</div>
		<div id="srcheader">
				<form id="newsearch" method="get" action="search2.php">
				        <?php 
				        	echo '<input type="text" class="srctextinput" name="keywords" size="21" maxlength="120"  placeholder="Search Here..." value="'.$search_value.'"><input type="submit" value="search" class="srcbutton" >';
				         ?>
				</form>
			<div class="srcclear"></div>
		</div>
	</div>

	<div style="padding: 30px 120px; font-size: 25px; margin: 0 auto; display: table; width: 98%;">
		<div>
		<?php 
			if (isset($_GET['search']) && $_GET['search'] != ""){
				$search_value = trim($_GET['search']);
				$getposts = mysqli_query("SELECT * FROM products WHERE p_name like '%$search_value%'  ORDER BY id DESC") or die(mysqli_error());
					if ( $total = mysqli_num_rows($getposts)) {
					echo '<ul id="recs">';
					echo '<div style="text-align: center;"> '.$total.' Products Found... </div><br>';
					while ($row = mysql_fetch_assoc($getposts)) {
						$id = $row['p_id'];
						$pName = $row['p_name'];
						$price = $row['p_price'];
						$description = $row['p_desc'];
						$picture = $row['p_image'];
						$item = $row['p_type'];
						
						echo '
							<ul style="float: left;">
								<li style="float: left; padding: 0px 25px 25px 25px;">
									<div class="home-prodlist-img"><a href="women/view_product.php?pid='.$id.'">
										<img src="image/product/'.$item.'/'.$picture.'" class="home-prodlist-imgi">
										</a>
										<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px;">'.$pName.'</span><br> Price: '.$price.' Tk</div>
									</div>
									
								</li>
							</ul>
						';

						}
				}else {
				echo "Nothing Found!";
			}
			}else {
				echo "Input Someting...";
			}
			
		?>
			
		</div>
	</div>
</body>
</html>