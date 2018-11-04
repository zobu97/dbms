<?php

//fetch.php

include("userconnection.php");

$query = "SELECT * FROM user";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = '
<table class="table table-striped table-bordered">
	<tr>
		<th>USERID</th>
		<th>USERNAME</th>
		<th>PASSWORD</th>
		<th>ACTIVE</th>
		<th>SALESPERSON</th>
	
		<th colspan="2">OPERATIONS</th>
	</tr>
';
if($total_row > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td width="40%">'.$row["UserID"].'</td>
			<td width="40%">'.$row["USERNAME"].'</td>
			<td width="40%">'.$row["PASSWORD"].'</td>
			<td width="70%">'.$row["ACTIVE"].'</td>
			<td width="40%">'.$row["SName"].'</td>
			
	
			<td width="10%">
				<button type="button" name="edit" class="btn btn-primary btn-s edit" UserID="'.$row["UserID"].'">Edit</button>
			</td>
			<td width="10%">
				<button type="button" name="delete" class="btn btn-danger btn-s delete" UserID="'.$row["UserID"].'">Delete</button>
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

