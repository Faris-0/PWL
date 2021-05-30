<?php
class Library{
	
	function __construct(){
		$engi = "mysql";
		$host = "localhost";
		$dbse = "crud_pdo";
		$user = "root";
		$pass = "";
		$this->koneksi = new PDO($engi.':dbname='.$dbse.";host=".$host,$user,$pass);
	}
	function add_data($nama, $alamat, $logo){
		$data = $this->koneksi->prepare('INSERT INTO sekolah (nama,alamat,logo) VALUES (?, ?, ?)');
        $data->bindParam(1, $nama);
        $data->bindParam(2, $alamat);
        $data->bindParam(3, $logo);
        $data->execute();
        return $data->rowCount();
	}
	function show()
    {
        $query = $this->koneksi->prepare("SELECT * FROM sekolah");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    function get_by_id($id){
        $query = $this->koneksi->prepare("SELECT * FROM sekolah where id=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    }
	function update($id,$nama,$alamat,$logo){
        $query = $this->koneksi->prepare('UPDATE sekolah set nama=?,alamat=?,logo=? where id=?');
        $query->bindParam(1, $nama);
        $query->bindParam(2, $alamat);
        $query->bindParam(3, $logo);
        $query->bindParam(4, $id);
        $query->execute();
        return $query->rowCount();
    }
    function delete($id)
    {
        $query = $this->koneksi->prepare("DELETE FROM sekolah where id=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->rowCount();
    }
}
?>