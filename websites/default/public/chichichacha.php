<?php
if($username != "" && $password != "") {
        try {
          $query = "select * from `login` where `username`=:username and `password`=:password";
          $stmt = $results=$pdo->prepare($query);
          $stmt->bindParam('username', $username, PDO::PARAM_STR);
          $stmt->bindValue('password', $password, PDO::PARAM_STR);
          $stmt->execute();
          $count = $stmt->rowCount();
          $row   = $stmt->fetch(PDO::FETCH_ASSOC);
          echo "success";
          if($count == 1 && !empty($row)) {
           
          } else {
            $msg = "Invalid username and password!";
          }
        } catch (PDOException $e) {
          echo "Error : ".$e->getMessage();
        }
      }
      else {
        $msg = "Both fields are required!";
      }



      

require 'config.php';

if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)){ //check if all boxes are filled
        header("Location: login.php?error=emptyfields&username=" .$username);
        exit();
    }
    else{
        $sql = "INSERT INTO users (username, password) VALUES (?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$username, $password]);
    }
    
}

?>


<label>Category:</label> <select method="POST" name="category">
						<?php 
						$sql = 'SELECT `category_id`, name FROM categories';
						$stmt = $pdo->prepare($sql);
						$stmt->execute();
						$result = $sql->fetchALL(PDO::FETCH_ASSOC);
						foreach($result as $row) {
							echo '<option value="' . $row['category_id'] . '">' . $row['name'] . '</option>'; } ?>
					</select>