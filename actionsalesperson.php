<?php

//action.php

include('salespersonconnection.php');
error_reporting(0);

if(isset($_POST["action"]))
{
	if($_POST["action"] == "Insert")
	{
		$SPERSONID = $_POST['SPERSONID'];
		$SName = $_POST['SName'];
		$CONTACTNO = $_POST['CONTACTNO'];
		$CUSTOMERASSIGNED = $_POST['CUSTOMERASSIGNED'];
	

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

		$query = "INSERT INTO salesperson VALUES ('$SPERSONID' , '$SName' , '$CONTACTNO' , '$CUSTOMERASSIGNED')";

		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Inserted...</p>';
	}
	if($_POST["action"] == "fetch_single")
	{
		$query = "
		SELECT * FROM salesperson WHERE SPERSONID = '".$_POST["SPERSONID"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['SName'] = $row['SName'];
			$output['CONTACTNO'] = $row['CONTACTNO'];
			$output['CUSTOMERASSIGNED'] = $row['CUSTOMERASSIGNED'];
			
		}
		echo json_encode($output);
	}
	if($_POST["action"] == "update")
	{
		$query = "
		UPDATE salesperson
		SET SName = '".$_POST["SName"]."', 
		CONTACTNO = '".$_POST["CONTACTNO"]."' , 
		CUSTOMERASSIGNED = '".$_POST["CUSTOMERASSIGNED"]."' , 
		WHERE SPERSONID = '".$_POST["hidden_SPERSONID"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Updated</p>';
	}
	if($_POST["action"] == "delete")
	{
		$query = "DELETE FROM salesperson WHERE SPERSONID = '".$_POST["SPERSONID"]."'";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Deleted</p>';
	}
}

?>
