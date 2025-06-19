<?php
 session_start();
 include("header.php");
?>

<head>
    <style>
        caption{
            padding:10px;
            text-align:center;
            font-weight:bold;
            font-size:16px;
        }
        .btn-primary{
            display:block;
            margin:10px auto;
            background-color:#007bff;
            color:#fff;
            font-weight:bold;
            border:none;
            border-radius:20px;
            padding:10px 20px;
            text-transform:uppercase;
            text-decoration:none;
        }
        .thumbnail img{
            border-radius:50%;
        }
    </style>
</head>
<h1 align=center>Top Doctors</h1>
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
        echo"<a href=\"images/$dim\"target=\"_blank\">";
        echo"<img src=\"images/$dim\"class=\"img-responsive\"width=70% height=60%></a>";
        echo"<div class=\"caption\">";
        echo"<center><b>$dnm</b><br><b>DrEmail:$demail</b><br><b>$qua</b></center></div><center><a class=\"btn btn-primary\"href=booknow.php?DrName=$dnm&phno=$dph&Email=$demail>Book Now</a></center></div></div>";
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
