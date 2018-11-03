<?php
include ("connectionsales.php");
error_reporting(0);
?>

<html>
<head>

</head>
<body>
<h1 style="font-size:30px;">Insert Record</h1>


<form action="" method="GET">
Name <input type="text" name="Name" value=""/><br><br>
Contact Number <input type="text" name="ContactNumber" value=""/><br><br>
Customers Assigned <input type="text" name="CustomersAssigned" value=""/><br><br>

<input type="submit" name="submit" value="Submit"/>

</form>

<?php
if($_GET['submit'])
{
$Name = $_GET['Name'];
$contactnumber = $_GET['ContactNumber'];
$customersassigned = $_GET['CustomersAssigned'];

if($Name!="" && $contactnumber!="" && $customersassigned!="")
{

$query = "INSERT INTO Salesperson VALUES ('$Name' , '$contactnumber' , '$customersassigned')";
$data = mysqli_query ($conn, $query);

if ($data)
{
echo "Data inserted into Salesperson Database";
}
}
else
{
	echo "All fields are required";
}
}

?>

</body>
</html>
