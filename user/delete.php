<?php
$id=$_GET['productid'];
include("../connection.php");
$q="delete from cart where productid='$id'";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('Record deleted');window.location='viewcart.php';</script>";
?>