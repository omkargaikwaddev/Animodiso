<?php
include("header.php");
?>
<link rel="stylesheet" href="stylelog.css">
<body>
    <div class="container">
      <div class="title">
        <h1>Login Here...</h1>
      </div>
      
  <div class="center">
  <h1 face="Times new roman">Log In</h1>
  <?php
    if(isset($_POST['btnsub']))
    {
      $email=$_POST['email'];
      $pwd=$_POST['pwd'];
      include("connection.php");
      $q="select * from adminlogin where emailid='$email' and password='$pwd'";
      $result=mysqli_query($cn,$q);
      if($a=mysqli_fetch_array($result))
      {
        $_SESSION['adminname']=$email;
        echo"<script>alert ('login Sucessfully');window.location='index1.php'</script>";
      }
      else
        echo"<center><b><font color=red>Incorrect email or password</font></b></center>";
        mysqli_close($cn);
    }
  ?>
       <div class="form">
        <form method="post">
         
         <div class="inputf">
           <label>Email:</label>
           <input type="email" class="input" name="email" placeholder="Username" required>
         </div> 
         <div class="inputf">
           <label>Password:</label>
           <input type="password" class="input" name="pwd"  placeholder="Password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{5,}$"
           oninvalid="this.setCustomValidity('password should include atleast one small letters/Capital Letters/Special symbol/0-9 numbers')" oninput="this.setCustomValidity('')" required>
         </div>
         <div class="pass"><a href="forgetpass.php">Forget Password?</a></div>
         <div class="bt">
           <button type="Submit" name="btnsub" class="btn btn-success" >Login</button> 
         </div>
       </form>
      </div>
   </div>
</body>