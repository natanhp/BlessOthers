<?php
	include ('../db/koneksidb.php');

	echo isset($_POST['submit']);

	if(isset($_POST['submit'])){
		try{
			$nama=$_POST['nama'];
			$words=$_POST['words'];

			echo $nama;
			echo $words;
			
			$q = "INSERT INTO bless (nama, words) VALUES (:nama, :words)";
			$query = $db->prepare($q);
			$result = $query->execute(array(":nama" => $nama, ":words" => $words));
		}catch(Exception $e){
			echo "Failed: " . $e;
		}
	}
?>