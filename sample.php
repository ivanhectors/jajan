<?php
session_start();
require_once("koneksi.php");

$ProdukID = $_GET["ProdukID"];
$pengguna = $_SESSION["username"];
$total_records = 0;

try{
    $stmt1 = $conn->prepare("SELECT Jumlah FROM cart where ProdukID=? and Pengguna=?");  
    $stmt1->bind_param("is", $ProdukID, $pengguna);
    $stmt1->execute();
    $stmt1->bind_result($jumlah);

    while($stmt1->fetch()){
        $total_records = $jumlah;
    }

    echo $total_records." ".$ProdukID;
    if($total_records>0){
        $total_records+=1;
        $stmt = $conn->prepare("update cart set Jumlah=? where ProdukID=? and Pengguna=?");
        $stmt->bind_param("iis", $total_records,$ProdukID,$_SESSION["username"]);
        $stmt->execute();
        $pesan = "Proses update cart berhasil";
        echo $pesan;
        header("Location:/ukdwstore2/lihatcart.php?pesan=$pesan");
    }else {
        $jumlah = 1;
        $stmt = $conn->prepare("INSERT INTO cart (ProdukID,Jumlah,Pengguna) VALUES (?,?,?)");
        $stmt->bind_param("iis", $ProdukID,$jumlah,$_SESSION["username"]);
        $stmt->execute();
        $pesan = "Proses tambah cart berhasil";
        echo $pesan;
        header("Location:/ukdwstore2/lihatcart.php?pesan=$pesan");
    }
}catch(Exception $e){
    echo "Error :".$e->getMessage();
}
finally{
    $stmt->close();
    $conn->close();
}

?>



<?php
require_once("koneksi.php");
require_once("headerpage.php");
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Daftar Produk</li>
</ol>
<div class="row">
  
        <?php 
            $limit = 4;  
            if (isset($_GET["page"])) { 
                $page  = $_GET["page"]; 
            } else { 
                $page=1; 
            };
            
            $start_from = ($page-1) * $limit;  
            $sql = "SELECT ProdukID,NamaProduk,Deskripsi,HargaBeli,HargaJual,Jumlah,Gambar,Tanggal FROM produk ORDER BY NamaProduk ASC LIMIT ?,?";  
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $start_from, $limit);
            $stmt->execute();
            $stmt->bind_result($ProdukID,$NamaProduk,$Deskripsi,$HargaBeli,$HargaJual,$Jumlah,$Gambar,$Tanggal);
        ?>
        <?php while($stmt->fetch()) { ?>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3">
                        <img src="images/<?=$Gambar?>" width="100" />
                    </div>
                    <div class="col-md-9">
                        <strong><?=$NamaProduk?></strong>
                        <p><?=$Deskripsi?></p>
                        Harga Jual: <strong>Rp.<?=$HargaJual?></strong><br/>
                        <a href="addtocart.php?ProdukID=<?=$ProdukID?>" class='btn btn-success btn-sm'>Add To Cart</a>
                    </div>
                </div>
            </div>
        <?php } ?>

</div>

<div class="row">
        <?php 
            $stmt->close();
            
            $sqlpaging = "SELECT COUNT(ProdukID) FROM produk";  
            $result = $conn->query($sqlpaging);
            $row = $result->fetch_row();  
            $total_records = $row[0];  
            $total_pages = ceil($total_records / $limit);  
            $pagLink = "<ul class='pagination'>";  
            for ($i=1; $i<=$total_pages; $i++) {  
                         $pagLink .= "<li><a href='tampilproduk.php?page=".$i."'>".$i."</a></li>";  
            };  
            echo $pagLink . "</ul>";  
            $conn->close();
        ?>
        </div>
<?php 

require_once("footerpage.php");
?>

<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>UKDW Store</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <style>
.pagination {
    display: inline-block;
}

.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">UKDW Store</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Home</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="about.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">About</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="contact.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Contact</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Produk</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="tampilproduk.php">Daftar Produk</a>
            </li>
            <li>
              <a href="tambahproduk.php">Tambah Produk</a>
            </li>
            <li>
              <a href="lihatcart.php">Lihat Cart</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Link</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
       
        <?php if(isset($_SESSION["username"])) { ?>
          <li class="nav-item">
          <a class="nav-link"><?php echo "Welcome: ". $_SESSION["username"]; ?></a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="proseslogout.php">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="registrasi.php">
            <i class="fa fa-fw fa-sign-out"></i>Registrasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="loginform.php">
            <i class="fa fa-fw fa-sign-out"></i>Login</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">