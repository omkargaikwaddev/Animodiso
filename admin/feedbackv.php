<?php 
include("header.php");
?>
<html>
<body style="background-color:black">
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<marquee behavior=alternate>
<img src="images\panda.jpg" width=750 height=50%>
<img src="images\panda.jpg" width=750 height=50%>
</marquee>
</div>
</div>
  
  </div>
  <center>
<?php
include("connection.php");
$rs=mysqli_query($cn,"select*from feedback");
while($a=mysqli_fetch_array($rs))
{
    $nm=$a["name"];
    $im=$a["email"];
    $cm=$a["comment"];
    echo"<div class=\"row\"><div class='col-md-6'>";
    echo "<div class=\"thumbnail\">";
    echo "<div class=\"caption\">";
    echo"<b>$nm</b><br><b>$im</b><br>$cm</div></div></div></div>";
}
?>
</center>
</body>
</html>
<?php
include("footer.php");
?>