<?php

$con = mysqli_connect('localhost','root');

if(!$con)
{

echo 'Not Connected to the Server';

}

if (!mysqli_select_db($con,'ZubiaHabib'))
{


echo 'Database not Selected';

}

$UserID=$_POST['UserID'];
$PASSWORD=$_POST['PASSWORD'];

$result= mysqli_query($con,"select * from user where UserID='$UserID' and PASSWORD='$PASSWORD'");


$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

if($row['UserID'] ==$UserID and $row['PASSWORD'] ==$PASSWORD){
	//echo"login sucessful! Welcome";
}
else{
echo"failed to login";


}


?>


<!DOCTYPE html>
<html>
<head>
<h1 style="color: #ef6c00">Welcome User</h1>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
    border-right:1px solid #bbb;
}

li:last-child {
    border-right: none;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #ef6c00;
}

.active {
    background-color: #4CAF50;
}
</style>
</head>
<body>

<ul>
 <li><a href="customer13221.php">CUSTOMER</a></li>
  <li><a href="salesperson13221.php">SALESPERSON</a></li>
  <li><a href="product13221.php">PRODUCT</a></li>
  <li><a href="user13221.php">USER</a></li>
  <li><a href="salesorder_13221.php">SALESORDER</a></li>
</ul>

</body>
</html>

