<!DOCTYPE html>
<html>
<head>
<title>Homepage</title>
<!-- <h1>Welcome <?php //echo $login_session; ?></h1>  -->
<p style="font-weight:bold;text-align:center;font-size:50px;color: #ef6c00; padding-left:5px">Zu-PAINTS</p>

<style>
body{
    background-color: #333;
    text-align: center;
    font-family: Arial;

}
ul {
    border-radius:5px;
    width:10%;
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    
    /* float: left; */
    /* border-right:px solid #bbb; */
}

li:last-child {
    /* border-right: none; */
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
<div align="center">
<ul>
 <li><a href="customer_13221.php">CUSTOMER</a></li>
  <li><a href="salesperson13221.php">SALESPERSON</a></li>
  <li><a href="product13221.php">PRODUCT</a></li>
  <li><a href="user13221.php">USER</a></li>
  <li><a href="salesorder_13221.php">SALESORDER</a></li>

  <!-- <li style="float:right"><a href = "Login/logout.php">Sign Out</a></li> -->
  <li style="padding-top:50px;"><a href = "Login/logout.php">SIGN OUT</a></li>

</ul>

</div>

</body>
</html>