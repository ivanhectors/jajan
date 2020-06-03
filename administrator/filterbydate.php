<?php

if(isset($_POST['submit']))
 {
  $uid=mysqli_real_escape_string($_POST['uid']);
  $edate = mysqli_real_escape_string($_POST['edate']);
  $sdate = mysqli_real_escape_string($_POST['sdate']);
 }
 $sql="SELECT * FROM orders WHERE date='$uid'";
 if(isset($_POST['submit']))
  {
   $sql.= " AND $date < post_date > $edate";
  }  
 $respost = mysqli_query($link,$sql);

 ?>