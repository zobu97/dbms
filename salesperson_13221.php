
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
  <li><a href="salesorder_13221.php">SALESORDER</a></li>
  <li><a href="product_13221.php">PRODUCT</a></li>
  <li><a href="user_13221.php">USER</a></li>
  
  <li style = "float:right;"><a href="/Login/login.php">LOGOUT</a></li>
  <li style = "float:right;"><a href="home.php">MENU</a></li>
</ul>
 
        <title>SALESPERSON</title>  
		<link rel="stylesheet" href="jquery-ui.css">
        <link rel="stylesheet" href="bootstrap.min.css" />
		<script src="jquery.min.js"></script>  
		<script src="jquery-ui.js"></script>
		<!-- <link rel="stylesheet" type="text/css" href="style1.css"> -->


		
    </head>  
    <body>  
        <div class="container">
			<br />
			
			<h3 align="center" style="color: #ef6c00">SALESPERSON</a></h3><br />
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
					<label>Enter SalesPerson Name</label>
					<input type="text" name="SName" id="SName" class="form-control" />
					<span id="error_SName" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Contact Number</label>
					<input type="text" name="CONTACTNO" id="CONTACTNO" class="form-control" />
					<span id="error_CONTACTNO" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Customer Assigned</label>
					<input type="text" name="CUSTOMERASSIGNED" id="CUSTOMERASSIGNED" class="form-control" />
					<span id="error_CUSTOMERASSIGNED" class="text-danger"></span>
				</div>
				
				<div class="form-group">
					<input type="hidden" name="action" id="action" value="insert" />
					<input type="hidden" name="hidden_SPERSONID" id="hidden_SPERSONID" />
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
			url:"fetchsalesperson.php",
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
		var error_SName = '';
		var error_CONTACTNO = '';
		var error_CUSTOMERASSIGNED = '';
	
		if($('#SName').val() == '')
		{
			error_SName = 'SalesPerson Name is required';
			$('#error_SName').text(error_SName);
			$('#SName').css('border-color', '#cc0000');
		}
		else
		{
			error_SName = '';
			$('#error_SName').text(error_SName);
			$('#SName').css('border-color', '');
		}
		if($('#CONTACTNO').val() == '')
		{
			error_CONTACTNO = 'Contact Number is required';
			$('#error_CONTACTNO').text(error_CONTACTNO);
			$('#CONTACTNO').css('border-color', '#cc0000');
		}
		else
		{
			error_CONTACTNO = '';
			$('#error_CONTACTNO').text(error_CONTACTNO);
			$('#CONTACTNO').css('border-color', '');
		}
		if($('#CUSTOMERASSIGNED').val() == '')
		{
			error_CUSTOMERASSIGNED = 'Customer Assigned is required';
			$('#error_CUSTOMERASSIGNED').text(error_CUSTOMERASSIGNED);
			$('#CUSTOMERASSIGNED').css('border-color', '#cc0000');
		}
		else
		{
			error_CUSTOMERASSIGNED = '';
			$('#error_CUSTOMERASSIGNED').text(error_CUSTOMERASSIGNED);
			$('#CUSTOMERASSIGNED').css('border-color', '');
		}
		
		if(error_SName != '' || error_CONTACTNO != '' || error_CUSTOMERASSIGNED != '')
		{
			return false;
		}
		else
		{
			$('#form_action').attr('disabled', 'disabled');
			var form_data = $(this).serialize();
			$.ajax({
				url:"actionsalesperson.php",
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
		var SPERSONID = $(this).attr('SPERSONID');
		var action = 'fetch_single';
		$.ajax({
			url:"actionsalesperson.php",
			method:"POST",
			data:{SPERSONID:SPERSONID, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#SName').val(data.SName);
				$('#CONTACTNO').val(data.CONTACTNO);
				$('#CUSTOMERASSIGNED').val(data.CUSTOMERASSIGNED);
			
				$('#user_dialog').attr('title', 'Edit Data');
				$('#action').val('update');
				$('#hidden_SPERSONID').val(SPERSONID);
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
				var SPERSONID = $(this).data('SPERSONID');
				var action = 'delete';
				$.ajax({
					url:"actionsalesperson.php",
					method:"POST",
					data:{SPERSONID:SPERSONID, action:action},
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
		var SPERSONID = $(this).attr("SPERSONID");
		$('#delete_confirmation').data('SPERSONID', SPERSONID).dialog('open');
	});
	
});  
</script>


