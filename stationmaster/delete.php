<?php
session_start();
require 'session.php';
require "connection.php";
$_SESSION["table"]="stnmst";
$ID=$_GET['ID'];
$sql = "DELETE FROM `stationmaster_mst` WHERE `stationmaster_mst`.`Emp_ID` = $ID";
if(mysqli_query($conn,$sql))
 {
 	echo "User deleted properly $ID";
  header("location:edit.php");
 } else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
