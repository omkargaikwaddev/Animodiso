<?php
session_start();
include("header.php");
$dnm="";
$dph="";
$qua="";
$demail="";
$dim="";

if(isset($_GET["DrName"]))
{
$dnm=$_GET["DrName"];
$demail=$_GET["Email"];
}
include("connection.php");
$rs=mysqli_query($cn,"select * from doctors where DrName='$dnm'");
if($a=mysqli_fetch_array($rs))
{
  $dph=$a['PhNo'];
  $dim=$a['DrImg'];
}
?>

<head>
 <link rel="stylesheet" href="stylebook.css">
</head>
<h1 align=center>Appointment Details</h1>
<?php
echo "<center><img src=\"images/$dim\" width=200 height=200></center></div>";
?>

<br>
<body>
<form id=frmreg method="post" name="myForm">
  <div class="inner-layer">
    <div class="container">
      <div class="row">
        <div class="col-sm-7">
          <div class="content">
            <h2>Book Your Time Slot Now & also Save Your Time</h2>
          </div>
        </div>
        <div class="col-sm-5">
          <div class="form-data">
            <div class="form-head">
              <h2>Book Appointment</h2>
            </div>
            <br>
            <div class="form-body">
              <div class="row form-row">
                <input type="text" placeholder="Enter Full Name" pattern="\D+" oninvalid="this.setCustomValidity('Please enter valid name')" oninput="this.setCustomValidity('')" class="form-control" id="fnm" name="fnm">
              </div>
              <div class="row form-row">
                <input type="text" placeholder="Enter Mobile Number" pattern="\d{10}" oninvalid="this.setCustomValidity('Please enter valid contact number')" oninput="this.setCustomValidity('')" class="form-control" id="mono" name="mobno">
              </div>
              <div class="row form-row">
                <input type="email" placeholder="Enter Email Address" oninvalid="this.setCustomValidity('Please enter valid email')" oninput="this.setCustomValidity('')" class="form-control" id="email" name="email">
              </div>
              <div class="row form-row">
                <input type="date" placeholder="Appointment Date" class="form-control" id="dt" name="dt">
              </div>

              <h4>Address Deatils</h4>

              <div class="row form-row">
                <div class="col-sm-6">
                  <input type="text" placeholder="Enter Area" class="form-control" id="area" name="area">
                </div>
                <div class="col-sm-6">
                  <input type="text" placeholder="Enter City" class="form-control" id="city" name="city">
                </div>
              </div>
              <div class="row form-row">
                <div class="col-sm-6">
                  <input type="text" placeholder="Enter State" class="form-control" id="state" name="state">
                </div>
                <div class="col-sm-6">
                  <input type="text" placeholder="Postal code" class="form-control" id="pcode" name="pcode">
                </div>
              </div>
              <div class="row form-row">
                <center><button class="btn btn-success btn-appointment" id="btnba" name="btnba">
                    Book Appointment
                </button></center>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</body>  


<?php
include("footer.php");
if(isset($_POST['btnba']))
{
  $email=$_SESSION['emailaddress'];
  extract($_POST);
  include("connection.php");
  $q="insert into book(FullNm,MobNo,Email,Date,Area,City,State,Code) values('$fnm','$mobno','$email','$dt','$area','$city','$state',$pcode)";
  mysqli_query($cn,$q);
  mysqli_close($cn);
  echo"<script>alert('Your booking recorded successfully');window.location='doctor.php'</script>";
}
?>
