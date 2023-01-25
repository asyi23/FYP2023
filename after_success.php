<?php
session_start();
include("connect.php");
$id=$_SESSION["id"];

$sql = "DELETE FROM carts WHERE buyer='$id'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    header("Location:prac2.php");

} else {
    echo "Error deleting record: " . mysqli_error($conn);
}






mysqli_close($conn);


?>