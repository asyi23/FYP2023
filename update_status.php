<?php
session_start();
include("connect.php");
$seller =$_SESSION['id'];

if(isset($_POST['update'])){
                
    $newstatus = $_POST['status'];
    $id2 = $_POST['update'];
    echo $id2;
    $update = "UPDATE neworder SET order_status = '$newstatus' WHERE order_id = '$id2'";
  if (mysqli_query($conn, $update)) {
    echo "New updated created successfully";
    
    header("Location:seller.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  
  }


?>