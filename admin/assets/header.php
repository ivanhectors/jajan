<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin | Dufil</title>
  <!-- Bootstrap core CSS-->
  <link href="assets/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="assets/sb-admin.css" rel="stylesheet">
  
</head>

<body >

        
        

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        
       
        <?php if(isset($_SESSION["username"])) { ?>
          <li class="nav-item">
          <a class="nav-link"><?php echo "Welcome: ". $_SESSION["username"]; ?></a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="proseslogout.php">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
        <?php } else { ?>
          

        <?php } ?>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">