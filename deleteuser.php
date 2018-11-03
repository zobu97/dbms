<?php
include ("connection.php");
$UserID = $_GET['UserID'];
$query ="DELETE FROM User WHERE UserID='$UserID'";
$data = mysqli_query($conn, $query);
if ($data) 
{
	echo "<script>alert('Record Deleted')</script>";
?>
	<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=http://localhost/user13221.php">
<?php
} 
else {
	echo "<font color='red'>Not Deleted";
}
?>
