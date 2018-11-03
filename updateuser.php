<?php
include ("connectionuser.php");
error_reporting(0);
 $_GET['UserID'];
 $_GET['USERNAME'];
 $_GET['PASSWORD'];
 $_GET['ACTIVE'];
 $_GET['SALESPERSON'];
?>

<html>
<head>

</head>
<body>
<h1 style="font-size:30px;">Update Record</h1>


<form action="" method="GET">
UserID <input type="text" name="UserID" value="<?php echo $_GET['UserID']; ?>"/><br><br>
UserID <input type="text" name="USERNAME" value="<?php echo $_GET['USERNAME']; ?>"/><br><br>
PASSWORD <input type="text" name="PASSWORD" value="<?php echo $_GET['PASSWORD']; ?>"/><br><br>
ACTIVE <input type="text" name="ACTIVE" value="<?php echo $_GET['ACTIVE']; ?>"/><br><br>
SALESPERSON <input type="text" name="SALESPERSON" value="<?php echo $_GET['SALESPERSON']; ?>"/><br><br>

<input type="submit" name="submit" value="Update"/>

</form>

<?php
if($_GET['submit'])
{
	$UserID = $_GET['UserID'];
	$USERNAME = $_GET['USERNAME'];
	$PASSWORD = $_GET['PASSWORD'];
	$ACTIVE = $_GET['ACTIVE'];
	$SALESPERSON = $_GET['SALESPERSON'];	
		
	$query = "UPDATE User SET USERNAME='$USERNAME' , PASSWORD='$PASSWORD', ACTIVE= '$ACTIVE', SALESPERSON= '$SALESPERSON' WHERE UserID= '$UserID'";
        //$query = "UPDATE Customer SET SHOPNAME='$SNAME',CUSTOMERNAME='$CNAME',CUSTOMERNUMBER='$CNUMBER',ADDRESS='$ADDRESS',AREA='$AREA',COORDINATES='$COORDINATES' WHERE CID='$CID'";
	$data = mysqli_query ($conn, $query);
		
	if ($data) {
	echo "Record Updated Successfully. <a href='user13221.php'>Click here to check</a>";
} else
 {
	echo "Record Not Updated";
}
} 
else {
echo "<font color='green'>Press Update Button to save changes";
}

?>

</body>
</html>
