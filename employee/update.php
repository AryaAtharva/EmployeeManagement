<?php
require 'session.php';
if($_SESSION['cat']=='ADMIN')
{    

require "connection.php";
$ID=$_GET["ID"];
$result = mysqli_query($conn,"SELECT * FROM employee_mst,station_mst where Emp_ID=$ID and Stn_ID=Station_mst_ID and changed='N'");
$row = mysqli_fetch_array($result);
$query="select Stn_ID,Station_Code from employee_mst RIGHT JOIN station_mst ON Station_mst_ID=Stn_ID AND CHANGED='N' where Station_mst_ID IS NULL ";
$res=mysqli_query($conn, $query);
$_SESSION["table"]="emp";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Employee</title>
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
  padding: 10px 0px 0px 40px;
}

.login{
  overflow: hidden;
 background-color: white;
 padding: 2px 20px 20px 20px;
 border-radius: 10px;
 position: absolute;
 top: 2%;
 left: 33%;
 width: 400px;
 @include transform(translate(-50%, -50%));
 @include transition(transform 300ms, box-shadow 300ms);
 box-shadow: 5px 10px 10px rgba($greenSeaweed, 0.2);
}

.lt{
/*float: left;*/
width: 350px;
}

.rt{
  float: right;
  position: absolute;
  top: 65px;
  right: 0px;
  width: 200px;
}
.mid{
  position: absolute;
  left: 160px;
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
      <a href="#"><u>Employee</u></a>
      <?php if($_SESSION['cat']=="ADMIN")
      {
        echo "<a href=\"index.php\" >show</a>";
        echo "<a href=\"insert.php\" >Insert</a>";
        echo "<a href=\"edit.php\" >Edit</a>";
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
        <form action="frm_atn.php" method="post" class="login" enctype="multipart/form-data">
          <p class="lt">Employee ID:
          <input class="mid"type="text" name="Emp_ID" required value="<?php echo $row['Emp_ID'] ?>" readonly></p>
          <p class="lt">Employee Name
          <input class="mid"type="text" name="Employee_Name" required value="<?php echo $row['Employee_Name'] ?>"></p>
           <p class="lt">Email ID:
           <input class="mid"type="text" name="Email_ID" required value="<?php echo $row['Email_ID'] ?>"></p>
          <p class="lt">Address:
          <input class="mid"type="text" name="Address" required value="<?php echo $row['Address'] ?>"></p>
          <p class="lt">Phone No:
          <input class="mid"type="text" name="Phone_Number" required value="<?php echo $row['Phone_Number'] ?>"></p>
          <p class="lt">Station Code:
          		<select class="mid" name="station">
                <option value="<?php echo $row['Station_mst_ID'] ?>"><?php echo $row["Station_Code"]; ?></option>
          			<?php
               	  while($rows=mysqli_fetch_assoc($res))
               	  {
               	  	?>
          					<option value="<?php echo $rows["Stn_ID"]; ?>"><?php echo $rows["Station_Code"]; ?></option>
          				<?php
             	  }
             ?>
           </select></p>
           <p class="lt">Profile Image:<input class="mid"type="file" name="image"/></p>
          <button type="submit" name="submit">Submit</button>
        </form>
    </div>
    <div class="footer">
      <p class="ft">designed by &copy; Arya Atharva</p>
    </div>
  </div>
</body>
</html>

<?php
}
else
{
     echo"<script>alert('something is wrong')</script>";
    header("location:/rly_intern/index.php");
}
    
    ?>