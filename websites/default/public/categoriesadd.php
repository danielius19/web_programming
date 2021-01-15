<?php require 'config.php';

	if(isset($_POST['create'])) {
		$category = $_POST['title'];

			if ($category != "") {
				$sql = "INSERT INTO categories (name) VALUES (?)";
				$stmt =$pdo->prepare($sql);
				$stmt->execute([$category]);

				echo "<script> alert('Category was successfully added!'); window.location='categoriesadd.php' </script>";
			}	
			else {
				"<script> alert('Whoops, something is missing :('); window.location='categoriesadd.php' </script>";
			}
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="styles.css"/>
		<title>Northampton News - Admin page</title>
	</head>
	<body>
		<?php
		include 'header.php';
		include 'navigation.php';
		?>
		<img src="images/banners/randombanner.php" />
		<main>
		<?php
		include 'sidebar.php';
		?>
            <article>
            <form method="POST">
				<p>Add a new category:</p>

				<label>Name:</label> <input type="text" method="POST" name="title"/>

				<input type="submit" name="create" value="Submit" />
			</form>
            </article>
		</main>

		<?php
		include 'footer.php';
		?>

	</body>
</html>