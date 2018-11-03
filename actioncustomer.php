<?php

//action.php

include('customerconnection.php');
error_reporting(0);

if(isset($_POST["action"]))
{
	if($_POST["action"] == "Insert")
	{
		
		$CID = $_POST['CID'];
		$SNAME = $_POST['SNAME'];
		$CNAME = $_POST['CNAME'];
		$CNUMBER = $_POST['CNUMBER'];
		$ADDRESS = $_POST['ADDRESS'];
		$AREA = $_POST['AREA'];
		$COORDINATES = $_POST['COORDINATES'];

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

		$query = "INSERT INTO customer VALUES ('$CID' , '$SNAME' , '$CNAME' , '$CNUMBER' , '$ADDRESS' , '$AREA' , '$COORDINATES')";

		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Inserted...</p>';
	}
	if($_POST["action"] == "fetch_single")
	{
		$query = "
		SELECT * FROM customer WHERE CID = '".$_POST["CID"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['SNAME'] = $row['SNAME'];
			$output['CNAME'] = $row['CNAME'];
			$output['CNUMBER'] = $row['CNUMBER'];
			$output['ADDRESS'] = $row['ADDRESS'];
			$output['AREA'] = $row['AREA'];
			$output['COORDINATES'] = $row['COORDINATES'];
		
		}
		echo json_encode($output);
	}
	if($_POST["action"] == "update")
	{
		$query = "
		UPDATE customer
		SET SNAME = '".$_POST["SNAME"]."', 
		CNAME = '".$_POST["CNAME"]."' , 
		CNUMBER = '".$_POST["CNUMBER"]."' , 
		ADDRESS = '".$_POST["ADDRESS"]."' , 
		AREA = '".$_POST["AREA"]."' , 
		COORDINATES = '".$_POST["COORDINATES"]."' , 
		WHERE CID = '".$_POST["hidden_id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Updated</p>';
	}
	if($_POST["action"] == "delete")
	{
		$query = "DELETE FROM customer WHERE CID = '".$_POST["CID"]."'";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Deleted</p>';
	}
}

?>
