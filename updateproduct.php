<?php
include ("connectionproduct.php");
error_reporting(0);
 $_GET['PCODE'];
 $_GET['BRAND'];
 $_GET['TYPE'];
 $_GET['SHADE'];
 $_GET['SIZE'];
 $_GET['SALESPRICE'];
?>

<html>
<head>

</head>
<body>
<h1 style="font-size:30px;">Update Record</h1>


<form action="" method="GET">
PCODE <input type="text" name="PCODE" value="<?php echo $_GET['PCODE']; ?>"/><br><br>
BRAND <input type="text" name="BRAND" value="<?php echo $_GET['BRAND']; ?>"/><br><br>
TYPE <input type="text" name="TYPE" value="<?php echo $_GET['TYPE']; ?>"/><br><br>
SHADE <input type="text" name="SHADE" value="<?php echo $_GET['SHADE']; ?>"/><br><br>
SIZE <input type="text" name="SIZE" value="<?php echo $_GET['SIZE']; ?>"/><br><br>
SALESPRICE <input type="text" name="SALESPRICE" value="<?php echo $_GET['SALESPRICE']; ?>"/><br><br>

<input type="submit" name="submit" value="Update"/>

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
		
	#$query = "UPDATE Product SET BRAND='$BRAND', TYPE= '$TYPE', SHADE= '$SHADE', SIZE='$SIZE',SALESPRICE='$SALESPRICE' WHERE PCODE= '$PCODE'";
      
        $query = "UPDATE Product SET PCODE ='$PCODE',BRAND='$BRAND',TYPE='$TYPE',SHADE='$SHADE',SIZE='$SIZE',SALESPRICE='$SALESPRICE' WHERE PCODE = '$PCODE'";

	$data = mysqli_query ($conn, $query);
		
	if ($data) {
	echo "Record Updated Successfully. <a href='product13221.php'>Click here to check</a>";
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
