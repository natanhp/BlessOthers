<?php
	$host = "dicodingdatabase.database.windows.net";
	$user = "natanhp";
	$password = "***REMOVED***";
	$db = "dicodingwebapp";

	try {
		$conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch(Exception $e) {
		echo "Failed: " . $e;
}

echo "Iso bosq";
?>