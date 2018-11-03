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

$query = "SELECT * FROM Salesperson";
$result = mysqli_query($conn, $query);
$total = mysqli_num_rows($result);

 if ($total != 0)
{
?>

<table>
<tr><th>NAME</th><th>CONTACTNUMBER</th><th>CUSTOMERSASSIGNED</th><th colspan="2">OPERATIONS</th></tr>	

<h1 style="color: #ef6c00">SalesPerson</h1>

<?php

while($finalresult = mysqli_fetch_assoc($result)) {
       

echo 
        "<tr>
		<td>".$finalresult['Name']."</td>
		<td>".$finalresult['ContactNumber']."</td>
		<td>".$finalresult['CustomersAssigned']."</td>
	      
  <td><a href='updatesales.php?personame=$finalresult[Name]&contactnumber=$finalresult[ContactNumber]&customersassigned=$finalresult[CustomersAssigned]'>Edit</a></td>
		<td><a href='deletesales.php?personame=$finalresult[Name]' onclick='return checkDelete()'>Delete</a></td>
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


<span>Insert new record</span><a style= "margin:20px" href="insertsales.php">Insert</a>	
</body>

</html>
