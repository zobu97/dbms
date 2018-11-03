<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ZubiaHabib";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM Customer";
$result = mysqli_query($conn, $query);
$total = mysqli_num_rows($result);

 if ($total != 0)
{
?>
<link rel="stylesheet" href="jquery-ui.css">
        <link rel="stylesheet" href="bootstrap.min.css" />
		<script src="jquery.min.js"></script>  
        <script src="jquery-ui.js"></script>
        
<!DOCTYPE html>
<html>
<head>
<!-- <h1 style="color: #ef6c00">Welcome User</h1> -->
<style>
/* ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
} */

/* li {
    float: left;
    border-right:1px solid #bbb;
}

li:last-child {
    border-right: none;
} */

/* li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
} */

/* li a:hover:not(.active) {
    background-color: #ef6c00;
}

.active {
    background-color: #4CAF50; */
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

<!-- </body>
</html> -->

<table>
<tr><th>CID</th><th>SNAME</th><th>CNAME</th><th>CNUMBER</th><th>ADDRESS</th><th>AREA</th><th>COORDINATES</th><th colspan="2">OPERATIONS</th></tr>	



<h1 style="color: #ef6c00">Customer</h1>

<?php

while($finalresult = mysqli_fetch_assoc($result)) {
       

echo 
        "<tr>
		<td>".$finalresult['CID']."</td>
		<td>".$finalresult['SNAME']."</td>
		<td>".$finalresult['CNAME']."</td>
		<td>".$finalresult['CNUMBER']."</td>
		<td>".$finalresult['ADDRESS']."</td>
		<td>".$finalresult['AREA']."</td>
		<td>".$finalresult['COORDINATES']."</td>
		<td><a href='update13221.php?customerid=$finalresult[CID]&shopname=$finalresult[SNAME]&customername=$finalresult[CNAME]&customernumber=$finalresult[CNUMBER]&add=$finalresult[ADDRESS]&area=$finalresult[AREA]&geocoor=$finalresult[COORDINATES]'>Edit</a></td>
        
        
        // <td><a href='delete13221.php?customerid=$finalresult[CID]' onclick='return checkDelete()'>Delete</a></td>
		</tr>";

    }
}
 else 
{
    echo "0 results";

}
$conn->close();
?> 
</table>

<script>
function checkDelete()
{
	return confirm('Are you sure you want to delete?');
}
function insert(){
	
}
</script>

<!-- <html>
<head> -->


<style type = "text/css">
a:link, a:visited {
    background-color: #ffa726;
    color: white;
    padding: 8px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
	border-radius: 10px;
}


a:hover, a:active {
    background-color: #ef6c00;
}
table 		{ 
	width: 100%; border-right:1px solid #ccc; border-bottom:1px solid #ccc; border-color: #ef6c00;}
th	{ background:#d2691e; padding:10px; border-left:1px solid #ccc; border-top:1px solid #ccc; background-color: #ef6c00; color: white; border-color:green; }
td	{background:#eee; padding:10px; border-left:1px solid #ccc; border-top:1px solid #ccc; border-color: #ef6c00; text-align:center;}
body {
    background-color: white;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

/* li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none; */
}

/* li a:hover {
    background-color: #ef6c00; */
}



</style>


</head>


<body>


<span>Insert new record</span><a style= "margin:20px" href="insert13221.php">Insert</a>	
<!-- <br><br>
<ul>
 <li><a href="navigationpg.php">HOME</a></li>
  <li><a href="salesperson13221.php">SALESPERSON</a></li>
  <li><a href="product13221.php">PRODUCT</a></li>
  <li><a href="user13221.php">USER</a></li>
</ul>
</br></br> -->
</body>

</html>

