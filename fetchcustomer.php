<?php

//fetch.php

include("customerconnection.php");


$query = "SELECT * FROM customer";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = '


<table class="table table-striped table-bordered">
	<tr>
		<th>CUSTOMER ID</th>
		<th>SHOP NAME</th>
		<th>CUSTOMER NAME</th>
		<th>CUSTOMER NUMBER</th>
		<th>CUSTOMER ADDRESS</th>
		<th>AREA</th>
		<th>COORDINATES</th>
		<th colspan="2">OPERATIONS</th>
	</tr>
';
if($total_row > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td width="40%">'.$row["CID"].'</td>
			<td width="504%">'.$row["SNAME"].'</td>
			<td width="70%">'.$row["CNAME"].'</td>
			<td width="70%">'.$row["CNUMBER"].'</td>
			<td width="40%">'.$row["ADDRESS"].'</td>
			<td width="40%">'.$row["AREA"].'</td>
			<td width="40%">'.$row["COORDINATES"].'</td>
			<td width="10%">
				<button type="button" name="edit" class="btn btn-primary btn-s edit" CID="'.$row["CID"].'">EDIT</button>
			</td>
			<td width="10%">
				<button type="button" name="delete" class="btn btn-danger btn-s delete" CID="'.$row["CID"].'">DELETE</button>
			</td>
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="4" align="center">Data not found</td>
	</tr>
	';
}
$output .= '</table>';
echo $output;
?>

