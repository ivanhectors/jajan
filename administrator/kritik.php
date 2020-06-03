<?php 
    require_once("headerpage.php");
?>
<?php 
require_once("koneksi.php");
?>
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Kritik & Saran</li>
</ol>
      <div class="row">
        <div class="col-12">
          <h1>Kritik dan Saran</h1>

          
        </div>
      </div>

      <br></br>
      <div class="body">
     
     <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
         <thead>
             <tr class="table-info">
                 <th style="font-size:13px;text-align:center;vertical-align: middle;">No</th>
                 <th style="font-size:13px;text-align:center;vertical-align: middle;">Nama Pengirim</th>
                 <th style="font-size:13px;text-align:center;vertical-align: middle;">Email Pengirim</th>
                 <th style="font-size:13px;text-align:center;vertical-align: middle;">Tentang</th>
                 <th style="font-size:13px;text-align:center;vertical-align: middle;">Isi</th>
                 <th style="font-size:13px;text-align:center;vertical-align: middle;">Waktu</th>                 
                 <th style="font-size:13px;text-align:center;vertical-align: middle;">Tindakan</th>
 
 
             </tr>
 
         </thead>
 
             <tbody>
                 <?php
                                         
                     $no= 1;
                     $sql = $conn->query("select * from kritik");
                     while ($data =$sql->fetch_assoc()) {
                                             
                                        
                 ?>
                 <tr>
                 <td style="font-size:12px;text-align:center;vertical-align: middle;"><?php echo $no++; ?></td>
                 <td style="font-size:12px;text-align:center;vertical-align: middle;"><?php echo $data['nama'] ?></td>
                 <td style="font-size:12px;vertical-align: middle;"><?php echo $data['email'] ?></td>
                 <td style="font-size:12px;vertical-align: middle;"><?php echo $data['tentang'] ?></td>
                 <td style="font-size:12px;vertical-align: middle;"><?php echo $data['isi'] ?></td>
                 <td style="font-size:12px;vertical-align: middle;"><?php echo $data['tanggal'] ?></td>
                 <td style="color:#fff;vertical-align: middle;"><a href="hapuskritik.php?kritikid=<?php echo $data['kritikid']; ?>" onClick="return confirm('Apakah data ingin dihapus?')" role="button" class="btn btn-danger"  style="font-size:10px;">Hapus</a></td>
                 </tr>  
                 <?php } ?>
             </tbody>
         </table>


<?php 
    require_once("footerpage.php");
?>