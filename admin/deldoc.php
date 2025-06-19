<?php
$dnm=$_GET['DrName'];
include("../connection.php");
$q="delete from doctors where DrName='$dnm'";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('Record deleted');window.location='adddoct.php'</script>";
?>