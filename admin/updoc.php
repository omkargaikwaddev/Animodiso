<?php
include("header1.php");
$dnm=$_GET['DrName'];
include("connection.php");
$q="select * from doctors where DrName='$dnm'";
$rs=mysqli_query($cn,$q);
$dnm="";
$dph="";
$qua="";
$dim="";
$demail="";
if($a=mysqli_fetch_array($rs))
{
$dnm=$a['DrName'];
$dim=$a['DrImg'];
$dph=$a['PhNo'];
$qua=$a['Qualification'];
$demail=$a['Email'];
}
?>

<head>
    <style>
        /* Center the form */
.row {
  display: flex;
  justify-content: center;
}

/* Add some margin to the top */
.row {
  margin-top: 20px;
}

/* Style the form */
form {
  width: 100%;
  max-width: 600px;
  padding: 20px;
  background-color: #f9f9f9;
  border: 1px solid #ccc;
  border-radius: 5px;
}
* Style the form elements */
form input[type=text], form input[type=email], form input[type=file] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

/* Style the form button */
form button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* Style the form button on hover */
form button:hover {
  background-color: #45a049;
}
/* Style the form reset button */
form button[type=reset] {
  background-color: #f44336;
}

/* Style the form reset button on hover */
form button[type=reset]:hover {
  background-color: #da190b;
}

/* Style the form image */
form img {
  display: block;
  margin-bottom: 10px;
  max-width: 200px;
  height: auto;
}

/* Style the form input group */
form .input-group {
  margin-bottom: 20px;
}
/* Style the form input group icon */
form .input-group-addon {
  background-color: #f9f9f9;
  border: none;
  padding: 10px;
}

/* Style the form input group icon on hover */
form .input-group-addon:hover {
  background-color: #eeeeee;
}

/* Style the form input group input */
form .input-group input[type=file] {
  padding: 0;
  height: auto;
}

/* Style the form input group input on hover */
form .input-group input[type=file]:hover {
  background-color: #f9f9f9;
}
/* Style the form input group input on focus */
form .input-group input[type=file]:focus {
  outline: none;
  box-shadow: none;
}

/* Style the form error messages */
form .error {
  color: #ff0000;
  margin-bottom: 10px;
}
    </style>
</head>

<h1 align=center>Update Doctor Details Here</h1>
<div class="row">
<div class="col-sm-8">
<form id=frmreg method="post" name="myForm" enctype="multipart/form-data">

<br>
<input type=text name=DrName value="<?php echo $dnm; ?>">
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-camera"></i></span>
    <img src="images/<?php echo $dim; ?>" width=200 height=200><br>
    <input ng-model="address" id="address" type="file" class="form-control" name="file1" placeholder="Select image" required>
</div>
<input type=text name=PhNo value="<?php echo $dph; ?>"><br>
<input type=text name=Qualification value="<?php echo $qua; ?>"><br>
<input type=email name=Email value="<?php echo $demail; ?>">
<br>
    <button type="submit" class="btn btn-primary" id="btnsub"name=btnsub>Update</button>
    <button type="reset" class="btn btn-danger" id="btnres">Reset</button>

</form>
</div>
</div>

<br>
<div class="col-sm-8">
<h1>Doctor</h1>
<table class=table>
<thead>
<tr>
<th>DrName</th><th>DrImage</th><th>Phno</th><th>Qualification</th><th>Email</th><th>Actions</th>
</tr>
</thead>

<tbody>
<?php
include("connection.php");
$q="select * from doctors";
$rs=mysqli_query($cn,$q);
while($a=mysqli_fetch_array($rs))
{
$dnm=$a['DrName'];
$dim=$a['DrImg'];
$dph=$a['PhNo'];
$qua=$a['Qualification'];
$demail=$a['Email'];
echo "<tr>";
echo "<td>$dnm</td><td><img src=images/$dim width=100 height=100></td><td>$dph</td><td>$qua</td><td>$demail</td><td><a class='btn btn-danger' href=deldoc.php?DrName=$dnm>Delete</a> <a class='btn btn-info' href=updoc.php?DrName=$dnm>Update</a></td>";
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
$dnm=$_POST["DrName"];
$dph=$_POST['PhNo'];
$qua=$_POST['Qualification'];
$demail=$_POST['Email'];
//code for image uploading
$fn=$_FILES['file1']['name'];
$s=$_FILES['file1']['size'];
$tnm=$_FILES['file1']['tmp_name'];
$ptr1=fopen($tnm,"r");
$ptr2=fopen("imgs/$fn","w");
$data=fread($ptr1,$s);
fwrite($ptr2,$data);
fclose($ptr1);
fclose($ptr2);
//end of image uploading
include("connection.php");
$q="update doctors set PhNo='$dph',Qualification='$qua',Email='$demail',DrImg='$fn' where DrName='$dnm'";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('Doctor Updated Successfully');window.location='adddoct.php'</script>";
}
?>