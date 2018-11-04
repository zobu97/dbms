<?php

//fetch.php

include("salespersonconnection.php");

$query = "SELECT * FROM salesperson";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = '
<table class="table table-striped table-bordered">
	<tr>
		<th>SALESPERSON ID</th>
		<th>SALESPERSON NAME</th>
		<th>CONTACT NUMBER</th>
		<th>CUSTOMERS ASSIGNED</th>
		<th colspan="2">OPERATIONS</th>
	</tr>
';
if($total_row > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td width="40%">'.$row["SPERSONID"].'</td>
			<td width="40%">'.$row["SName"].'</td>
			<td width="40%">'.$row["CONTACTNO"].'</td>
			<td width="70%">'.$row["CUSTOMERASSIGNED"].'</td>
		
			<td width="10%">
				<button type="button" name="edit" class="btn btn-primary btn-s edit" SPERSONID="'.$row["SPERSONID"].'">Edit</button>
			</td>
			<td width="10%">
				<button type="button" name="delete" class="btn btn-danger btn-s delete" SPERSONID="'.$row["SPERSONID"].'">Delete</button>
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

