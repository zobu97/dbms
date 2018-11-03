<?php
include ("connectionsales.php");
$name = $_GET['personame'];
$query ="DELETE FROM Salesperson WHERE Name='$name'";
$data = mysqli_query($conn, $query);
if ($data) 
{
	echo "<script>alert('Record Deleted')</script>";
?>
	<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=http://localhost/salesperson13221.php">
<?php
} 
else {
	echo "<font color='red'>Not Deleted";
}
?>
