<?php 
    require_once("headerpage.php");
?>

<?php
include "koneksi.php";
$username=$_GET['username'];
$select='SELECT * FROM users WHERE username="'.$username.'"';
$query=mysqli_query($conn,$select);
?>
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="daftaranggota.php">Data Anggota</a>
        </li>
        <li class="breadcrumb-item active">Ubah Data</li>
</ol>

<div class="row">
        <div class="col-12">
          <h1>Ubah Data Anggota</h1>

        </div>


        
<form action="updateanggota.php" method="post" id="frmbis" role="form" class="form-horizontal" style="margin-left:1cm">
               
<?php
while($row=mysqli_fetch_array($query)){
?> 

<input type="hidden" name="username" value="<?php echo $username;?>"/>
<div class="form-group">
            <label>Username :</label>
                <input type="text" name="username" class="form-control" id="username" value="<?php echo $row['username'];?>" >
        </div>
        <div class="form-group">
            <label>Password :</label>
                <input type="text" name="kunci" class="form-control" id="kunci" value="<?php echo $row['kunci'];?>">
        </div>  
        <div class="form-group">
            <label>Nama Anggota :</label>
                <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $row['nama'];?>">
        </div>
              <div class="form-group">
                <label>Tanggal Lahir :</label>
                    <input type="date" name="dob" class="form-control" id="dob" value="<?php echo $row['dob'];?>">
            </div>
            <div class="form-group">
            <label>Email :</label>
                <input type="email" name="email" class="form-control" id="email" value="<?php echo $row['email'];?>">
        </div>
        <div class="form-group">
            <label>Jabatan :</label>
                <input type="text" name="jabatan" class="form-control" id="jabatan" value="<?php echo $row['jabatan'];?>">
        </div>


              <div class="form-group" style="float : right">  
                                    
              
                    <button type="submit" class="btn btn-primary">Update</button>
                   </div>
            </div> 

<?php
}
?>
        </form>
        
        
<?php
while($row=mysqli_fetch_array($query)){
?>
<tr>
<td><?php echo $row['username'];?></td>
<td><?php echo $row['kunci'];?></td>
<td><?php echo $row['nama'];?></td>
<td><?php echo $row['dob'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['jabatan'];?></td>
<td><?php echo $row['edit_transaksi'];?></td>
<td><?php echo $row['delete_transaksi'];?></td>
<td><?php echo $row['input_bis'];?></td>
<td><?php echo $row['edit_bis'];?></td>
<td><?php echo $row['delete_bis'];?></td>
<td><?php echo $row['input_karyawan'];?></td>
<td><?php echo $row['edit_karyawan'];?></td>
<td><?php echo $row['delete_karyawan'];?></td>
<td>
<a href="../formulirr/FormEditBis.php?nomer_bis=<?php echo $row['nomer_bis']; ?>">Edit</a>
</td>
<td>
<a href="../function/delete_kary.php?nomer_bis=<?php echo $row['nomer_bis']; ?>" onClick="return confirm('Apakah yakin data ingin dihapus ?')">Delete</a>

</td>
</tr>

<?php
}
?>
           <?php 
    require_once("footerpage.php");
?>    
            </table>
            
   </div>


   <script src="../assets/js/jquery.min.js"></script>
   <script src="../assets/js/bootstrap.min.js"></script>
   <script src="../assets/js/script.js"></script>