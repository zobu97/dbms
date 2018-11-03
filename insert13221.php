<?php
include ("connection.php");
error_reporting(0);
?>

<html>
<head>

</head>
<body>
<h1 style="font-size:30px;">Insert Record</h1>


<form action="" method="GET">
CID <input type="text" name="CID" value=""/><br><br>
SHOP NAME <input type="text" name="SNAME" value=""/><br><br>
CUSTOMER NAME <input type="text" name="CNAME" value=""/><br><br>
CUSTOMER NUMBER <input type="text" name="CNUMBER" value=""/><br><br>
NEW ADDRESS <input type="text" name="ADDRESS" value=""/><br><br>
NEW AREA <input type="text" name="AREA" value=""/><br><br>
NEW COORDINATES <input type="text" name="COORDINATES" value=""/><br><br>

<input type="submit" name="submit" value="Submit"/>

</form>

<?php
if($_GET['submit'])
{
$customerid = $_GET['CID'];
$shopname = $_GET['SNAME'];
$customername = $_GET['CNAME'];
$customernumber = $_GET['CNUMBER'];
$add = $_GET['ADDRESS'];
$are = $_GET['AREA'];
$geoco = $_GET['COORDINATES'];

if($customerid!="" && $shopname!="" && $customername!="" && $customernumber!="" && $add!="" && $are!="" && $geoco!="")
{

$query = "INSERT INTO Customer VALUES ('$customerid' , '$shopname' , '$customername' , '$customernumber' , '$add' , '$are' , '$geoco')";
$data = mysqli_query ($conn, $query);

if ($data)
{
echo "Data inserted into Customer Database";
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
