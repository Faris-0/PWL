<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	if(isset($_POST['simp'])){
		$nim = $_POST['nim'];
		$prodi = $_POST['study'];
		if ($prodi == 'A11') {
			$progdi = 'Teknik Informatika S1';
		} elseif ($prodi == 'A12') {
			$progdi = 'Sistem Informasi S1';
		} elseif ($prodi == 'A22') {
			$progdi = 'Teknik Informatika D3';
		}
		$ntgs = $_POST['tgs'];
		$nuts = $_POST['uts'];
		$nuas = $_POST['uas'];
		$nakh = ($ntgs*0.4) + ($nuts*0.3) + ($nuas*0.3);
		if ($nakh >= 85 && $nakh <= 100) {
			$hrf = 'A';
		} elseif ($nakh >= 70 && $nakh <= 84) {
			$hrf = 'B';
		} elseif ($nakh >= 60 && $nakh <= 69) {
			$hrf = 'C';
		} elseif ($nakh >= 50 && $nakh <= 59) {
			$hrf = 'D';
		} elseif ($nakh >= 0 && $nakh <= 49) {
			$hrf = 'E';
		}
		if ($nakh >= 60) {
			$sts = 'LULUS';
		} elseif ($nakh <= 59) {
			$sts = 'TIDAK';
		}
	}
	$ntkhs = array("Kehadiran >= 70 %", "Interaktif dikelas", "Tidak terlambat mengumpulkan tugas");
	?>
	<form method="post">
		<table border="0">
			<tr>
				<td>Nim</td>
				<td><input type="text" name="nim"></td>
			</tr>
			<tr>
				<td>Program Studi</td>
				<td>
					<select name="study">
						<option value="A11">
							Teknik Informatika S1
						</option>
						<option value="A12">
							Sistem Informasi S1
						</option>
						<option value="A22">
							Teknik Informatika D3
						</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Nilai Tugas</td>
				<td><input type="number" name="tgs" min="0" max="100"></td>
			</tr>
			<tr>
				<td>Nilai UTS</td>
				<td><input type="number" name="uts" min="0" max="100"></td>
			</tr>
			<tr>
				<td>Nilai UAS</td>
				<td><input type="number" name="uas" min="0" max="100"></td>
			</tr>
			<tr>
				<td>Catatan Khusus</td>
				<td>
					<?php
					echo "<input type='checkbox' name='cat' value='$ntkhs[0]'>". $ntkhs[0] ."<br>";
					echo "<input type='checkbox' name='cat1' value='$ntkhs[1]'>". $ntkhs[1] ."<br>";
					echo "<input type='checkbox' name='cat2' value='$ntkhs[2]'>". $ntkhs[2] ."<br>";
					?>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="simp" value="SIMPAN"></td>
			</tr>
		</table>
		<br>
		<table border="1">
			<tr>
				<td>Program Studi</td>
				<td>NIM</td>
				<td>Nilai  Akhir</td>
				<td>STATUS</td>
				<td>Catatan Khusus</td>
			</tr>
			<tr>
				<?php if(isset($_POST['simp'])){ ?>
				<td><?php echo($progdi) ?></td>
				<td><?php echo($nim) ?></td>
				<td><?php echo($hrf) ?></td>
				<td><?php echo($sts) ?></td>
				<td>
					<?php 
					if(isset($_POST['cat'])){
						echo "• " . $_POST['cat'] . "<br>";
					}
					if(isset($_POST['cat1'])){
						echo "• " . $_POST['cat1'] . "<br>";
					}
					if(isset($_POST['cat2'])){
						echo "• " . $_POST['cat2'] . "<br>";
					}
					?>	
				</td>
				<?php } ?>
			</tr>
		</table>
	</form>
</body>
</html>