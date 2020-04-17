<?php
session_start();
require 'session.php';
require "connection.php";
$_SESSION["table"]="stn";
$ID=$_GET['ID'];
$sql = "update `station_mst` set deleted='Y' WHERE `station_mst`.`Stn_ID` = $ID";
if(mysqli_query($conn,$sql))
 {
 	echo "User deleted properly $ID";
  header("location:edit.php");
 } else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
