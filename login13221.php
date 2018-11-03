<html>
<head>
<title>MySQL</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
  <div class="header">
  	<h2>LOGIN hi</h2>
  </div>

<div id="frm">
<form action ="navigationpg.php" method="POST">
<!-- <?php include('errors.php'); ?> -->

  	<div class="input-group">
  		<label>UserID</label>
  		<input type="text" name="UserID" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="PASSWORD">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" value="LOGIN">LOGIN</button>
  	</div>
<!-- <p>
	<label>UserID : </label>
	<input type="text"  name ="UserID">
</p>
<p>
	<label>PASSWORD : </label>
	<input type="password"  name ="PASSWORD">
</p>
<p>
	
	<input type="submit" id="btn" value ="LOGIN">
</p> -->
</form>
</div>

</body>


</html>
