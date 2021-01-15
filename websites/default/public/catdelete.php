<?php
    session_start();
    require 'config.php';
    if(isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $sql = 'DELETE FROM categories WHERE category_id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        echo "<script> alert('Category was successfully deleted!'); window.location='catdelete.php' </script>";
    } ?>


<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" href="styles.css"/>
        <script src="https://kit.fontawesome.com/fab801710a.js" crossorigin="anonymous"></script>
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
				<h2>Categories:</h2><br>
				<?php
					$sql = 'SELECT category_id, name FROM categories';
					$stmt = $pdo->prepare($sql);
                    $stmt->execute();
                   	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
						echo '<p class="catdel">' . $row['name'] . '</p><a class="delete" href=catdelete.php?delete=' . $row['category_id'] . '> <i class="fas fa-trash-alt"></i> </a>'; } ?>
			</form>
            </article>
		</main>

		<?php
		include 'footer.php';
		?>

	</body>
</html>