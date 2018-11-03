<?php
include ("connection.php");
$custid = $_GET['customerid'];
$query ="DELETE FROM Customer WHERE CID='$custid'";
$data = mysqli_query($conn, $query);
if ($data) 
{
	echo "<script>alert('Record Deleted')</script>";
?>
	<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=http://localhost/customer13221.php">
<?php
} 
else {
	echo "<font color='red'>Not Deleted";
}
?>
