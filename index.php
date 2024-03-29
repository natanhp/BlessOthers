<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Bless Others</title>
		<!-- Sumber gambar: https://www.churchofblessing.org/bird-logo/ -->
		<link rel="shortcut icon" type="image/png" href="images/bird-logo.png"/>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="style/style.css">
	</head>
	<body>
		<header>
				<div class="jumbotron jumbotron-fluid">
						<div class="container">
							<img id="img_header" src="images/bird-logo.png" alt="Dove Symbol"> 
							<div id="text_header">
									<h1 class="display-4">Bless Others</h1>
									<p class="lead">Be a blessing by spreading the positive words.</p>
							</div>
						</div>
					</div>
		</header>
		<div class="container">
			<form action="index.php" method="POST">
				<div class="form-group">
					<label for="nama">Nama: </label>
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Name">
				</div>
				<div class="form-group">
					<label for="words">Words: </label>
    			<textarea class="form-control" id="words" name="words" rows="3"></textarea>
				</div>
				<button type="submit" name="submit" class="btn btn-primary">Be a blessing!</button>
			</form>
		</div>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</html>

<?php
	include('db/koneksidb.php');

	function getData($conn){
		try {
			$sql_select = "SELECT nama, words FROM bless";
			$stmt = $conn->query($sql_select);
			$posts = $stmt->fetchAll(); 
			if(count($posts) > 0) {
				echo '<div class="container">';
				echo '<table class="table">';
				echo "<thead>";
				echo "<tr>";
				echo '<th scope="col">Name</th>';
				echo '<th scope="col">Words</th>';
				echo "</tr>";
				echo "</thead>";
				echo "<tbody>";
				foreach($posts as $post) {
					echo "<tr>";
					echo "<td>".$post['nama']."</td>";
					echo "<td>".$post['words']."</td>";
				}
				echo "</tbody>";
				echo "</table>";
				echo "</div>";
			}
		} catch(Exception $e) {
				echo "Failed: " . $e;
		}
	}

	getData($conn);
	
	if(isset($_POST['submit'])){
		try{
			$nama=$_POST['nama'];
			$words=$_POST['words'];

			$sql_insert = "INSERT INTO bless (nama, words) VALUES (?,?)";
			$stmt = $conn->prepare($sql_insert);
			$stmt->bindValue(1, $nama);
			$stmt->bindValue(2, $words);
			$stmt->execute();

			getData($conn);
		}catch(Exception $e){
			echo "Failed: " . $e;
		}
	}
?>