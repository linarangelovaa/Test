<?php

require_once "db.php";

//Validacija
$sku= $name = $price = $product_type = $dvd_size = $book_weight = $furniture_height = $furniture_width = $furniture_length = "";
if (isset($_POST["sku"]) && isset($_POST["name"]) && isset($_POST["price"]) && isset($_POST["productType"])&& isset($_POST["dvd_size"])&& isset($_POST["book_weight"])&& isset($_POST["furniture_height"])&& isset($_POST["furniture_width"])&& isset($_POST["furniture_length"])){
$sku = $_POST["sku"];
$name = $_POST["name"];
$price = $_POST["price"];
$product_type = $_POST["productType"];
$dvd_size= $_POST["dvd_size"];
$book_weight= $_POST["book_weight"];
$furniture_height= $_POST["furniture_height"];
$furniture_width= $_POST["furniture_width"];
$furniture_length= $_POST["furniture_length"];

    if (empty($sku)||empty($name)||empty($price)||empty($product_type))
    {
      header("Location:add.php?status=error&reason=required&oldsku=$sku&oldname=$name&oldprice=$price&oldproducttype=$product_type");
      die();
    }

    else if(ctype_alpha(str_replace(' ', '', $name)) === false){
        header("Location:add.php?status=error&reason=inputtype&oldsku=$sku&oldprice=$price&oldproducttype=$product_type");
      die();
    }
    else if(($product_type)=='book'){
        if (empty($book_weight)){
        header("Location:add.php?status=error&reason=required&oldsku=$sku&oldname=$name&oldprice=$price&oldproducttype=$product_type");
        die();
        }
    }
    else if(($product_type)=='dvd'){
        if (empty($dvd_size)){
        header("Location:add.php?status=error&reason=required&oldsku=$sku&oldname=$name&oldprice=$price&oldproducttype=$product_type");
        die();
        }
    }
    else if(($product_type)=='furniture'){
        if (empty($furniture_height)||empty($furniture_width)||empty($furniture_length)){
        header("Location:add.php?status=error&reason=required&oldsku=$sku&oldname=$name&oldprice=$price&oldproducttype=$product_type");
        die();
        }
    }
    else if (preg_match("/[^0-9 ]/", $price)){
        header("Location:add.php?status=error&reason=inputtype&oldsku=$sku&oldname=$name&oldproducttype=$product_type");
      die();
    }



$sql = "INSERT INTO product_list (sku, name, price, product_type) VALUES ('$sku','$name','$price','$product_type')";
$stmt=$pdo->prepare($sql);
$sql2 = "INSERT INTO product_desc (dvd_size, book_weight, furniture_height, furniture_width, furniture_length) VALUES ('$dvd_size','$book_weight','$furniture_height','$furniture_width','$furniture_length')";				
$stmt2=$pdo->prepare($sql2);


if (($stmt->execute())&&($stmt2->execute())) {
    header("Location: index.php");
    die();
}
}
header("Location: add.php");
die();


?>