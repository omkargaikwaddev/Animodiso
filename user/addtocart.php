<?php
session_start();
include("header.php");
$productid=0;
$productprice=0;
$productname="";
$im="";
$email=$_SESSION["emailid"];
if(isset($_GET["productid"]))
{
    $productid=$_GET["productid"];
    $productprice=$_GET["productprice"];
}
include("connection.php");
$rs=mysqli_query($cn,"select*from product where productid=$productid");
if($a=mysqli_fetch_array($rs))
{
    $productname=$a['productname'];
    $im=$a['productimages'];
}

?>
<link rel="stylesheet"  href="styleaddtocart.css">
<h2 align=center>Order Details</h2>
<div class="row">
    <form id=frmreg method="post" name="myForm">
        <div class="input-group">
    <?php
    echo"<img src=\"images/$im\"width=200 height=200></div>";
    ?>
<br>
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
    <input id="productname" type="text" class="form-control" name="productname" placeholder="productname" value="<?php echo $productname; ?>"required readonly>
</div>
<br>
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
    <input id="productprice" type="text" class="form-control" name="productprice" placeholder="productprice" value="<?php echo $productprice; ?>"required readonly>
</div>
<br>
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
    <select id=qt name=qt onchange="cal()"class="form-control">
    <option>---select quantity---</option>
    <option value="1">1qty</option>
    <option value="2">2qty</option>
    <option value="3">3qty</option>
    <option value="4">4qty</option>
    <option value="5">5qty</option>
</select>

    <script>
        function cal()
        {
            var p,q,a;
            p=document.getElementById("productprice").value;
            q=document.getElementById("qt").value;
            a=p*q;
            document.getElementById("amt").value=a;
        }
    </script>
    </div>
    <br>
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
    <input id="amt" type="text" class="form-control" name="amt" placeholder="0"required readonly>
</div>
<br>

<button type="submit" class="btn btn-cyan" name="btnsub" id="btnsub">Add to cart</button>
    </form>
    </div>
    <?php
    include("footer.php");
    if(isset($_POST['btnsub']))
    {
        $email=$_SESSION['emailid'];
        $qt=$_POST['qt'];
        $am=$_POST['amt'];
        include("connection.php");
        $q="insert into cart(emailid,productid,productimages,productname,productprice,productquantity,totalamount)values('$email','$productid','$im','$productname',$productprice,$qt,$am)";
        mysqli_query($cn,$q);
        mysqli_close($cn);
echo"<script>alert('Product Added To Cart Successfully...');window.location='productdisplay.php'</script>";
       

    }
    ?>