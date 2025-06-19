<?php
session_start();
include("header.php");
?>

<h1 align=center>Recover password Here</h1>
<div class="row">
<form id=frmreg method="post" name="myForm">
  <br>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input ng-model="unm" id="unm" type="text" class="form-control" name="unm" placeholder="UserName" required>
  </div>

<br>

<br>
        <button type="submit" class="btn btn-primary" id="btnsub" name=btnsub>Submit</button>
        <button type="reset" class="btn btn-danger" id="btnres">Reset</button>

</form>

<?php
if(isset($_POST['btnsub']))
{
$unm=$_POST['unm'];

include("connection.php");
$q="select * from signup where emailid='$unm'";
$result=mysqli_query($cn,$q);
if($a=mysqli_fetch_array($result))
{
 $sq=$a["securityquestion"];
 ?>
<form method=post>
<input type=hidden name=txtun class=form-control value="<?php echo $unm; ?>"><br>
<input type=text class=form-control name=squ value="<?php echo $sq; ?>" readonly><br>
<input type=text class=form-control name=ans value=""><br>
<input type=submit name=btns value="Submit">
</form>
<?php


}
mysqli_close($cn);
}
?>

<?php
if(isset($_POST["btns"]))
{

  $un=$_POST["txtun"];
  $sq=$_POST["squ"];
$an=$_POST["ans"];
include("connection.php");
$q="select * from signup where emailid='$un' and securityquestion='$sq' and securityanswer='$an'";
$result=mysqli_query($cn,$q);
if($a=mysqli_fetch_array($result))
{
 $answer=$a["password"];
echo "<h2><font color=green><b>Your password is $answer</b></font></h2>";
}
}
?>

</div>


<?php
include("footer.php");

?>