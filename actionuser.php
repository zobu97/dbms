<?php

//action.php

include('userconnection.php');
error_reporting(0);

if(isset($_POST["action"]))
{
	if($_POST["action"] == "Insert")
	{
		$UserID = $_POST['UserID'];
		$USERNAME = $_POST['USERNAME'];
		$PASSWORD = $_POST['PASSWORD'];
		$ACTIVE = $_POST['ACTIVE'];
		$SName = $_POST['SName'];


		// $CID = 13;
		// $SDATE = '2018-04-07';
		// $SName = 'Ali';
		// $PCODE = 7;
		// $QUANTITY = 2;
		// $RATE = 5;
		// $AMOUNT = 20;
		// $query = 
		// INSERT INTO salesorder (CID, SDATE, SName, PCODE, QUANTITY, RATE, AMOUNT) VALUES (".$_POST["CID"].", ".$_POST["SDATE"].", ".$_POST["SName"].", ".$_POST["PCODE"].", ".$_POST["QUANTITY"].", ".$_POST["RATE"].", ".$_POST["AMOUNT"].")
		// ;

		$query = "INSERT INTO user VALUES ('$UserID' , '$USERNAME' , '$PASSWORD' , '$ACTIVE' , '$SName')";

		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Inserted...</p>';
	}
	if($_POST["action"] == "fetch_single")
	{
		$query = "
		SELECT * FROM user WHERE UserID = '".$_POST["UserID"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['USERNAME'] = $row['USERNAME'];
			$output['PASSWORD'] = $row['PASSWORD'];
			$output['ACTIVE'] = $row['ACTIVE'];
			$output['SName'] = $row['SName'];
		
		}
		echo json_encode($output);
	}
	if($_POST["action"] == "update")
	{
		$query = "
		UPDATE user
		SET USERNAME = '".$_POST["USERNAME"]."', 
		PASSWORD = '".$_POST["PASSWORD"]."' , 
		ACTIVE = '".$_POST["ACTIVE"]."' , 
		SName = '".$_POST["SName"]."' , 
		
		WHERE UserID = '".$_POST["hidden_UserID"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Updated</p>';
	}
	if($_POST["action"] == "delete")
	{
		$query = "DELETE FROM user WHERE UserID = '".$_POST["UserID"]."'";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Deleted</p>';
	}
}

?>
