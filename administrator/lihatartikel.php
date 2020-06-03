<?php 
require_once('headerpage.php');
?>
<?php 
require_once("koneksi.php");
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Kiriman Artikel</li>
</ol>
<h3 style="text-align:center">Daftar Kiriman Artikel</h3>
<br></br>

<div class="body">
     


    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <thead>
            <tr class="table-info">
                <th style="font-size:15px;text-align:center;vertical-align: middle;">No</th>
                <th style="font-size:15px;text-align:center;vertical-align: middle;">Judul Artikel</th>
                <th style="font-size:15px;text-align:center;vertical-align: middle;">Isi Artikel</th>
                <th style="font-size:15px;text-align:center;vertical-align: middle;">Tanggal Kirim</th>
                <th style="font-size:15px;text-align:center;vertical-align: middle;">Pengirim</th>
                <th style="font-size:15px;"> </th>


            </tr>

        </thead>

            <tbody>
                <?php
                                        
                    $no= 1;
                    $sql = $conn->query("select * from artikel");
                    while ($data =$sql->fetch_assoc()) {
                                            
                                       
                ?>
                <tr>
                <td style="font-size:12px;text-align:center;vertical-align: middle;"><?php echo $no++; ?></td>
                <td style="font-size:12px;text-align:center;vertical-align: middle;"><?php echo $data['jdl_artikel'] ?></td>
                <td style="font-size:12px;vertical-align: middle;"><?php echo $data['isi_artikel'] ?></td>
                <td style="font-size:12px;vertical-align: middle;"><?php echo $data['tgl_artikel'] ?></td>
                <td style="font-size:12px;vertical-align: middle;"><?php echo $data['id_user'] ?></td>



                <td style="color:#fff;vertical-align: middle;"><a href="hapusartikel.php?id_artikel=<?php echo $data['id_artikel']; ?>" onClick="return confirm('Apakah data ingin dihapus?')" role="button" class="btn btn-danger"  style="font-size:10px;">Hapus</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <a href="#" style="font-size:10px;" class="btn btn-success" role="button">Tambah Artikel</a>
    </div>
    <br></br>

<?php
require_once('footerpage.php');
?>