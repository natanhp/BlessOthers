<?php
	include ('../db/koneksidb.php');

	echo isset($_POST['submit']);

	if(isset($_POST['submit'])){
		try{
			$nama=$_POST['nama'];
			$words=$_POST['words'];

			$stmt = $conn->prepare($sql_insert);
            $stmt->bindValue(1, $nama);
            $stmt->bindValue(2, $words);
            $stmt->execute();
		}catch(Exception $e){
			echo "Failed: " . $e;
		}
	}
?>