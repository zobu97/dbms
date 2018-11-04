
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
 <li><a href="customer_13221.php">CUSTOMER</a></li>
  <li><a href="salesperson13221.php">SALESPERSON</a></li>
  <li><a href="product13221.php">PRODUCT</a></li>
  <li><a href="user13221.php">USER</a></li>
  
  <li style = "float:right;"><a href="/Login/login.php">LOGOUT</a></li>
  <li style = "float:right;"><a href="home.php">MENU</a></li>
</ul>
 
        <title>SALES ORDER</title>  
		<link rel="stylesheet" href="jquery-ui.css">
        <link rel="stylesheet" href="bootstrap.min.css" />
		<script src="jquery.min.js"></script>  
		<script src="jquery-ui.js"></script>
		<!-- <link rel="stylesheet" type="text/css" href="style1.css"> -->


		
    </head>  
    <body>  
        <div class="container">
			<br />
			
			<h3 align="center" style="color: #ef6c00">SALESORDER</a></h3><br />
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
					<label>Enter Customer ID</label>
					<input type="text" name="CID" id="CID" class="form-control" />
					<span id="error_CID" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Sales Date</label>
					<input type="text" name="SDATE" id="SDATE" class="form-control" />
					<span id="error_SDATE" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter SalesPerson Name</label>
					<input type="text" name="SName" id="SName" class="form-control" />
					<span id="error_SName" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Product Code</label>
					<input type="text" name="PCODE" id="PCODE" class="form-control" />
					<span id="error_PCODE" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Quantity</label>
					<input type="text" name="QUANTITY" id="QUANTITY" class="form-control" />
					<span id="error_QUANTITY" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Rate</label>
					<input type="text" name="RATE" id="RATE" class="form-control" />
					<span id="error_RATE" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Amount</label>
					<input type="text" name="AMOUNT" id="AMOUNT" class="form-control" />
					<span id="error_AMOUNT" class="text-danger"></span>
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
			url:"fetch.php",
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
		var error_CID = '';
		var error_SDATE = '';
		var error_SName = '';
		var error_PCODE = '';
		var error_QUANTITY = '';
		var error_RATE = '';
		var error_AMOUNT = '';
		if($('#CID').val() == '')
		{
			error_CID = 'Customer ID is required';
			$('#error_CID').text(error_CID);
			$('#CID').css('border-color', '#cc0000');
		}
		else
		{
			error_CID = '';
			$('#error_CID').text(error_CID);
			$('#CID').css('border-color', '');
		}
		if($('#SDATE').val() == '')
		{
			error_SDATE = 'Sales Date is required';
			$('#error_SDATE').text(error_SDATE);
			$('#SDATE').css('border-color', '#cc0000');
		}
		else
		{
			error_SDATE = '';
			$('#error_SDATE').text(error_SDATE);
			$('#SDATE').css('border-color', '');
		}
		if($('#SName').val() == '')
		{
			error_SName = 'Sales Person Name is required';
			$('#error_SName').text(error_SName);
			$('#SName').css('border-color', '#cc0000');
		}
		else
		{
			error_SName = '';
			$('#error_SName').text(error_SName);
			$('#SName').css('border-color', '');
		}
		if($('#PCODE').val() == '')
		{
			error_PCODE = 'Product Code is required';
			$('#error_PCODE').text(error_PCODE);
			$('#PCODE').css('border-color', '#cc0000');
		}
		else
		{
			error_PCODE = '';
			$('#error_PCODE').text(error_PCODE);
			$('#PCODE').css('border-color', '');
		}
		if($('#QUANTITY').val() == '')
		{
			error_QUANTITY = 'Quantity is required';
			$('#error_QUANTITY').text(error_QUANTITY);
			$('#QUANTITY').css('border-color', '#cc0000');
		}
		else
		{
			error_QUANTITY = '';
			$('#error_QUANTITY').text(error_QUANTITY);
			$('#QUANTITY').css('border-color', '');
		}
		if($('#RATE').val() == '')
		{
			error_RATE = 'Rate is required';
			$('#error_RATE').text(error_RATE);
			$('#RATE').css('border-color', '#cc0000');
		}
		else
		{
			error_RATE = '';
			$('#error_RATE').text(error_RATE);
			$('#RATE').css('border-color', '');
		}
		if($('#AMOUNT').val() == '')
		{
			error_AMOUNT = 'Amount is required';
			$('#error_AMOUNT').text(error_AMOUNT);
			$('#AMOUNT').css('border-color', '#cc0000');
		}
		else
		{
			error_AMOUNT = '';
			$('#error_AMOUNT').text(error_AMOUNT);
			$('#AMOUNT').css('border-color', '');
		}
		if(error_CID != '' || error_SDATE != '' || error_SName != '' || error_PCODE != '' || error_QUANTITY != '' || error_RATE != '' || error_AMOUNT != '')
		{
			return false;
		}
		else
		{
			$('#form_action').attr('disabled', 'disabled');
			var form_data = $(this).serialize();
			$.ajax({
				url:"action.php",
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
		var id = $(this).attr('id');
		var action = 'fetch_single';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#CID').val(data.CID);
				$('#SDATE').val(data.SDATE);
				$('#SName').val(data.SName);
				$('#PCODE').val(data.PCODE);
				$('#QUANTITY').val(data.QUANTITY);
				$('#RATE').val(data.RATE);
				$('#AMOUNT').val(data.AMOUNT);
				$('#user_dialog').attr('title', 'Edit Data');
				$('#action').val('update');
				$('#hidden_id').val(id);
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
				var id = $(this).data('id');
				var action = 'delete';
				$.ajax({
					url:"action.php",
					method:"POST",
					data:{id:id, action:action},
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
		var id = $(this).attr("id");
		$('#delete_confirmation').data('id', id).dialog('open');
	});
	
});  
</script>


