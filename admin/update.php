<?php
include("header1.php");
$productid=$_GET['productid'];
include("connection.php");
$q="select * from product where productid='$productid'";
$rs=mysqli_query($cn,$q);
$productid="";
$productname="";
$productcategories="";
$productimages="";
$productprice="";
if($a=mysqli_fetch_array($rs))
{
$productid=$a['productid'];
$productname=$a['productname'];
$productcategories=$a['productcategories'];
$productimages=$a['productimages'];
$productprice=$a['productprice'];
}
?>
<h1 align=center>Update Products Details Here</h1>
<div class="row">
<div class="col-sm-4">
<form id=frmreg method="post" name="myForm" enctype="multipart/form-data">
<h5><b>Product Id :</b></h5>
<input type=text name=productid value="<?php echo $productid; ?>">
<br>
<h5><b>Product Name :</b></h5>
<input type=text name=productname value="<?php echo $productname; ?>">
<br>
<h5><b>Product Image :</b></h5>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-camera"></i></span>
<img src="images/<?php echo $productimages; ?>" width=100 height=100><br>
    <input ng-model="address" id="address" type="file" class="form-control" name="file1" placeholder="Select image" required>
  </div>
<br>
<h5><b>Product Price :</b></h5>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
    <input ng-model="contact" id="productprice" type="text" class="form-control"name="productprice" placeholder="Price" pattern="\d+" required value="<?php echo $productprice;
?>">
  </div>

<br>
        <button type="submit" class="btn btn-primary" id="btnsub"name=btnsub>Update</button>
        <button type="reset" class="btn btn-danger" id="btnres">Reset</button>


</form>

</div>
<div class="col-sm-8">

<br>

<h1>Products</h1>


<table class=table>
<thead>
<tr>
<th>ProductId</th><th>Productname</th><th>Product Categories</th><th>Image</th><th>Price</th><th>


Actions</th>
</tr>
</thead>
<tbody>
<?php
include("connection.php");
$q="select * from product";
$rs=mysqli_query($cn,$q);
while($a=mysqli_fetch_array($rs))
{
$productid=$a['productid'];
$productname=$a['productname'];
$productcategories=$a['productcategories'];
$productimages=$a['productimages'];
$productprice=$a['productprice'];
echo "<tr>";
echo "<td>$productid</td><td>$productname</td><td>$productcategories</td><td><img src=images/$productimages width=100height=100></td><td>$productprice</td><td><a class='btn btn-danger' href=delete.php?productid=$productid>Delete</a> <a class='btn btn-info' href=up.php?productid=$productid>Update</a></td>";
echo "</tr>";
}


?>
</tbody>
</table>
</div>

</div>


<?php
include("footer.php");
if(isset($_POST['btnsub']))
{
$productid=$_POST["productid"];
$productname=$_POST['productname'];
$ty=$_POST['productcategories'];
$productprice=$_POST['productprice'];
//code for image uploading
$fn=$_FILES['file1']['name'];
$s=$_FILES['file1']['size'];
$tnm=$_FILES['file1']['tmp_name'];


$ptr1=fopen($tnm,"r");
$ptr2=fopen("images/$fn","w");


$data=fread($ptr1,$s);
fwrite($ptr2,$data);
fclose($ptr1);
fclose($ptr2);
//end of image uploading
include("../connection.php");
$q="update product set productname='$productname',productcategories='$productcategories',productimages='$fn',productprice=$productprice where productid=$productid";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('product Updated Sucessfully');window.location='productupload.php'</script>";
}


?>