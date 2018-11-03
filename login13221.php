<?php
$con = mysqli_connect('localhost','root', '', 'ZubiaHabib');

if(!$con)
{
echo 'Not Connected to the Server';
}	

echo $_GET['UserID'];	
$UserID = mysqli_real_escape_string($con,$_POST['UserID']);	
$PASSWORD = mysqli_real_escape_string($con,$_POST['PASSWORD']);	

$sql= "select * from user where UserID='$UserID' and PASSWORD='$PASSWORD'"; 
$result = mysqli_query($con,$sql);

$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

	
if($row['UserID'] == $UserID &&  $row['PASSWORD'] ==$PASSWORD){
  	  // header("location: home.php");
}
else{
    echo "Login Failed";
    // header("location: login13221 .php");    
}

?>





<html>
<head>
<title>Login</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
  <div class="header">
  	<h2>LOGIN</h2>
  </div>

<div id="frm">
<form action ="" method="POST">
  	<div class="input-group">
  		<label>UserID</label>
  		<input type="text" name="UserID" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="PASSWORD">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" value="LOGIN"></button>
  	</div>
	  </form>
</div>
</body>
</html>
