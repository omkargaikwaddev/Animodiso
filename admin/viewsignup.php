<?php
include("header1.php");
?>

<h1 align=center>Sign Up Details</h1>
<hr>
<?php
include("connection.php");

$rs=mysqli_query($cn,"select * from signup ");
?>

 <table align="center" width="95%" border="3px">
      <tr>
        <th>name</th>
        <th>contact</th>
        <th>address</th>
        <th>emailid</th>
       <th>password</th>
       <th>securityquestion</th>
       <th>securityanswer</th>
      </tr>
<?php
while($a=mysqli_fetch_array($rs))
{
 extract($a);

echo "<tr><td>$name</td><td>$contact</td><td>$address</td><td>$emailid</td><td>$password</td><td>$securityquestion</td><td>$securityanswer</td></tr>";
}
mysqli_close($cn);
?>
    </tbody>
  </table>
<?php
include("footer.php");
?>