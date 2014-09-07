<?php
echo uniqid(rand(), true);
require("connect.php");
$name=$_POST["name"];
$pass=$_POST["no"];
$ec=$_POST["emercontact"];
$sk=uniqid(rand(), true);
$sql="INSERT INTO auth (name, no, emercontact,secretkey) VALUES ('$name', '$no', '$ec',$sk)";
if (!mysqli_query($con,$sql)) 
{
  die('Error: ' . mysqli_error($con));
}
?>