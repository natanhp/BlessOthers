<?php
	include ('../db/koneksidb.php');

	echo isset($_POST['submit']);

	if(isset($_POST['submit'])){
		try{
			// $nama=$_POST['nama'];
			// $words=$_POST['words'];

			// echo $nama;
			// echo $words;
			
			// $q = "INSERT INTO [dbo].[bless] (nama, words) VALUES (:nama, :words)";
			// $query = $db->prepare($q);
			// $result = $query->execute(array(":nama" => $nama, ":words" => $words));

			$sql_select = "SELECT * FROM [dbo].[bless]";
            $stmt = $conn->query($sql_select);
			$registrants = $stmt->fetchAll(); 
			
			foreach($registrants as $test){
				echo $test['nama'] . $test['words'];
			}
		}catch(Exception $e){
			echo "Failed: " . $e;
		}
	}
?>