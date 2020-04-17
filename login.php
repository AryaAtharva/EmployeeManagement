<?php
session_start();
require 'connection.php';
$user_id=$_POST["username"];
$pwd=$_POST["password"];
$query="select * from user where User_ID='$user_id' and Password='$pwd'";
$result=mysqli_query($conn,$query);
$rows=mysqli_fetch_assoc($result);
if ($_SESSION["table"]=="emp"){
  $_SESSION["user"]=$rows["User_ID"];
  $_SESSION["cat"]=$rows["Category"];
  header("location:/rly_intern/employee/");
}
elseif ($_SESSION["table"]=="stn") {
  $_SESSION["user"]=$rows["User_ID"];
  $_SESSION["cat"]=$rows["Category"];
  header("location:/rly_intern/station/");
}
elseif ($_SESSION["table"]=="stnmst") {
  $_SESSION["user"]=$rows["User_ID"];
  $_SESSION["cat"]=$rows["Category"];
  header("location:/rly_intern/stationmaster/");
}elseif (!$rows) {
  echo "Inavlid user details";
}else {
  $_SESSION["user"]=$rows["User_ID"];
  $_SESSION["cat"]=$rows["Category"];
  header("location:/rly_intern/home.php");
}
 ?>
