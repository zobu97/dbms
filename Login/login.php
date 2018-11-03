<?php
   include("../connection.php");
   session_start();
   $error = '';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT UserID, ACTIVE FROM user WHERE UserID = '$myusername' and PASSWORD = '$mypassword'";
     
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //   $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1        ) {
        //  session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: ../home.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
        <link rel="stylesheet" type="text/css" href="../style1.css">
      </head>
   
   <body>
      <div align = "center">
         <div>
            <div  style="margin-top:200px;border:2px solid #FF5722;"> 
            <h1 style="background:black;width:25%;color:FF5722;border-radius: 10px 10px 0px 0px;">LOGIN</h1>
            <form action = "" method = "post">
                  <label>User Name</label><br>
                  <input type = "text" name = "username" class = "box" autocomplete="off"/><br /><br />
                  <label>Password</label><br>
                  <input type = "password" name = "password" class = "box" autocomplete="off"/><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            </div>

         </div>
      </div>
   </body>
</html> 