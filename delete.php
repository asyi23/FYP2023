<?php
session_start();
include("connect.php");
$id=$_SESSION["id"];

$sql = "DELETE FROM carts WHERE id='" . $_GET["userid"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    header("Location:cart.php");

} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>