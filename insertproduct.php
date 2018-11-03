<?php
include ("connectionproduct.php");
error_reporting(0);
?>

<html>
<head>

</head>
<body>
<h1 style="font-size:30px;">Insert Record</h1>


<form action="" method="GET">
PCODE <input type="text" name="PCODE" value=""/><br><br>
BRAND <input type="text" name="BRAND" value=""/><br><br>
TYPE <input type="text" name="TYPE" value=""/><br><br>
SHADE <input type="text" name="SHADE" value=""/><br><br>
SIZE <input type="text" name="SIZE" value=""/><br><br>
SALESPRICE <input type="text" name="SALESPRICE" value=""/><br><br>

<input type="submit" name="submit" value="Submit"/>

</form>

<?php
if($_GET['submit'])
{
$PCODE = $_GET['PCODE'];
$BRAND = $_GET['BRAND'];
$TYPE = $_GET['TYPE'];
$SHADE = $_GET['SHADE'];
$SIZE = $_GET['SIZE'];
$SALESPRICE = $_GET['SALESPRICE'];

if($PCODE!="" && $BRAND!="" && $TYPE!="" && $SHADE!="" && $SIZE!="" && $SALESPRICE!="")
{

$query = "INSERT INTO Product VALUES ('$PCODE' , '$BRAND' , '$TYPE' , '$SHADE' , '$SIZE' , '$SALESPRICE')";
$data = mysqli_query ($conn, $query);

if ($data)
{
echo "Data inserted into Product Database";
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
