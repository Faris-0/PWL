<?php 
include('library.php');
$lib = new Library();
$data_siswa = $lib->show();

if(isset($_GET['hapus_siswa']))
{
    $id = $_GET['hapus_siswa'];
    $status_hapus = $lib->delete($id);
    if($status_hapus)
    {
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
    <h3>Data Sekolah</h3>
    <a href="form_add.php" class="btn btn-success">Tambah</a>
    <table class="data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Logo</th>
                <th colspan="4">Action</th>
            </tr>
        </thead>
    <tbody>
        <?php 
            $no = 1;
            foreach($data_siswa as $row){
        ?>
        <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $row['nama'];?></td>
            <td><?php echo $row['alamat'];?></td>
            <td><img class="img-mini" src="assets/foto/<?php echo $row['logo'];?>"></td>
            <?php
            echo "<td><a class='btn btn-info' href='form_edit.php?id=".$row['id']."'>Update</a><a class='btn btn-danger' href='index.php?hapus_siswa=".$row['id']."'>Hapus</a></td>";
            ?>
        </tr>
        <?php
            $no++;
            }
        ?>
    </table>
    </tbody>
</html>