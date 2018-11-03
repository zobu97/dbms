<?php
include ("connectionproduct.php");
$PCODE = $_GET['PCODE'];
$query ="DELETE FROM Product WHERE PCODE='$PCODE'";
$data = mysqli_query($conn, $query);
if ($data) 
{
	echo "<script>alert('Record Deleted')</script>";
?>
	<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=http://localhost/product13221.php">
<?php
} 
else {
	echo "<font color='red'>Not Deleted";
}
?>
