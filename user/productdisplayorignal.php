<?php
include("header.php");
$tools="Tools";
if(isset($_GET["btype"]))
$tools=$_GET["btype"];
?>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<marquee behavior=alternate>
<img src="images\d1.jpg" width=750 height=50%>
<img src="images\Animal house.jpg" width=750 height=50%>
<img src="images\d3.jpg" width=750 height=50%>
</marquee>
</div>
</div>
</div>
<link rel="stylesheet" type="text/css" href="styleproductdisplay.css">
<h2 align=center> OUR PRODUCTS</h2>
<div class= "row">

<?php
include("connection.php");
$rs=mysqli_query($cn,"select*from product");
$i=0;
while($a=mysqli_fetch_array($rs))
{
  $id=$a["productid"];
    $im=$a["productimages"];
    $pn=$a["productname"];
    $pr=$a["productprice"];
    echo"<div class='col-md-3'>";
    echo"<div class=\"thumbnail\">";
    echo"Product Id:$id";
    echo"<a href=\"images/$im\" target=\"_blank\">";
    echo"<img src=\"images/$im\"class=\"images-responsive\"width=50% height=40%>";
    echo"<div class=\"caption\">";
    echo"<b>$pn</b><br>Price:$pr</div></a><a class=\"btn btn-primary\"href=buy.php?productimages=$im&productid=$id&productprice=$pr>Buy Now</a>                <a class=\"btn btn-primary\"href=addtocart.php?productimages=$im&productid=$id&productprice=$pr>Add to Cart</a></div></div>";
    $i++;
    if($i==4)
    {
        echo"</div>";
        echo"<div class=\"row\">";
        $i=0;
    }
}
?>
<?php
include("footer.php");
?>