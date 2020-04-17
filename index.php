<?php
  session_start();
  if(isset($_SESSION["user"])){
    header("location:home.php");
  }
  require "connection.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
  font-family: Arial, Helvetica, sans-serif;
}

body {
  margin: 0;
    background-image: url("87641.jpg");
  font-family: Arial, Helvetica, sans-serif;
  background-color: #cccccc;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
}

/* Style the content */
.content {
  /*background-color: rgba(65, 66, 78, 0.75);*/
  position: relative;
  height: 500px;
  padding: 40px;
}

.login{
  overflow: hidden;
 background-color: white;
 padding: 40px 30px 30px 30px;
 border-radius: 10px;
 position: center;
 top: 50%;
 left: 50%;
 width: 400px;
 @include transform(translate(-50%, -50%));
 @include transition(transform 300ms, box-shadow 300ms);
 box-shadow: 5px 10px 10px rgba($greenSeaweed, 0.2);
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
    .xyz
    {
        color: aliceblue;
        text-shadow: 2px 2px black;
        
        
    }
</style>
</head>
<body>
  <div class="bdy">
    <h1 align="left" style="padding-left: 30px" ><b class="xyz">Railways</b></h1>
    <div class="content">
      <div style="padding:1% 37% 0% 37%;width:100%;height:30%;">
  <form action="login.php" method="post" class="login">
       <h2>Login</h2>
       <p>Please fill in your credentials to login.</p>

           <div>
               <label>Username</label>
               <input type="text" name="username">
       <br><br>
           </div>
           <div>
               <label>Password</label>
               <input type="password" name="password">
           <br><br>
     </div>
           <div>
               <input type="submit" value="Login">
           </div>
       </form>
   </div>
    </div>
    <div class="footer">
      <p class="ft">designed by &copy; Arya Atharva</p>
    </div>
  </div>
</body>
</html>
