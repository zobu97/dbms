
<html>  
    <head> 
	<style>

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
    border-right:1px solid #bbb;
}

li:last-child {
    border-right: none;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
	background-color: #bbb;
	text-decoration:none;
	text-color:white;
}

.active {
    background-color: #4CAF50;
}
</style>
</head>
<body>

<ul>
 <li><a href="salesorder_13221.php">SALESORDER</a></li>
  <li><a href="salesperson13221.php">SALESPERSON</a></li>
  <li><a href="product13221.php">PRODUCT</a></li>
  <li><a href="user13221.php">USER</a></li>
  <li style = "float:right;"><a href="home.php">MENU</a></li>
</ul>
 
        <title>CUSTOMER</title>  
		<link rel="stylesheet" href="jquery-ui.css">
        <link rel="stylesheet" href="bootstrap.min.css" />
		<script src="jquery.min.js"></script>  
		<script src="jquery-ui.js"></script>
		<!-- <link rel="stylesheet" type="text/css" href="style1.css"> -->


		
    </head>  
    <body>  
        <div class="container">
			<br />
			
			<h3 align="center" style="color: #ef6c00">CUSTOMER</a></h3><br />
			<!-- <h1 style="color: #ef6c00">Product</h1> -->
			<br />
			<div align="right" style="margin-bottom:15px">
			<button type="button" name="add" id="add" class="btn btn-success btn-s">ADD NEW RECORD</button>
			<br>
			</div>
			<div class="table-responsive" id="user_data">
				
			</div>
			<br />
		</div>
		
		<div id="user_dialog" title="Add Data">
			<form method="post" id="user_form">
				<div class="form-group">
					<label>Enter Shop Name</label>
					<input type="text" name="SNAME" id="SNAME" class="form-control" />
					<span id="error_SNAME" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Customer Name</label>
					<input type="text" name="CNAME" id="CNAME" class="form-control" />
					<span id="error_CNAME" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Customer Number</label>
					<input type="text" name="CNUMBER" id="CNUMBER" class="form-control" />
					<span id="error_CNUMBER" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Address</label>
					<input type="text" name="ADDRESS" id="ADDRESS" class="form-control" />
					<span id="error_ADDRESS" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Area</label>
					<input type="text" name="AREA" id="AREA" class="form-control" />
					<span id="error_AREA" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Coordinates</label>
					<input type="text" name="COORDINATES" id="COORDINATES" class="form-control" />
					<span id="error_COORDINATES" class="text-danger"></span>
				</div>
		
				<div class="form-group">
					<input type="hidden" name="action" id="action" value="insert" />
					<input type="hidden" name="hidden_id" id="hidden_id" />
					<input type="submit" name="form_action" id="form_action" class="btn btn-info" value="Insert" />
				</div>
			</form>
		</div>
		
		<div id="action_alert" title="Action">
			
		</div>
		
		<div id="delete_confirmation" title="Confirmation">
		<p>Are you sure you want to Delete this data?</p>
		</div>
		
    </body>  
</html>  




<script>  
$(document).ready(function(){  

	load_data();
    
	function load_data()
	{
		$.ajax({
			url:"fetchcustomer.php",
			method:"POST",
			success:function(data)
			{
				$('#user_data').html(data);
			}
		});
	}
	
	$("#user_dialog").dialog({
		autoOpen:false,
		width:400
	});
	
	$('#add').click(function(){
		$('#user_dialog').attr('title', 'Add Data');
		$('#action').val('Insert');
		$('#form_action').val('Insert');
		$('#user_form')[0].reset();
		$('#form_action').attr('disabled', false);
		$("#user_dialog").dialog('open');
	});
	
	$('#user_form').on('submit', function(event){
		event.preventDefault();
		var error_SNAME = '';
		var error_CNAME = '';
		var error_CNUMBER = '';
		var error_ADDRESS = '';
		var error_AREA = '';
		var error_COORDINATES = '';
		if($('#SNAME').val() == '')
		{
			error_SNAME = 'Shop Name is required';
			$('#error_SNAME').text(error_SNAME);
			$('#SNAME').css('border-color', '#cc0000');
		}
		else
		{
			error_SNAME = '';
			$('#error_SNAME').text(error_SNAME);
			$('#SNAME').css('border-color', '');
		}
		if($('#CNAME').val() == '')
		{
			error_CNAME = 'Customer Name is required';
			$('#error_CNAME').text(error_CNAME);
			$('#CNAME').css('border-color', '#cc0000');
		}
		else
		{
			error_CNAME = '';
			$('#error_CNAME').text(error_CNAME);
			$('#CNAME').css('border-color', '');
		}
		if($('#CNUMBER').val() == '')
		{
			error_CNUMBER = 'Customer Number is required';
			$('#error_CNUMBER').text(error_CNUMBER);
			$('#CNUMBER').css('border-color', '#cc0000');
		}
		else
		{
			error_CNUMBER = '';
			$('#error_CNUMBER').text(error_CNUMBER);
			$('#CNUMBER').css('border-color', '');
		}
		if($('#ADDRESS').val() == '')
		{
			error_ADDRESS = 'Customer Address is required';
			$('#error_ADDRESS').text(error_ADDRESS);
			$('#ADDRESS').css('border-color', '#cc0000');
		}
		else
		{
			error_ADDRESS = '';
			$('#error_ADDRESS').text(error_ADDRESS);
			$('#ADDRESS').css('border-color', '');
		}
		if($('#AREA').val() == '')
		{
			error_AREA = 'Area is required';
			$('#error_AREA').text(error_AREA);
			$('#AREA').css('border-color', '#cc0000');
		}
		else
		{
			error_AREA = '';
			$('#error_AREA').text(error_AREA);
			$('#AREA').css('border-color', '');
		}
		if($('#COORDINATES').val() == '')
		{
			error_COORDINATES = 'Coordinates are required';
			$('#error_COORDINATES').text(error_COORDINATES);
			$('#COORDINATES').css('border-color', '#cc0000');
		}
		else
		{
			error_COORDINATES = '';
			$('#error_COORDINATES').text(error_COORDINATES);
			$('#COORDINATES').css('border-color', '');
		}
		
		if(error_SNAME != '' || error_CNAME != '' || error_CNUMBER != '' || error_ADDRESS != '' || error_AREA != '' || error_COORDINATES != '')
		{
			return false;
		}
		else
		{
			$('#form_action').attr('disabled', 'disabled');
			var form_data = $(this).serialize();
			$.ajax({
				url:"actioncustomer.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					$('#user_dialog').dialog('close');
					$('#action_alert').html(data);
					$('#action_alert').dialog('open');
					load_data();
					$('#form_action').attr('disabled', false);
				}
			});
		}
		
	});
	
	$('#action_alert').dialog({
		autoOpen:false
	});
	
	$(document).on('click', '.edit', function(){
		var CID = $(this).attr('CID');
		var action = 'fetch_single';
		$.ajax({
			url:"actioncustomer.php",
			method:"POST",
			data:{CID:CID, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#SNAME').val(data.SNAME);
				$('#CNAME').val(data.CNAME);
				$('#CNUMBER').val(data.CNUMBER);
				$('#ADDRESS').val(data.ADDRESS);
				$('#AREA').val(data.AREA);
				$('#COORDINATES').val(data.COORDINATES);
				$('#user_dialog').attr('title', 'Edit Data');
				$('#action').val('update');
				$('#hidden_id').val(CID);
				$('#form_action').val('Update');
				$('#user_dialog').dialog('open');
			}
		});
	});
	
	$('#delete_confirmation').dialog({
		autoOpen:false,
		modal: true,
		buttons:{
			Ok : function(){
				var CID = $(this).data('CID');
				var action = 'delete';
				$.ajax({
					url:"actioncustomer.php",
					method:"POST",
					data:{CID:CID, action:action},
					success:function(data)
					{
						$('#delete_confirmation').dialog('close');
						$('#action_alert').html(data);
						$('#action_alert').dialog('open');
						load_data();
					}
				});
			},
			Cancel : function(){
				$(this).dialog('close');
			}
		}	
	});
	
	$(document).on('click', '.delete', function(){
		var CID = $(this).attr("CID");
		$('#delete_confirmation').data('CID', CID).dialog('open');
	});
	
});  
</script>


