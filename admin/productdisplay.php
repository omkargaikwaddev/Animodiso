<?php
include("header.php");
?>
<h1 align=center> OUR PRODUCTS</h1>
<div class= "row">


<?php
include("connection.php");
$rs=mysqli_query($cn,"select*from product");
$i=0;
while($a=mysqli_fetch_array($rs))
{
    $im=$a["productimages"];
    $id=$a["productid"];
    $pn=$a["productname"];
    $pr=$a["productprice"];
    echo"<div class='col-md-3'>";
    echo"<div class=\"thumbnail\">";
    echo"<a href=\"images/$im\"target=\"_blank\">";
    echo"<img src=\"images/$im\"class=\"images-responsive\"width=50% height=40%>";
    echo"<div class=\"caption\">";
    echo"Product Id:$id<br><b>$pn</b><br>Price:$pr</div></a><a class=\"btn btn-primary\"href=buy.php?productimages=$im&productid=$id&productname=$pn&productprice=$pr>Buy Now</a></div></div>";
    $i++;
    if($i==4)
    {
        echo"</div>";
        echo"<div class=\"row\">";
$i=0;
    }
}
