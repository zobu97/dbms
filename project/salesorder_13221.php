<html>  
    <head>  
        <title>SALES ORDER</title>  
		<link rel="stylesheet" href="jquery-ui.css">
        <link rel="stylesheet" href="bootstrap.min.css" />
		<script src="jquery.min.js"></script>  
		<script src="jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">
			<br />
			
			<h3 align="center">SALESORDER</a></h3><br />
			<br />
			<div align="right" style="margin-bottom:5px;">
			<button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>
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
		$('#action').val('insert');
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
			$('#last_SDATE').css('border-color', '');
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
			$('#last_SName').css('border-color', '');
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
			$('#last_PCODE').css('border-color', '');
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
			$('#last_QUANTITY').css('border-color', '');
		}
		if($('#RATE').val() == '')
		{
			error_RATE = 'Rate is required';
			$('#error_RATE').text(error_RATEE);
			$('#RATE').css('border-color', '#cc0000');
		}
		else
		{
			error_RATE = '';
			$('#error_RATE').text(error_RATE);
			$('#last_RATE').css('border-color', '');
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
			$('#last_AMOUNT').css('border-color', '');
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