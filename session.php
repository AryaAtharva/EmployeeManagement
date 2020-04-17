<?php
session_start();
if(!isset($_SESSION['user']))
{
    echo"<script>alert('something is wrong')</script>";
    header("location:/rly_intern/index.php");
}
 ?>
