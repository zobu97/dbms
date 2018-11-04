<?php

//action.php

include('productconnection.php');
error_reporting(0);

if(isset($_POST["action"]))
{
	if($_POST["action"] == "Insert")
	{
		$PCODE = $_POST['PCODE'];
		$BRAND = $_POST['BRAND'];
		$TYPE = $_POST['TYPE'];
		$SHADE = $_POST['SHADE'];
		$SIZE = $_POST['SIZE'];
		$SALESPRICE = $_POST['SALESPRICE'];

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

		$query = "INSERT INTO product VALUES ('$PCODE' , '$BRAND' , '$TYPE' , '$SHADE' , '$SIZE' , '$SALESPRICE')";

		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Inserted...</p>';
	}
	if($_POST["action"] == "fetch_single")
	{
		$query = "
		SELECT * FROM product WHERE PCODE = '".$_POST["PCODE"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['BRAND'] = $row['BRAND'];
			$output['TYPE'] = $row['TYPE'];
			$output['SHADE'] = $row['SHADE'];
			$output['SIZE'] = $row['SIZE'];
			$output['SALESPRICE'] = $row['SALESPRICE'];
		}
		echo json_encode($output);
	}
	if($_POST["action"] == "update")
	{
		$query = "
		UPDATE product
		SET BRAND = '".$_POST["BRAND"]."', 
		TYPE = '".$_POST["TYPE"]."' , 
		SHADE = '".$_POST["SHADE"]."' , 
		SIZE = '".$_POST["SIZE"]."' , 
		SALESPRICE = '".$_POST["SALESPRICE"]."' , 
		WHERE PCODE = '".$_POST["hidden_PCODE"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Updated</p>';
	}
	if($_POST["action"] == "delete")
	{
		$query = "DELETE FROM product WHERE PCODE = '".$_POST["PCODE"]."'";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Deleted</p>';
	}
}

?>
