<?php

require_once "db.php";

$delete=$_POST['check'];
$N = count($delete);
for($i=0; $i < $N; $i++)
{
    $result2 = $pdo->prepare("DELETE FROM product_desc WHERE product_id= :memid");
	$result2->bindParam(':memid', $delete[$i]);
	$result2->execute();

	$result = $pdo->prepare("DELETE FROM product_list WHERE id= :memid");
	$result->bindParam(':memid', $delete[$i]);
	$result->execute();


}
header("location: index.php");
mysql_close($con);
?>