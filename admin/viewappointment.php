<?php
include("header1.php");
?>

<h1 align=center>Appointment Details</h1>
<hr>
<?php
include("connection.php");

$rs=mysqli_query($cn,"select * from book ");
?>

 <table align="center" width="95%" border="3px">
      <tr>
        <th>Name</th>
        <th>Contact</th>
	<th>Emailid</th>
        <th>Date</th>
	<th>City</th>
	<th>State</th>
	<th>Code</th>
	
             </tr>
<?php
while($a=mysqli_fetch_array($rs))
{
 extract($a);

echo "<tr><td>$FullNm</td><td>$MobNo</td><td>$Email</td><td>$Date</td><td>$City</td><td>$State</td><td>$Code</td></tr>";
}
mysqli_close($cn);
?>
    </tbody>
  </table>
<?php
include("footer.php");
?>