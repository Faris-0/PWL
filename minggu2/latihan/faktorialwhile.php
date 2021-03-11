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
$fact = 1;
$i = 1;
while ($i <= $pertama) {
	$fact = $fact * $i;
	$i++;
}
}
?>
<form method="post" id="kotak">
<p>bil 1 <input type="text" name="blg1"></p>
<p>hasil <?php if ($_POST) {?> <input type="text" disabled="" value="<?php echo($fact) ?>"> <?php }else{ ?> <input type="text" disabled="" value=""> <?php } ?></p>
<p><input type="submit" name="smdngn" value="="></p>
</form>
</body>
</html>