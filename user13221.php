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

$query = "SELECT * FROM User";
$result = mysqli_query($conn, $query);
$total = mysqli_num_rows($result);

 if ($total != 0)
{
?>

<table>
<tr><th>UserID</th><th>USERNAME</th><th>PASSWORD</th><th>ACTIVE</th><th>SALESPERSON</th><th colspan="2">OPERATIONS</th></tr>	

<h1 style="color: #ef6c00">User</h1>

<?php

while($finalresult = mysqli_fetch_assoc($result)) {
       

echo 
        "<tr>
        <td>".$finalresult['UserID']."</td>
        <td>".$finalresult['USERNAME']."</td>
		<td>".$finalresult['PASSWORD']."</td>
		<td>".$finalresult['ACTIVE']."</td>
		<td>".$finalresult['SALESPERSON']."</td>
		
		<td><a href='updateuser.php?UserID=$finalresult[UserID]&USERNAME=$finalresult[USERNAME]&PASSWORD=$finalresult[PASSWORD]&ACTIVE=$finalresult[ACTIVE]&SALESPERSON=$finalresult[SALESPERSON]'>Edit</a></td>
		<td><a href='deleteuser.php?UserID=$finalresult[UserID]' onclick='return checkDelete()'>Delete</a></td>
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


<span>Insert new record</span><a style= "margin:20px" href="insertuser.php">Insert</a>	
</body>

</html>

