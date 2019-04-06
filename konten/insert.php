<?php
	include 'db/koneksidb.php';

	if(isset($_POST['submit'])){
		try{
			$nama=$_POST['nama'];
			$words=$_POST['words'];

			$sql_insert = "INSERT INTO bless (nama, words) VALUES (?,?)";
			$statement = $conn->prepare($sql_insert);
			$statement->bindValue(1, $nama);
			$statement->bindValue(2, $words);
			$statement->execute();
		}catch(Exception $e){
			echo "Failed: " . $e;
		}default{
			echo "Sukses";
		}
	}
?>