<?php
include ("connectionsales.php");
error_reporting(0);
# echo $_GET['personame'];
# echo $_GET['contactnumber'];
# echo $_GET['customersassigned'];
?>

<html>
<head>

</head>
<body>
<h1 style="font-size:30px;">Update Record</h1>


<form action="" method="GET">
Name <input type="text" name="Name" value="<?php echo $_GET['personame']; ?>"/><br><br>
ContactNumber <input type="text" name="ContactNumber" value="<?php echo $_GET['contactnumber']; ?>"/><br><br>
CustomersAssigned <input type="text" name="CustomersAssigned" value="<?php echo $_GET['customersassigned']; ?>"/><br><br>

<input type="submit" name="submit" value="Update"/>

</form>

<?php
if($_GET['submit'])
{
	$Name = $_GET['Name'];
	$ContactNumber = $_GET['ContactNumber'];
	$CustomersAssigned = $_GET['CustomersAssigned'];
	
	$query = "UPDATE Salesperson SET ContactNumber ='$ContactNumber', CustomersAssigned= '$CustomersAssigned' WHERE Name = '$Name'";
	
	$data = mysqli_query ($conn, $query);
		
	if ($data) {
	echo "Record Updated Successfully. <a href='salesperson13221.php'>Click here to check</a>";
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
