<?php 
include('library.php');
$lib = new Library();
if(isset($_POST['tombol_tambah'])){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    //$logo = $_POST['logo'];

    //if ($_FILES['logo']['tmp_name']!="") {
        $logo = $_FILES['logo']['name'];
        $namaSementara = $_FILES['logo']['tmp_name'];
        $dirUpload = "assets/foto/";
        move_uploaded_file($namaSementara, $dirUpload.$logo);
    //}
    
    $add_status = $lib->add_data($nama, $alamat, $logo);
    if($add_status){
    header('Location: index.php');
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CRUD PDO (PBO)</title>
        <link rel="stylesheet" type="text/css" href="assets/css/css.css">
    </head>
    <h3>Tambah Data Sekolah</h3>
    
    <form method="post" action="" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td>Logo</td>
                <td><input type="file" name="logo"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="tombol_tambah">Simpan</button></td>
            </tr>
        </table>
    </form>
</html>