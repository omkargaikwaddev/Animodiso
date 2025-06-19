
<?php
 include("header.php");
?>
<link rel="stylesheet" href="stylesignup.css">
<div>
<div class="container">
<div class="row">
<div class="col-sn-12">
  <center><img src="images\191.jpeg" width=70% heigth=90px></center>

</div>
</div>
 

<div class="container">
      <header><h3>Signup Here</h3></header>
      <form id=frmreg method="post" name="myform"  class="form">
        <div class="input-box">
          <label>Name :</label>
          <input type="text" placeholder=" Enter Name " name="name"id=txtcn pattern="\D+" oninvalid="this.setCustomValidity('Pleasse enter valid name')" oninput="this.setCustomValidity('')" required;  required >
        </div>
        <div class="input-box">
          <label>Contact No :</label>
          <input type="text" placeholder=" Enter Contact Number " name="contact" id="txtcn" pattern ="\d{10}" oninvalid="this.setCustomValid(Please enter valid contact no)" oninput="this.setCustomValidity('')"required >
        </div>
        <div class="input-box">
          <label>Address :</label>
          <input type="text" placeholder="Enter Address" name="address" required >
        </div>
        <div class="input-box">
          <label>Email Id :</label>
          <input type="email" placeholder="Enter Email ID" name="emailid"  oninvalid="this.setCustomValid(Please enter valid Emailid)" oninput="this.setCustomValidity('')"required  >
        </div>

        <div class="input-box">
          <label>Password</label>
          <input type="password" placeholder="Enter Password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$" oninvalid="this.setCustomValidity('It Should include atleast one Small letters/Capital Letters/Special Symbols/0-9 numbers')" oninput="this.setCustomValidity('')" name="password" required>
        </div>
        <div class="input box">
        <label>Security Question:</label>
        <div class="column"  >
         <div class="select-box"  >
         <select name="securityquestion">
            <option>Question are</option>
             <option>What is your childhood nickname?</option>
            <option>In which city you born?</option>
            <option>what is your favourite hobby?</option>
            <option>What is your favourite food?</option>
            <option>Which game do you like?</option>
         </select>
         </div>
     </div>
       <div class="column">
        <div class="input-box">
            <label>Security Answer:</label>
        <input type="text" name="securityanswer">
        </div>
      </div> 

        <br>
        <center>
        <button type="submit" name="btnsub">Submit</button>            <button type="Reset" name="btnres">Reset</button>
          
        </center>
        <br>
      </form>
</div>
</div>
</div>
<?php
include("footer.php");
if(isset($_POST['btnsub']))
{
extract($_POST);
include("connection.php");
$q="insert into signup values('$name','$contact','$address','$emailid','$password','$securityquestion','$securityanswer')";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('registration successful');window.location='login.php'</script>";
}
?>
