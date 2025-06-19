<?php
include("header.php");
?>
<link href="styleproductdisplay.css" rel="stylesheet" type="text/css">

<h2 align=center> OUR PRODUCTS</h2>
<div class= "row">
<?php
include("connection.php");
$rs=mysqli_query($cn,"select*from product");
$i=0;
while($a=mysqli_fetch_array($rs))
{
    $im=$a["productimages"];
    $pn=$a["productname"];
    $pr=$a["productprice"];
    echo"<div class='col-md-3'>";
    echo"<div class=\"thumbnail\">";
    echo"<a href=\"images/$im\"target=\"_blank\">";
    echo"<img src=\"images/$im\" style=\"width:95%;height:150px\">";
    echo"<div class=\"caption\">";
    echo"<b>$pn</b><br>Price:$pr</div></a><a class=\"btn btn-primary\"href=signup.php?productimages=$im & productprice=$pr>Buy Now</a></div></div>";
    $i++;
    if($i==4)
    {
        echo"</div>";
        echo"<div class=\"row\">";
$i=0;
    }
}
?>
</div>
<?php
include("footer.php");
?>