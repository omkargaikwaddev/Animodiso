<?php
 session_start();
 include("header1.php");
?>

<head>
  <style>
    *{
    margin: 0;
    padding: 0;
}
form{
    padding: 10px;
    align-items: center;
    justify-content: center;
    background-color: rgba(0, 0, 0, 0.5);
    width: 700px;
    border-radius: 9.5px;
    /*border: 1px solid black;*/
    box-shadow: inset -5px -5px rgba(44, 43, 43, 0.5);
}
h1{
    color: white;
    font-size: 3rem;
    border-bottom: 4px solid rgba(255, 255, 255, 0.5);
}
.drnm{
    padding: 5px;
    margin: 10px;
    width: 70%;
    border: none;
    outline: none;
    border-radius: 10px;
}
.dimg{
    padding: 5px;
    margin: 10px;
    width: 70%;
}
.dphno{
    padding: 5px;
    margin: 10px;
    width: 70%;
}
.dqualification{
    padding: 5px;
    margin: 10px;
    width: 70%;
}
.demail{
    padding: 5px;
    margin: 10px;
    width: 70%;
}
.btn{
    padding: 10px 20px;
    background-color: gray;
    width: 50%;
    color: black;
}
@media screen and (max-width:976px){

}
  </style>
</head>

<center>
<form id=frmreg method="post" name="myform" enctype="multipart/form-data">
<h1 align=center>Add Doctors</h1>
  <div class="drnm">
    <label for="name">Doctor Name:</label>
    <input type="name" class="form-control" name="dnm">
  </div>
  <br>
  <div class="dimg">
    <span ckass="input-group-addon"><i class="glyphicon glyphicon-camera"></i><span><input ng-model="address" id="address" type="file" class="form-control" name="file1" placeholder="Select Image" required>
  </div>
  <div class="dphno">
    <label for="phnno">Phone no:</label>
    <input type="number" class="form-control" name="dph">
  </div>
  <div class="dqualification">
    <label for="qualification">Qualification</label>
    <select name="qua" class="form-control">
        <option>---select doctor according qualification---</option>
        <option value="cardiologist">Cardiologist</option>
        <option value="MD">Medicine in cardiology</option>
        <option value="BHMS">BHMS</option>
        <option value="DM">Doctor of medicine</option>
        <option value="PC"> Pediatric Cardiology</option>
        <option value="mch">MCh - Cardio Thoracic and Vascular Surgery</option>
        <option value="IC">Interventional Cardiology</option>
        <option value="FESC">Fellowship sEuropean Society of Cardiology (FESC) </option>
        <option value="CS">Cardiac Surgeon</option>
        <option value="MBBS">DM - Cardiology | MD - General Medicine | MBBS</option>
    </select>
  </div>
  <div class="demail">
    <label for="email">Doctor Email:</label>
    <input type="email" class="form-control" name="demail">
  </div>

  <br>
  <br>
    <div class="btn"><center>
        <button type="submit" class="btn btn-primary" id="btnsub" name="btnsub">Submit</button>
    </center></div>
  
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

<h2 align=center>Doctor's</h2>
<hr>
<?php
include("connection.php");
$q="select * from doctors";
$rs=mysqli_query($cn,$q);
?>
<center>
<table align="center" width="95%" border="3px">
<tr>
<th>Dr Name</th><th>PhNo</th><th>Qualification</th><th>Email</th><th>DrImage</th><th>Actions</th>
</tr>

<?php
while($a=mysqli_fetch_array($rs))
{
extract($a);
echo "<tr>";
echo "<td>$DrName</td><td>$PhNo</td><td>$Qualification</td><td>$Email</td><td><img src='images/$DrImg' width=150 height=150></td><td><a href=deldoc.php?DrName=$DrName>Delete</a> <a href=updoc.php?DrName=$DrName>Update</a></td>";
echo "</tr>";
}
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
$ptr2=fopen("../images/$fn","w");
$data=fread($ptr1,$s);
fwrite($ptr2,$data);
fclose($ptr1);
fclose($ptr2);
include("connection.php");
$q="insert into doctors (drname,drimg,phno,qualification,email)values('$dnm','$fn','$dph','$qua','$demail')";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('Doctor added successfully');window.location='index.php'</script>";
}
?>