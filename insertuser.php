<?php
include ("connectionuser.php");
error_reporting(0);
?>

<html>
<head>

</head>
<body>
<h1 style="font-size:30px;">Insert Record</h1>


<form action="" method="GET">
UserID <input type="text" name="UserID" value=""/><br><br>
USERNAME <input type="text" name="USERNAME" value=""/><br><br>
PASSWORD <input type="text" name="PASSWORD" value=""/><br><br>
ACTIVE <input type="text" name="ACTIVE" value=""/><br><br>
SALESPERSON <input type="text" name="SALESPERSON" value=""/><br><br>

<input type="submit" name="submit" value="Submit"/>

</form>

<?php
if($_GET['submit'])
{
$UserID = $_GET['UserID'];
$USERNAME = $_GET['USERNAME'];
$PASSWORD = $_GET['PASSWORD'];
$ACTIVE = $_GET['ACTIVE'];
$SALESPERSON = $_GET['SALESPERSON'];

if($UserID!="" && $USERNAME!="" && $PASSWORD!="" && $ACTIVE!="" && $SALESPERSON!="")
{

$query = "INSERT INTO User VALUES ('$UserID' , '$USERNAME' , '$PASSWORD' , '$ACTIVE' , '$SALESPERSON')";
$data = mysqli_query ($conn, $query);

if ($data)
{
echo "Data inserted into User Database! <a href='user13221.php'>Click here to check</a>";
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
