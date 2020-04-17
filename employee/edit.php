<?php
require 'session.php';
    if($_SESSION['cat']=='ADMIN')
{  
require "connection.php";
$_SESSION["table"]="emp";
$str="";
if(isset($_POST['strr']))
{
$str=$_POST["strr"];
$query="SELECT * FROM employee_mst WHERE changed like 'N' and (Emp_ID like '%$str%' or Employee_Name like '%$str%' or Email_ID like '%$str%' or Address like '%$str%' or Phone_Number like '%$str%' or Station_mst_ID like '%$str%') order by Emp_ID";
}
else
{
$query="SELECT * FROM employee_mst /* WHERE changed like 'N'and  (Emp_ID like '%$str%' or Employee_Name like '%$str%' or Email_ID like '%$str%' or Address like '%$str%' or Phone_Number like '%$str%' or Station_mst_ID like '%$str%') ORDER by Emp_ID ASC,changed ASC */";
}
$result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Emloyee</title>
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

.navbar a,span {
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

.foot {
  padding: 5px;
  color: white;
  width: 100%;
  bottom: 0px;
  height: 170px;
  text-align: center;
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
      <span><u>Employee</u></span>
      <?php if($_SESSION['cat']=="ADMIN")
      {
        echo "<a href=\"index.php\" >Show</a>";
        echo "<a href=\"insert.php\" >Insert</a>";
        echo "<a href=\"edit.php\" ><u>Edit</u></a>";
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
      		<input type="text" placeholder="search" name="strr" />
      		<button>search</button>
      	</form>
        <table  border="1px" style="width:1000px;line-height: 25px; border: 2px solid black; margin: 0 auto; border-radius: 9px; position: absolute; top: 10%; left: 10%;">
          <tr style="background-color: powderblue;">
            <th align="center" style="font-weight: bold;">Emp_ID</h5></th>
            <th align="center" style="font-weight: bold;">Employee_Name</h5></th>
            <th align="center" style="font-weight: bold;">Email_ID</h5></th>
            <th align="center" style="font-weight: bold;">Address</h5></th>
            <th align="center" style="font-weight: bold;">Phone_Number</h5></th>
            <th align="center" style="font-weight: bold;">Station_mst_ID</h5></th>
            <th></th>
            <th></th>
          </tr>
            <?php
           	  while($rows=mysqli_fetch_assoc($result))
           	  {
           	  	?>
           	  	<tr <?php
                  
                  if($rows["changed"]=="N"){echo "style=\"background-color:rgba(107, 230, 41, 0.3);\""; ?>>
                  <td align="center"><?php echo $rows["Emp_ID"]; ?></td>
                  <td align="center"><?php echo $rows["Employee_Name"]; ?></td>
                  <td align="center"><?php echo $rows["Email_ID"]; ?></td>
                  <td align="center"><?php echo $rows["Address"]; ?></td>
                  <td align="center"><?php echo $rows["Phone_Number"]; ?></td>
                  <td align="center"><?php echo $rows["Station_mst_ID"]; ?></td>
                  <td><a href="update.php?ID=<?php echo $rows["Emp_ID"]; ?>" style="text-decoration:none;">Update</a></td>
                  <td><a href="delete.php?ID=<?php echo $rows["sl_no"]; ?>" style="text-decoration:none;color:red;">X</a></td>
           	  	</tr>
           	  	<?php
                                           }
           	  }
           ?>
          </table>
    </div>
    <div class="foot">
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
