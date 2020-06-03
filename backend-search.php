<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<style>
table {
    background: #fff;
    float: right;
    display: table;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    table-layout: fixed;
    padding-right:30px;
   border-collapse: collapse;
    margin-right: 30px;
    align: right;
    


}
output {
    display: inline-block;
    -webkit-appearance: menulist-button;
    height: 30px;
    width: 65px;
    font-size: 15px;
    
}
th, td {
    border-bottom: 1px solid #ddd;
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:hover {background-color: #f5f5f5;}
.ajax_loader
{
    background-size: 25px;
    background-image: url('../img/green_loader.gif');
    background-repeat: no-repeat;
    background-position: 98% 46%;
}

.ls_query
{
    border: 1px solid #ccc;
    height: 46px;
    max-width: 100%;
    padding: 10px;
    width: 550px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;
    font-size: 20px;
    vertical-align: middle;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    color: #282828;
    outline: 0;
}

.ls_query:focus
{
    border-color: #0080bb;
    -webkit-box-shadow: 0 0 5px #0080bb;
    -moz-box-shadow: 0 0 5px #0080bb;
    box-shadow: 0 0 5px #0080bb;
}
/* End of search input */

@media(max-width:767px){
    .feature
    {
        text-align: center;
    }

    .feature_desc
    {
        margin-top: 10px;
    }
}
</style>
</head>
<body>
    


<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "ecom");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM products 
  WHERE p_name LIKE '%".$search."%'
  OR p_type LIKE '%".$search."%'  
  OR p_price LIKE '%".$search."%'
 ";
}
else
{
 $query = "SELECT * FROM empty";
}
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table">
   <table align="right" width="400" class"table">
    <tr style="font-size:14px;">
     <th width="30%" colspan="2">Result...</th>

    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr style="font-size:14px;">
    <td width="20%"><a href="single.php?p='.$row['p_id'].'"><img src="'.$row["p_image"].'" alt="" class="img-responsive" width="30%"></img></a></td>
    <td><a href="single.php?p='.$row['p_id'].'">'.$row["p_name"].'</a></td>
   </tr>
  '; 
 }
 echo $output;
}


?>

</body>
</html>