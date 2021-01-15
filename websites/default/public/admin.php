<?php session_start(); ?>

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
				<h1><?php echo 'Welcome '. $_SESSION["username"] . '!'; ?></h1>
				<form action="logout.php">
				<input type="submit" name="Log out" value="Log out" />
				</form>
			</article>
		</main>

		<?php
		include 'footer.php';
		?>

	</body>
</html>