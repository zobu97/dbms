<?php
include ("connection.php");
error_reporting(0);
 $_GET['customerid'];
 $_GET['shopname'];
 $_GET['customername'];
 $_GET['customernumber'];
 $_GET['add'];
 $_GET['area'];
 $_GET['geocoor'];
?>

<html>
<head>

</head>
<body>
<h1 style="font-size:30px;">Update Record</h1>


<form action="" method="GET">
CID <input type="text" name="CID" value="<?php echo $_GET['customerid']; ?>"/><br><br>
SHOPNAME <input type="text" name="SNAME" value="<?php echo $_GET['shopname']; ?>"/><br><br>
CUSTOMERNAME <input type="text" name="CNAME" value="<?php echo $_GET['customername']; ?>"/><br><br>
CUSTOMERNUMBER <input type="text" name="CNUMBER" value="<?php echo $_GET['customernumber']; ?>"/><br><br>
ADDRESS <input type="text" name="ADDRESS" value="<?php echo $_GET['add']; ?>"/><br><br>
AREA <input type="text" name="AREA" value="<?php echo $_GET['area']; ?>"/><br><br>
COORDINATES <input type="text" name="COORDINATES" value="<?php echo $_GET['geocoor']; ?>"/><br><br>

<input type="submit" name="submit" value="Update"/>

</form>

<?php
if($_GET['submit'])
{
	$CID = $_GET['CID'];
	$SNAME = $_GET['SNAME'];
	$CNAME = $_GET['CNAME'];
	$CNUMBER = $_GET['CNUMBER'];	
	$ADDRESS = $_GET['ADDRESS'];
	$AREA = $_GET['AREA'];
	$COORDINATES = $_GET['COORDINATES'];
		
	$query = "UPDATE Customer SET SNAME='$SNAME', CNAME= '$CNAME', CNUMBER= '$CNUMBER',ADDRESS='$ADDRESS',AREA='$AREA',COORDINATES='$COORDINATES' WHERE CID= '$CID'";
        //$query = "UPDATE Customer SET SHOPNAME='$SNAME',CUSTOMERNAME='$CNAME',CUSTOMERNUMBER='$CNUMBER',ADDRESS='$ADDRESS',AREA='$AREA',COORDINATES='$COORDINATES' WHERE CID='$CID'";
	$data = mysqli_query ($conn, $query);
		
	if ($data) {
	echo "Record Updated Successfully. <a href='customer13221.php'>Click here to check</a>";
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
