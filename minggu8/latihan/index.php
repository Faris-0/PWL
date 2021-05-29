<?php 
include 'crud/conn.php'; 
session_start();

if(isset($_POST['Login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    try {
        $sql = "SELECT * FROM tb_user WHERE username = :username AND password = :password";
        $stmt = $koneksi->prepare($sql); 
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        if($count > 0) {
			if($data['hak']=="1"){
				$_SESSION['username'] = $username;
				$_SESSION['hak'] = "1";
				header("location:crud/index.php");
			}else if($data['hak']=="2"){
				$_SESSION['username'] = $username;
				$_SESSION['hak'] = "2";
				header("location:crud/index.php");
			}else{
				header("location:index.php?pesan=gagal");
			}
		}else{
			header("location:index.php?pesan=gagal");
		}
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}
?>
<html>
<head>
<title>Login here...</title>
</head>
<body>
<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Login gagal! username dan password salah!";
		}else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman";
		}
	}
?>
<form action="" method="post">
<h2>Login Here...</h2>
Username : <input type="text" name="username"><br>
Password : <input type="password" name="password"><br>
<input type="submit" name="Login" value="Log In">
</form>
</body>
</html>