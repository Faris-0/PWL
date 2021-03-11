<!DOCTYPE html>
<html>
<head>
	<title>Kalkulator</title>
	<style type="text/css">
		#kotak{
			border: 1px solid;
			text-align: center;
		}
	</style>
</head>
<body>
<?php
if($_POST){
$pertama = $_POST['blg1'];
$kedua = $_POST['blg2'];
$plh = $_POST['operasi'];
switch ($plh) {
	case 'nambah':
		$total = $pertama + $kedua;
		break;
	case 'ngurang':
		$total = $pertama - $kedua;
		break;
	case 'ngali':
		$total = $pertama * $kedua;
		break;
	case 'mbagi':
		$total = $pertama / $kedua;
		break;
}
}
?>
<form method="post" id="kotak">
<p>bil 1 <input type="text" name="blg1"></p>
<p>bil 2 <input type="text" name="blg2"></p>
<p>hasil <?php if ($_POST) {?> <input type="text" disabled="" value="<?php echo($total) ?>"> <?php }else{ ?> <input type="text" disabled="" value=""> <?php } ?></p>
<p>operator <select name="operasi"><option value="nambah">+ (tambah)</option><option value="ngurang">- (kurang)</option><option value="ngali">* (kali)</option><option value="mbagi">/ (bagi)</option></select> <input type="submit" name="smdngn" value="="></p>
</form>
</body>
</html>