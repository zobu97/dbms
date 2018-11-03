<?php

//fetch.php

include("salesorderconnection.php");

$query = "SELECT * FROM salesorder";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = '
<table class="table table-striped table-bordered">
	<tr>
		<th>ORDERNO</th>
		<th>CID</th>
		<th>SDATE</th>
		<th>SName</th>
		<th>PCODE</th>
		<th>QUANTITY</th>
		<th>RATE</th>
		<th>AMOUNT</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
';
if($total_row > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td width="40%">'.$row["ORDERNO"].'</td>
			<td width="40%">'.$row["CID"].'</td>
			<td width="40%">'.$row["SDATE"].'</td>
			<td width="40%">'.$row["SName"].'</td>
			<td width="40%">'.$row["PCODE"].'</td>
			<td width="40%">'.$row["QUANTITY"].'</td>
			<td width="40%">'.$row["RATE"].'</td>
			<td width="40%">'.$row["AMOUNT"].'</td>
			<td width="10%">
				<button type="button" name="edit" class="btn btn-primary btn-xs edit" id="'.$row["id"].'">Edit</button>
			</td>
			<td width="10%">
				<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Delete</button>
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