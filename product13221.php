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

$query = "SELECT * FROM Product";
$result = mysqli_query($conn, $query);
$total = mysqli_num_rows($result);

 if ($total != 0)
{
?>

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

<table>
<tr><th>PCODE</th><th>BRAND</th><th>TYPE</th><th>SHADE</th><th>SIZE</th><th>SALESPRICE</th><th colspan="2">OPERATIONS</th></tr>	

<h1 style="color: #ef6c00">Product</h1>

<?php

while($finalresult = mysqli_fetch_assoc($result)) {
       

echo 
        "<tr>
		<td>".$finalresult['PCODE']."</td>
		<td>".$finalresult['BRAND']."</td>
		<td>".$finalresult['TYPE']."</td>
		<td>".$finalresult['SHADE']."</td>
		<td>".$finalresult['SIZE']."</td>
		<td>".$finalresult['SALESPRICE']."</td>

		<td><a href='updateproduct.php?PCODE=$finalresult[PCODE]&BRAND=$finalresult[BRAND]&TYPE=$finalresult[TYPE]&SHADE=$finalresult[SHADE]&SIZE=$finalresult[SIZE]&SALESPRICE=$finalresult[SALESPRICE]'>Edit</a></td>
		<td><a href='deleteproduct.php?PCODE=$finalresult[PCODE]' onclick='return checkDelete()'>Delete</a></td>
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

<html>
<head>


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

</style>


</head>


<body>


<span>Insert new record</span><a style= "margin:20px" href="insertproduct.php">Insert</a>	
</body>

</html>

