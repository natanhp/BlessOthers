<?php
	// include 'db/koneksidb.php';
	$password = "***REMOVED***";

	// PHP Data Objects(PDO) Sample Code:
try {
	$conn = new PDO("sqlsrv:server = tcp:dicodingdatabase.database.windows.net,1433; Database = dicodingwebapp", "natanhp", $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e) {
		print("Error connecting to SQL Server.");
		die(print_r($e));
	}

	// SQL Server Extension Sample Code:
	$connectionInfo = array("UID" => "natanhp@dicodingdatabase", "pwd" => $password, "Database" => "dicodingwebapp", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
	$serverName = "tcp:dicodingdatabase.database.windows.net,1433";
	$conn = sqlsrv_connect($serverName, $connectionInfo);

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
		}
	}
?>