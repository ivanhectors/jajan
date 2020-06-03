<?php 
    /*if(!isset($_SESSION["username"])){
        header("Location: /ukdwstore/loginform.php");
    }*/
    require_once("headerpage.php");
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Tambah Anggota</li>
</ol>
<div class="row">
    <div class="col-6">
        <h3 style="text-align:center">Tambah Anggota Baru</h3>
        <br></br>
        <form action="prosestambahanggota.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">NIM :</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label for="nama">Nama Lengkap:</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password" class="form-control" name="pass">
            </div>
            <div class="form-group">
                <label for="repass">Repassword:</label>
                <input type="password" class="form-control" name="repass">
            </div>
            <div class="form-group">
                <label for="dob">Tanggal Lahir :</label>
                <input type="date" class="form-control" name="dob" rows="5"></input>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan :</label>
                <input type="text" class="form-control" name="jabatan">
            </div>
            <div class="form-group">
                <label for="fileToUpload">Foto Profil :</label>
                <input type="file" name="fileToUpload">
            </div>
            <br></br>
            <button type="submit" class="btn btn-default">Submit</button>
            <br></br>
        </form>
    </div>
</div>

<?php 
    require_once("footerpage.php");
?>