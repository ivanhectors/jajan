<?php 
    require_once("headerpage.php");
?>

<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Home Page</li>
</ol>
      <div class="row">
        <div class="col-12">
          <h1>Welcome to Administration Page!</h1>

          <?php 
          
          if(isset($_SESSION["username"])) { 
            echo "Welcome back, ".$_SESSION["username"];
          }else {
            require_once("loginform.php");
          }

          ?>
        </div>
      </div>

<?php 
    require_once("footerpage.php");
?>