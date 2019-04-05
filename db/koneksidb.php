<?php
	$host = "dicodingdatabase.database.windows.net";
	$user = "natanhp";
	$password = "***REMOVED***";
	$db = "dicodingwebapp";

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

?>