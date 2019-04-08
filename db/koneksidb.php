<?php
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
?>