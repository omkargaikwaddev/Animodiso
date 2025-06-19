<?php
session_start();
include("header.php");
?>
<center>
<h1 align=center>Your Cart</h1>

</center>
<div class="row">
<table class=table>
<thread>
<tr>
<th>Actions</th><th>Product Id</th><th>Product Images</th><th>Product Name</th><th>Product Price</th><th>Product Quantity</th><th>Total Amount</th>
</tr>
</thead>
<tbody>
<?php
include("connection.php");
$u=$_SESSION["emailid"];
$q="select emailid,cart.productid,cart.productimages,cart.productname,cart.productprice,cart.productquantity,cart.totalamount from cart,product where cart.productid=product.productid and cart.emailid='$u'";
$rs=mysqli_query($cn,$q);
while($a=mysqli_fetch_array($rs))
{
extract($a);
echo "<tr>";
echo "<td><a href=delete.php?emailid=$u&productid=$productid>Delete</a> </td><td>$productid</td><td><img src='../images/$productimages' width=100 height=100></td><td>$productname</td><td>$productprice</td><td>$productquantity</td>
<td>$totalamount</td>";
$totalamount=$totalamount-$productprice;
echo "</tr>";
}
$total=0;
$q="select sum(totalamount) from cart where emailid='$u'";
$rs=mysqli_query($cn,$q);
if($a=mysqli_fetch_array($rs))
{
 $total=$a[0];
}
echo "<tr><td></td><td></td><td></td><td></td><td></td><td><b>Total Amount</b></td><td><b>$total</b></td></tr>";
mysqli_close($cn);

?>
</tbody>
</table>
<center><a class="btn btn-primary" href='payment.php?amount=<?php echo $total; ?>'>Confirm Order and Proceed to payment</a></center>
</div>

<?php
include("footer.php");
?>