<?php 
include('library.php');
$lib = new Library();
if(isset($_GET['id'])){
    $id = $_GET['id']; 
    $data_siswa = $lib->get_by_id($id);
}
else
{
    header('Location: index.php');
}

if(isset($_POST['tombol_update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    //if ($_FILES['logo']['tmp_name']!="") {
        $logo = $_FILES['logo']['name'];
        $namaSementara = $_FILES['logo']['tmp_name'];
        $dirUpload = "assets/foto/";
        move_uploaded_file($namaSementara, $dirUpload.$logo);
    //}

    $status_update = $lib->update($id,$nama,$alamat,$logo);
    if($status_update)
    {
        header('Location:index.php');
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CRUD PDO (PBO)</title>
        <link rel="stylesheet" type="text/css" href="assets/css/css.css">
    </head>
    <h3>Update Data Sekolah</h3>
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $data_siswa['id']; ?>"/>
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $data_siswa['nama']; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" value="<?php echo $data_siswa['alamat']; ?>" name="alamat"></td>
            </tr>
            <tr>
                <td>Logo</td>
                <td><img class="img-mini" src="assets/foto/<?php echo $data_siswa['logo'];?>"><input type="file" name="logo"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="tombol_update" value="Update"></td>
            </tr>
        </table>
    </form>
</html>