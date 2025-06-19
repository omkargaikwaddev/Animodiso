<link rel="stylesheet" href="stylepayment.css">
<?php
session_start();
include("header.php");
$am=0;
if(isset($_GET["amount"]))
{
$am=$_GET["amount"];
}
include("connection.php");
?>
<link rel="stylesheet" href="stylepayment.css">
<h1 align=center>Payment Details</h1>
<div class="row">
<form id=frmreg method="post" name="myForm">
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
    <input id="Flavour" type="text" class="form-control" name="amount" placeholder="Amount" value="<?php echo $am; ?>" required readonly>

  </div>
<br>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
    <h5>Only Cash On Delivery Available</h5>
  </div>
<br>
  
        <button type="submit" class="btn btn-primary" id="btnsub" name=btnsub>Place Order</button>
        <button type="reset" class="btn btn-danger" id="btnres" >Cancel</button>
</form>
</div>
<?php
include("footer.php");
if(isset($_POST['btnsub']))
{
$unm=$_SESSION['emailid'];
$wt=$_POST['mode'];
$am=$_POST['amount'];
$add=$_POST['num'];
include("connection.php");
$dt=date("d-m-Y");
$q="insert into payment(odt,emailid,mode,amount) values('$dt','$unm','$wt',$am)";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('Thank You for ordering..');window.location='productdisplay.php'</script>";
}

?>
