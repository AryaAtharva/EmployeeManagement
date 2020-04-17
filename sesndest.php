<?php
session_start();
if(isset($_SESSION['user']))
{
  session_destroy();
  header("location:/rly_intern/index.php");
}else {
  echo"<script>alert('something is wrong')</script>";
}
 ?>
