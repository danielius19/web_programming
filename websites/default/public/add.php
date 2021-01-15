<?php 
	session_start(); 
	require 'config.php';

	if(isset($_POST['submit'])) {
		$title = $_POST['title'];
		$article = $_POST['article'];
		$author = $_POST['author'];
		$category = $_POST['category'];
		
		if (isset($_POST['publish'])) {
			$publish = 1;
		}
		else {$publish = 0;}

			if ($title != "" && $article != "" && $author !="" && $category !="") {
				$sql = "INSERT INTO articles (title, article, author, is_published, category_id) VALUES (?,?,?,?,?)";
				$stmt =$pdo->prepare($sql);
				$stmt->execute([$title, $article, $author, $publish, $category]);

				echo "<script> alert('Article was successfully added!'); window.location='add.php' </script>";
			}	
			else {
				"<script> alert('Whoops, something is missing :('); window.location='add.php' </script>";
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
					<p>Add a new article</p>

					<label>Title:</label> <input type="text" method="POST" name="title"/>
					<label>Text:</label> <textarea method="POST" name="article"></textarea>
					<label>Category:</label> <select method="POST" name="category">
						<?php 
						$sql = 'SELECT `category_id`, name FROM categories';
						$stmt = $pdo->prepare($sql);
						$stmt->execute();
						while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
							echo '<option value="' . $row['category_id'] . '">' . $row['name'] . '</option>'; } ?>
					</select>
					<label>Author:</label> <input type="text" method="POST" name="author"/>
					<label>Publish?</label> <input type="checkbox" name="publish" value="ticked" id="yes"/>
					
					<input type="submit" name="submit" value="Submit" />
				</form>
			</article>
		</main>

		<?php
		include 'footer.php';
		?>

	</body>
</html>