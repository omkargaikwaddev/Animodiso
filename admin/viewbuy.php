<?php
include("header1.php");
?>

<h1 align=center>Order Details</h1>
 <table class="table">
    <thead>
      <tr>
         <th>emailid</th>
        <th>productimages</th>
        <th>productname</th>
        <th>productprice</th>
        <th>productquantity</th>
       <th>totalamount</th>
      </tr>
    </thead>
    <tbody>
<?php
include("connection.php");

$rs=mysqli_query($cn,"select * from buy ");
while($a=mysqli_fetch_array($rs))
{
 extract($a);

echo "<tr><td>$emailid</td><td>$productimages</td><td>$productname</td><td>$productprice</td><td>$productquantity</td><td>$totalamount</td></tr>";
}
?>
    </tbody>
  </table>
<?php
include("footer.php");
?>