<?php

//fetch.php

include("productconnection.php");

$query = "SELECT * FROM product";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = '
<table class="table table-striped table-bordered">
	<tr>
		<th>PRODUCT CODE</th>
		<th>BRAND</th>
		<th>TYPE</th>
		<th>SHADE</th>
		<th>SIZE</th>
		<th>SALESPRICE</th>
		<th colspan="2">OPERATIONS</th>
	</tr>
';
if($total_row > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td width="40%">'.$row["PCODE"].'</td>
			<td width="40%">'.$row["BRAND"].'</td>
			<td width="40%">'.$row["TYPE"].'</td>
			<td width="70%">'.$row["SHADE"].'</td>
			<td width="40%">'.$row["SIZE"].'</td>
			<td width="40%">'.$row["SALESPRICE"].'</td>
	
			<td width="10%">
				<button type="button" name="edit" class="btn btn-primary btn-s edit" PCODE="'.$row["PCODE"].'">Edit</button>
			</td>
			<td width="10%">
				<button type="button" name="delete" class="btn btn-danger btn-s delete" PCODE="'.$row["PCODE"].'">Delete</button>
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

