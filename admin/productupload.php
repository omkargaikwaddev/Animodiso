<?php
include("header1.php");
?>
<link rel="stylesheet" href="styleproductupload.css">

<center>
<form id=frmreg method="post" name="myform" enctype="multipart/form-data">
<h1 align=center>Add Products</h1>
  <div class="productname">
    <label for="productname">Product Name:</label>
    <input type="productname" class="form-control" name="productname">
  </div>
  <div class="productprice">
    <label for="productprice">Product Price:</label>
    <input type="productprice" class="form-control" name="productprice">
  </div>
  <div class="img">
    <label for="productimage">Product Images:</label>
<span class="input-group-addon"><i class="glyphicon glyphicon-camera"></i><span>
<input ng-model="address" id="address" type="file" class="form-control" name="file1" placeholder="Select Image" required>
  </div>
  <br>
  <div class="productquantity">
    <label for="productquantity">Product Quantity:</label>
    <input type="productquantity" class="form-control" name="productquantity">
  </div>
  <div class="productcategories">
    <label for="productcategories">Product Category:</label>
  <select id=productcategories name=productcategories onchange="cal()"class="form-control">
    <option>---select  Product categories---</option>
    <option value="Shop for Dogs">Shop for Dogs</option>
    <option value="Shop for  Cats">Shop for  Cats</option>
    <option value="Shop for Horses">Shop for Horses</option>
    <option value="Shop for Cows">Shop for Cows</option>
</select>
</div>
<br>
  <center><div class="btn">
  <button type="submit" class="btn btn-primary" id="btnsub" name=btnsub>Submit</button>
  </div></center>
</form>
</center>

<html>
  <head>
    <style>
      h2{
        font-weight:bold;
        text-decoration:underline;
      }
    </style>
  </head>



<h2 align=center>Available Products</h2>
<hr>
<?php
include("connection.php");
$q="select * from product";
$rs=mysqli_query($cn,$q);
?>
<center>
<table align="center" width="95%" border="3px">
<tr>
<th>Product ID</th><th>Product Name</th><th>Product Categories<th>Price</th><th>Images</th><th>Actions</th>
</tr>
<?php
while($a=mysqli_fetch_array($rs))
{
extract($a);
echo "<tr>";
echo "<td>$productid</td><td>$productname</td><td>$productcategories</td><td>$productprice</td><td><img src='../images/$productimages' width=100 height=100></td><td><a href=delete.php?productid=$productid>Delete</a> <a href=update.php?productid=$productid>Update</a></td>";
echo "</tr>";
}
mysqli_close($cn);
?>
</table>
</center>
</body></html>
<?php
include("footer.php");
if(isset($_POST['btnsub']))
{
extract($_POST);
$fn=$_FILES['file1']['name'];
$s=$_FILES['file1']['size'];
$tnm=$_FILES['file1']['tmp_name'];
$ptr1=fopen($tnm,"r");
$ptr2=fopen("images/$fn","w");
$data=fread($ptr1,$s);
fwrite($ptr2,$data);
fclose($ptr1);
fclose($ptr2);
include("connection.php");
$q="insert into product(productname,productprice,productimages,productquantity,productcategories) values('$productname','$productprice','$fn','$productquantity','$productcategories')";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('Product Added Successfully..');window.location='productupload.php'</script>";
}
?>