<?php
 include("header.php");
?>

<h1 align=center>Our Doctors</h1>
<div class="row">

    <?php
    include("connection.php");
    $rs=mysqli_query($cn,"select*from doctors");
    $i=0;
    while($a=mysqli_fetch_array($rs))
    {
        $dnm=$a["DrName"];
        $dim=$a["DrImg"];
        $dph=$a["PhNo"];
        $qua=$a["Qualification"];
        $demail=$a["Email"];
        echo"<div class='col-md-3'>";
        echo"<div class=\"thumbnail\">";
        echo"<a href=\"imgs/$dim\"target=\"_blank\">";
        echo"<img src=\"imgs/$dim\"class=\"img-responsive\"width=80% height=60%>";
        echo"<div class=\"caption\">";
        echo"<center><b>$dnm</b><br><b>DrEmail:$demail</b></center></div></a><center><a class=\"btn btn-primary\"href=booknow.php?DrName=$dnm&phno=$dph>Book Now</a></center></div></div>";
        $i++;
        if($i==4)
        {
            echo"</div>";
            echo"<div class=\"row\">";
            $i=0;
        }
    }
    ?>
<?php
include("footer.php");
?>
