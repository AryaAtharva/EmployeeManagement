<?php
require 'session.php';
require "connection.php";
$_SESSION["table"]="";?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Indian Railway</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
  font-family: Arial, Helvetica, sans-serif;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-color: rgba(65, 66, 78, 0.75);
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.navbar {
  overflow: hidden;
  background-color: rgba(51, 51, 51, 0.85);
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: white;
  width: 90px;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: rgba(38, 15, 9, 0.72);
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: rgba(51, 51, 51, 0.85);
  min-width: 90px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.8);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: rgba(38, 15, 9, 0.72);
}

.dropdown:hover .dropdown-content {
  display: block;
}

/* Style the content */
.content {
  /*background-color: rgba(65, 66, 78, 0.75);*/
  position: relative;
  height: 400px;
  padding: 40px;
}

.tab{
  border-radius: 5px;
  border: 10px;
  border-color: rgb(6, 6, 6);
  background-image: radial-gradient(rgba(184, 244, 169,0.3),rgba(82, 22, 22, 0.77));
  margin-left: 7.5%;
  margin-right: 7.5%;
  width: 18%;
  height: 35%;
  float: left;
  font-size: 20px;
  margin-bottom: 40px;
}

.tab>a{
  text-decoration: none;
  color: white;
  font-size: 30px;
}

/* Style the footer */
.footer {
  background-color: rgba(3, 3, 3, 0.90);
  padding: 5px;
  color: white;
  position: fixed;
  width: 100%;
  bottom: 0px;
  text-align: center;
}
</style>
</head>
<body>
  <div class="bdy">
    <h1 align="left" style="padding-left: 30px" ><b>Indian Railway</b></h1>
    <div class="navbar">
      <a href="#">Home</a>
      <div class="dropdown">
        <button class="dropbtn">
          <?php
          if(isset($_SESSION['user']))
          {
              echo $_SESSION['user'];
          }else {
            echo "<a href=\"/rly_intern/index.php\" style=\"padding:0px;\" >Login</a>";
          }
          ?>
          <i class="fa fa-caret-down"></i>
        </button>
        <?php
        if(isset($_SESSION['user']))
        {
          echo"<div class=\"dropdown-content\">
            <a href=\"sesndest.php\">Logout</a>
          </div>";
        } ?>
      </div>
    </div>
    <div class="content">
      <div style="width:100%;height:35%">
      </div>
      <div class="tab" style="padding:35px 30px 34px 30px;">
        <a href="employee/index.php">Employees</a>
      </div>
      <div class="tab" style="padding:35px 7px 30px 7px;">
        <a href="stationmaster/index.php">Station Master</a>
      </div>
      <div class="tab" style="padding:35px 50px 34px 55px;">
        <a href="station/index.php">Station</a>
      </div>
    </div>
    <div class="footer">
      <p class="ft">designed by &copy; Arya Atharva</p>
    </div>
  </div>
</body>
</html>
