<?php
<<<<<<< HEAD:minggu9/praktikum/pbo03.php
=======
//include "pbo02.inc.php";
>>>>>>> b7c6bcaff60534a9e710c4b9e11b591b360c92a9:minggu9/praktikum/pbo3.php
include "pbo02.php";
echo "<html><head><title>Mahasiswa</title></head><body>";
$form = new Form ("","Input Form");
$form->addField ("txtnim", "Nim");
$form->addField ("txtnama", "Nama");
$form->addField ("txtalamat", "Alamat");
echo "<h3>Silahkan isi form berikut ini :</h3>";
$form->displayForm();
echo "</body></html>";
?>
