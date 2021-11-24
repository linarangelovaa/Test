<?php
require_once "db.php";
require_once "functions.php";

$sql = "SELECT * FROM product_list";
$stmt = $pdo->query($sql);

$sqlTypes = "SELECT * FROM product_desc";
$stmtTypes = $pdo->query($sqlTypes);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="app.js"></script>
    <title>Product List</title>
  </head>

<body>
<div class="container-fluid">

<form action="delete.php" method="post">
<div id="nav">    
<div><h3>Product List</h3></div>
<div id="buttons">
<button class="btn btn-secondary"><a href='add.php'>ADD</a></button>
<button type='submit' class="btn btn-secondary" id="delete-product-btn">DELETE</button>
</div>
</div>
 <hr>
 <?php
		include('db.php');
		$result = $pdo->prepare("SELECT * FROM product_list ORDER BY id DESC");
		$result->execute();

        $resultTypes = $pdo->prepare("SELECT * FROM product_desc ORDER BY product_id DESC");
		$resultTypes->execute();
 
		for($i=0; $row = $result->fetch(); $i++){
?>

<?php
         
                while ($product = $stmt->fetch()) {
                    $id = encrypt($product['id']);
                    $id = urlencode($id);
                    
  echo "<div class='square' id='{$product['id']}'>
  <div class='content'>
  <div class='delete-checkbox'>
  <input class='form-check-input' name='check[]' type='checkbox' value='{$product['id']}' id='flexCheckDefault'>
  <label class='form-check-label' for='flexCheckDefault'></label><br>
  {$product['sku']}<br>
  {$product['name']}<br>
  {$product['price']}<br>
 {$product['product_type']}
</div>
</div>
</div>";
        // while ($type = $stmt2->fetch()){

        //         if($type['product_id']==$product['id'])
        //         {
        //        if($product['product_type']=='book')
        //           {echo "Width:".$type['book_weight']."KG";}
                  
        //           elseif($product['product_type']=='furniture')
        //           {echo "Dimensions:".$type['furniture_height']."x".$type['furniture_width']."x".$type['furniture_length'];}
                
        //           elseif($type['product_type']=='dvd')
        //           {echo "Size:".$type['dvd_size'];}
        //         }
        //     }
        }
        
          }
            ?>
        
        </form>
<div id="footer">
<hr>
<p id="footertext">ScandiWeb Test assigment</p>
</div>

<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
  $(function() {
   
    
   $("#checkAl").click(function () {
       $('input:checkbox').not(this).prop('checked', this.checked);
       });


});
</script>

</body>

</html>


