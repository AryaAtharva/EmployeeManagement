<?php
require 'session.php';
if($_SESSION['cat']=='ADMIN')
{    
require "connection.php";
$_SESSION["table"]="stn";
if(isset($_POST['strr']))
{
$str=$_POST["strr"];
$query="SELECT * FROM station_mst WHERE deleted='N' and Stn_ID!='0' and `Stn_ID` like '%$str%' or `Station_Code` like '%$str%' or `Station_Name` like '%$str%'";
}
else
{
    $query="SELECT * FROM station_mst WHERE deleted='N' and Stn_ID!='0' ";
}
$result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Station</title>
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

.navbar a ,span{
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
  padding: 10px 0px 0px 40px;
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
      <a href="/rly_intern/home.php">Home</a>
      <span><u>Station</u></span>
      <?php if($_SESSION['cat']=="ADMIN")
      {
        echo "<a href=\"/rly_intern/station/index.php\" >Show</a>";
        echo "<a href=\"/rly_intern/station/insert.php\" >Insert</a>";
    echo "<a href=\"/rly_intern/station/edit.php\" ><u>Edit</u></a>";
      }
       ?>
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
      	<form action="#" align="right" method="post">
      		<input type="text" placeholder="search" name="strr"/>
      		<button>search</button>
      	</form>
          <table  border="1px" style="width:600px;line-height: 25px; border: 2px solid black; margin: 0 auto; border-radius: 9px; position: absolute; top: 10%; left: 27%;">
      			<tr style="background-color: powderblue;">
      				<th align="center" style="font-weight: bold;padding:5px;">ID</th>
            	<th align="center" style="font-weight: bold;padding:5px;">Station_Code</th>
            	<th align="center" style="font-weight: bold;padding:5px;">Station_Name</th>
              <th></th>
              <th></th>
      			</tr>
           	<?php
           	  while($rows=mysqli_fetch_assoc($result))
           	  {
           	  	?>
           	  	<tr>
           	  		<td align="center"><?php echo $rows["Stn_ID"]; ?></td>
           	  		<td align="center"><?php echo $rows["Station_Code"]; ?></td>
      						<td align="center"><?php echo $rows["Station_Name"]; ?></td>
                  <td><a href="update.php?ID=<?php echo $rows["Stn_ID"]; ?>" style="text-decoration:none;">Update</a></td>
                  <td><a href="delete.php?ID=<?php echo $rows["Stn_ID"]; ?>" style="text-decoration:none;color:red;">X</a></td>
           	  	</tr>
           	  	<?php
           	  }
           ?>
          </table>
    </div>
    <div class="footer">
      <p class="ft">designed by &copy; Arya Atharva</p>
    </div>
  </div>
    <?php
}
else
{
     echo"<script>alert('something is wrong')</script>";
    header("location:/rly_intern/index.php");
}
    ?>
</body>
</html>
