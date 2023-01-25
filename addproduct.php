<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="seller.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<header class="header">
        <div class="logo">
            <a><img src="prezent.png"></a>
        </div>
        <div class="icon">
        <a href="seller.php"class="fas fa-user" id="menu-btn"></a>
        <a href="logout_admin.php"class="fa fa-sign-out" id="menu-btn"></a>
        </div>

</header>
<div class="new">
  <p>New Product</p>
</div>

<div id="add" class="tabcontent">
<form action="uploadproduct.php" method="post" enctype="multipart/form-data">
  <label for="img">Select image:</label>
  <input type="file" id="img" name="my_image" id="input">
  <p>Name:</P>
  <input type="text" placeholder="name" class="name" id="input" name="name">
  <P>Price:</P>
  <input type="text" placeholder="price" class="price" id="input" name="price" >
  <P>Quantity:</P>
  <input type="text" placeholder="quantity" class="quantity" id="input" name="quantity" >
  </br>
  <select class="for" name="for">
      <option value="" disabled selected>Category</option>
      <option value="women">Women</option>
      <option value="men">Men</option>
  </select>
</br>
  <input type="submit" id="btn" name="submit" value="Add"/>
  </form>
</div>

    
</body>
</html>