<?php
require "connection.php";
require 'session.php';
if(isset($_POST["submit"])){
  if(filesize($_FILES['image']['tmp_name'])<30000){
    $image = $_FILES['image']['tmp_name'];
    $image = addslashes(file_get_contents($image));
    $E_id=$_POST["Emp_ID"];
    $E_name=$_POST["Employee_Name"];
    $Email=$_POST["Email_ID"];
    $Add=$_POST["Address"];
    $Ph_no=$_POST["Phone_Number"];
    $s_code=$_POST["station"];
//    if($E_id!="" OR $E_name!="" or $Email!="" or $Add!="" or $Ph_no!=""){
//        $sql = "UPDATE `employee_mst` SET `Employee_Name` = '$E_name',`Email_ID`='$Email', `Phone_Number` = '$Ph_no', `Address` = '$Add' WHERE `Emp_ID` ='$E_id' and changed='N'";
//        mysqli_query($conn, $sql);
//    }
    $r=mysqli_query($conn,"select Employee_image,Station_mst_ID from employee_mst where Emp_ID='$E_id' and changed='N'");
    if(mysqli_num_rows($r)==1){
      $sql="UPDATE employee_mst SET changed='Y' WHERE Emp_ID=$E_id and changed='N' ";
      mysqli_query($conn, $sql);
      $rw=mysqli_fetch_assoc($r);
      $img=$rw['Employee_image'];
      $img=addslashes($img);
      $sql="INSERT INTO employee_mst (Emp_ID,Employee_Name,Email_ID,Address,Phone_Number,Station_mst_ID,Employee_image,changed)
      VALUES ('$E_id', '$E_name','$Email','$Add','$Ph_no',$s_code,'$img','N')";
      if(!mysqli_query($conn, $sql)){
        echo mysqli_error($conn);
      }
    }
    if(filesize($_FILES['image']['tmp_name'])>3000){
      $sql="UPDATE `employee_mst` SET `Employee_image`='$image' WHERE `Emp_ID` ='$E_id'";
      mysqli_query($conn, $sql);
    }
      
  }
    else
  {
    echo "<script>alert('select image less than 30kb');</script>";
  }
    echo"<script>alert('Success')</script>";
    header("location:/rly_intern/employee/edit.php");
    
}
?>