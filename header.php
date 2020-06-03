<!DOCTYPE HTML>
<html>
<head>
<title>Jajan.com</title>
<script type="applijegleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />	
<script src="js/jquery-1.11.1.min.js"></script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="js/menu_jquery.js"></script>
<script src="js/simpleCart.min.js"> </script>
<!--web-fonts-->
 <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,300italic,600,700' rel='stylesheet' type='text/css'>
 <link href='//fonts.googleapis.com/css?family=Roboto+Slab:300,400,700' rel='stylesheet' type='text/css'>
<!--//web-fonts-->
 <script src="js/scripts.js" type="text/javascript"></script>
<script src="js/modernizr.custom.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<!--/script-->
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
<script id="jsbin-javascript">
(function (global) {
	if(typeof (global) === "undefined")
	{
		throw new Error("window is undefined");
	}
    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";
		// making sure we have the fruit available for juice....
		// 50 milliseconds for just once do not cost much (^__^)
        global.setTimeout(function () {
            global.location.href += "!";
        }, 50);
    };	
	// Earlier we had setInerval here....
    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };
    global.onload = function () {        
		noBackPlease();
		// disables backspace on page except on input fields and textarea..
		document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                e.preventDefault();
            }
            // stopping event bubbling up the DOM tree..
            e.stopPropagation();
        };		
    };
})(window);
</script>
<!-- the jScrollPane script -->
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script>
<!-- //the jScrollPane script -->
</head>
<body>
<!--start-home-->
<!-- header_top -->
<div class="top_bg" id="home">
	<div class="container">
		<div class="header_top">
			<div class="top_right">
				<ul>
					<li><a href="signuplogout.php">Register Account</a></li>
					<li><a href="#">
						<?php 
						error_reporting(0); 
						session_start();
						$username = $_SESSION['username'];
						$id = $_SESSION['id'];
						$_SESSION['id'] = $id;
						if(isset($_SESSION['username']))
							echo '<span>Welcome, '.$username.'! </span>';					
						?></a>
					</li>
					<li><a href="logout.php">Logout</a></li>	
				</ul>
			</div>
			<div class="top_left">
				<span class="top_right"> <a class="header_top" style ="color:white;" href="feedback.php">Feedback .</style></a> | Call us : +62 823 8694 3219</span>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- header -->
<div class="header_bg">
   <div class="container">
	<div class="header">
	  <div class="head-t">
		 <div class="logo">
			  <a href="index.php"><h1>Jajan<span>.Com</span></h1> </a>
		  </div>
		  <div class="header_right">
			<div class="cart box_1">
				<div>
				<a  href="cart.php"><img src="images/cart1.png" width="80px" height="80px" /></a></div>
				<div class="clearfix"> </div> 
			</div>				 
		</div>
		<!--start-header-menu-->
		<ul class="megamenu skyblue">
			<li class="active grid"><a class="color1" href="index.php">Home</a></li>
				<li class="color1"><a class="color6" href="shoes.php">SHOES</a></li>			
				<li><a class="color8" href="tshirt.php">T-SHIRT</a></li>
				<li><a class="color9" href="watches.php">WATCHES</a></li>
                <li>
				<form action="#" method="post">
				</form>
				</li>
			</li>	
		 </ul> 
	</div>
</div>
</div>
 <!--start-content-->
<!--products-->
	<div class="products">
		<div class="container">
			<div class="products-grids">
				<div class="col-md-8 products-grid-left">
					<div class="products-grid-lft">
					<?php					
					include 'connection.php';					
					if(isset($_GET['filter_price']))
					{
						$price = $_GET['filter_price'];					
						if($price == 0)
						$sql = " SELECT * FROM products WHERE p_type LIKE 'Shoes'";					
						if($price == 1)
						$sql = " SELECT * FROM products WHERE p_price < 100000 AND p_type LIKE 'Shoes'";
						if($price == 2)
						$sql = " SELECT * FROM products WHERE p_price BETWEEN 100000 AND 300000 AND p_type LIKE 'Shoes'";
						if($price == 3)
						$sql = " SELECT * FROM products WHERE p_price BETWEEN 400000 AND 600000 AND p_type LIKE 'Shoes'";
						if($price == 4)
						$sql = " SELECT * FROM products WHERE p_price > 600000 AND p_type LIKE 'Shoes'";				
						if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
						}
                        $result = mysqli_query($conn, $sql);
                    }
?>
                    <div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-4 products-grid-right">
					<div class="w_sidebar">
						<div class="w_nav1">
							<h4>Category</h4>
							<ul>

								<li><a href="shoes.php">Shoes</a></li>
								<li><a href="tshirt.php">Tshirt</a></li>
								<li><a href="watches.php">Watches</a></li>
							</ul>	
						</div>
						<section  class="sky-form">
							<h4>Price</h4>
							<div class="row1 scroll-pane">
								<div class="col col-4">
								<form action="#" method="get" name="filter_price">
									<label class="radio"><input type="radio" name="filter_price" value="0"><i></i>All</label>
									<label class="radio"><input type="radio" name="filter_price" value="1"><i></i>Below 100.000</label>
									<label class="radio"><input type="radio" name="filter_price" value="2"><i></i>100.000 - 300.000</label>
									<label class="radio"><input type="radio" name="filter_price" value="3"><i></i>400.000 - 600.000</label>
									<label class="radio"><input type="radio" name="filter_price" value="4"><i></i>Above 600.000</label>									<input type="submit" name="submit" value="Submit"/>
								</form>
								</div>
							</div>
						</section>						
					</div>

				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>