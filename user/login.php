<?php
session_start();
 include("header.php");
?>

<div class="container">
<div class="row">
<div class="col-sn-12">
<link rel="stylesheet" href="style.css">
</div>
</div>

 <div class="center">
  <h1 face="Times new roman">Log In</h1>
  <?php
    if(isset($_POST['btnsub']))
    {
      $email=$_POST['email'];
      $pwd=$_POST['pwd'];
      include("connection.php");
      $q="select * from signup where emailid='$email' and password='$pwd'";
      $result=mysqli_query($cn,$q);
      if($a=mysqli_fetch_array($result))
      {
        $_SESSION['emailid']=$email;
        echo"<script>window.location='user/index.php'</script>";
      }
      else
        echo"<center><b><font color=red>Incorrect email or password</font></b></center>";
        mysqli_close($cn);
    }
  ?>
    <form method="post">
     <div class="txt_field">
      <input type="text" name="email" required>
      <label>Email Address</label>
     </div>
     <div class="txt_field">
      <input type="password" name="pwd" required>
      <span></span>
      <label>Password</label>
     </div>
     <div  class="pass"><a href=forget.php>Forget Password?</a></div>
     <input type="submit" value="Login" name="btnsub">
    
   </form>
</div>

</div>
<?php
 include("footer.php");
?> 