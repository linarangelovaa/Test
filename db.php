<?php 

try {
    $user = "root";
	$pass = "";    
	$pdo = new PDO ('mysql:host=localhost;dbname=products', $user, $pass);
} catch (PDOException $e) {
    header("Location: index.php");
    die();
}

?>