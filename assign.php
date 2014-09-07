
<?php
require("connect.php");
$hid=$_POST["hid"];
$lat=$_POST["lat"];
$long=$_POST["long"];


$quer = "SELECT * FROM test WHERE (lat<($lat+2) AND lat >($lat-2)) AND (longi<($long+2) AND longi>($long-2))";
//echo $quer;
$result = mysqli_query($con,$quer);
//$result = mysqli_query($con,"SELECT * FROM test WHERE lat BETWEEN $l1 AND $l2");
while($row = mysqli_fetch_array($result)) 
{
  echo $row['no'];
  echo "<br>";
}
echo "out";

?>