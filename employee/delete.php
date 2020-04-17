<?php
session_start();
require 'session.php';
require "connection.php";
$_SESSION["table"]="emp";
$ID=$_GET['ID'];
$sql = "DELETE FROM `employee_mst` WHERE `employee_mst`.`sl_no` = $ID";
if(mysqli_query($conn,$sql))
 {
 	echo "User deleted properly $ID";
  header("location:edit.php");
 } else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
