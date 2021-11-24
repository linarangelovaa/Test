<!DOCTYPE html>
<html lang="en">

<head>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="app.js"></script>
    <title>Product Add</title>
</head>

<body>
<?php
    require_once "db.php";
    ?>
<form method="POST" action="store.php" id="product_form">
<div id="nav">    
<div><h3>Product Add</h3></div>
<div id="buttons">
    <button class="btn btn-secondary">SUBMIT</button>
    <button class="btn btn-secondary"><a href='index.php'>CANCEL</a></button>
   </div>
</div>
    <hr>
  <?php
    if(isset($_GET['status'])){
      if($_GET['status']=='error'){

        if($_GET['reason']=='required'){
         echo "<p class='error'>Please, submit required data</p>";}
        else if($_GET['reason']=='inputtype'){
          echo "<p class='error'>Please, provide the data of indicated type</p>";}

      }
      
    }
  ?>
<div id="form_content">
  <div class="block">
  <label for="sku">SKU</label>
  <input type="text" id="sku" name="sku" value="<?php 
   if(isset($_GET['oldsku'])){
  echo $_GET['oldsku'];
  }?>">
  <br><br>
</div>
<div class="block">
  <label for="name">Name</label>
  <input type="text" id="name" name="name" value="<?php 
   if(isset($_GET['oldname'])){
  echo $_GET['oldname'];
  }?>" >
</div><br>
<div class="block">
  <label for="price">Price ($)</label>
  <input type="text" id="price" name="price" value="<?php 
   if(isset($_GET['oldprice'])){
  echo $_GET['oldprice'];
  }?>" >
</div>
  <br><br>
  <label for="product_type" id="product_type">Type Switcher</label>

<select id="productType" name="productType" value="<?php 
   if(isset($_GET['oldproducttype'])){
  echo $_GET['oldproducttype'];
  }?>" >
  <option>Type Switcher</option>
  <option value="dvd">DVD</option>
  <option value="furniture">Furniture</option>
  <option value="book">Book</option>
</select>
<div id="dvd" class="option_div" style="display:none">
<br>
<p>Please, provide size</p>
<div class="block">
  <label for="dvd_size" required>Size (MB)</label>
  <input type="text" id="size" name="dvd_size" >
</div>
</div>

<div id="furniture" class="option_div" style="display:none">
<br>
<p>Please, provide dimensions</p>
<div class="block">
  <label for="furniture_height" required>Height(CM)</label>
  <input type="text" id="height" name="furniture_height" >
</div>
<br>
<div class="block">
  <label for="furniture_width" required>Width (CM)</label>
  <input type="text" id="width" name="furniture_width" >
</div>
<br>
<div class="block">
  <label for="length" required>Length (CM)</label>
  <input type="text" id="length" name="furniture_length" >
</div>
</div>
<div id="book" class="option_div" style="display:none" >
<br>
<div class="block">
<p>Please, provide weight</p>
  <label for="book_weight" required>Weight (KG)</label>
  <input type="text" id="weight" name="book_weight" >
</div>
</div>

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
    $('#productType').change(function(){
        $('.option_div').hide();
        $('#' + $(this).val()).show();
    });
    
  
});
</script>

</body>
</html>

