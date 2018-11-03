<?php

//action.php

include('salesorderconnection.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == "insert")
	{
		$query = "
		INSERT INTO salesorder (CID, SDATE, SName, PCODE, QUANTITY, RATE, AMOUNT) VALUES ('".$_POST["CID"]."', '".$_POST["SDATE"]."', '".$_POST["SName"]."', '".$_POST["PCODE"]."', '".$_POST["QUANTITY"]."', '".$_POST["RATE"]."', '".$_POST["AMOUNT"]."')
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Inserted...</p>';
	}
	if($_POST["action"] == "fetch_single")
	{
		$query = "
		SELECT * FROM salesorder WHERE id = '".$_POST["id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['CID'] = $row['CID'];
			$output['SDATE'] = $row['SDATE'];
			$output['SName'] = $row['SName'];
			$output['PCODE'] = $row['PCODE'];
			$output['QUANTITY'] = $row['QUANTITY'];
			$output['RATE'] = $row['RATE'];
			$output['AMOUNT'] = $row['AMOUNT'];
		}
		echo json_encode($output);
	}
	if($_POST["action"] == "update")
	{
		$query = "
		UPDATE salesorder 
		SET CID = '".$_POST["CID"]."', 
		SDATE = '".$_POST["SDATE"]."' , 
		SName = '".$_POST["SName"]."' , 
		PCODE = '".$_POST["PCODE"]."' , 
		QUANTITY = '".$_POST["QUANTITY"]."' , 
		RATE = '".$_POST["RATE"]."' , 
		AMOUNT = '".$_POST["AMOUNT"]."' 
		WHERE id = '".$_POST["hidden_id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Updated</p>';
	}
	if($_POST["action"] == "delete")
	{
		$query = "DELETE FROM salesorder WHERE id = '".$_POST["id"]."'";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Deleted</p>';
	}
}

?>