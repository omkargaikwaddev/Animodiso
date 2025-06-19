<?php
include("header.php");
$cat="Shop for Dogs";
if(isset($_GET["productcategories"]))
$cat=$_GET["productcategories"];
?>

<link rel="stylesheet" type="text/css" href="styleproductdisplay.css">
<h2 align=center> <?php echo ucfirst($cat);?> Products</h2>
<div class= "row">

<?php
include("connection.php");
$rs=mysqli_query($cn,"select*from product where productcategories='$cat'");
$i=0;
while($a=mysqli_fetch_array($rs))
{
    $id=$a["productid"];
    $im=$a["productimages"];
    $pn=$a["productname"];
    $pr=$a["productprice"];
    $cat=$a["productcategories"];
    echo"<div class='col-md-3'>";
    echo"<div class=\"thumbnail\">";
    echo"<a href=\"images/$im\" target=\"_blank\">";
    echo"<img src=\"images/$im\"class=\"images-responsive\"width=50% height=40%>";
    echo"<div class=\"caption\">";
    echo"<b>$pn</b><br>Price:$pr</div></a><a class=\"btn btn-primary\"href=buy.php?productimages=$im&productid=$id&productprice=$pr&productcategories=$cat>Buy Now</a>                <a class=\"btn btn-primary\"href=addtocart.php?productimages=$im&productid=$id&productprice=$pr>Add to Cart</a></div></div>";
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