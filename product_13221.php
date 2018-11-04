
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
  <li><a href="salesperson_13221.php">SALESPERSON</a></li>
  <li><a href="salesorder_13221.php">SALESORDER</a></li>
  <li><a href="user_13221.php">USER</a></li>
  
  <li style = "float:right;"><a href="/Login/login.php">LOGOUT</a></li>
  <li style = "float:right;"><a href="home.php">MENU</a></li>
</ul>
 
        <title>USER</title>  
		<link rel="stylesheet" href="jquery-ui.css">
        <link rel="stylesheet" href="bootstrap.min.css" />
		<script src="jquery.min.js"></script>  
		<script src="jquery-ui.js"></script>
		<!-- <link rel="stylesheet" type="text/css" href="style1.css"> -->


		
    </head>  
    <body>  
        <div class="container">
			<br />
			
			<h3 align="center" style="color: #ef6c00">PRODUCT</a></h3><br />
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
					<label>Enter BRAND</label>
					<input type="text" name="BRAND" id="BRAND" class="form-control" />
					<span id="error_BRAND" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Type</label>
					<input type="text" name="TYPE" id="TYPE" class="form-control" />
					<span id="error_TYPE" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Select Shade</label>
					<!-- <input type="text" name="ACTIVE" id="ACTIVE" class="form-control" /> -->
                    <select name="SHADE" id="SHADE" class="form-control">
                    <option value="YELLOW"; style="color: yellow">YELLOW</option>  
                    <option value="RED">RED</option>
					<option value="BLUE">BLUE</option>
					<option value="GREEN">GREEN</option>
					<option value="BLACK">BLACK</option>
					<option value="WHITE">WHITE</option>
                    </select>
					<span id="error_SHADE" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Size</label>
					<input type="text" name="SIZE" id="SIZE" class="form-control" />
					<span id="error_SIZE" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Salesprice</label>
					<input type="text" name="SALESPRICE" id="SALESPRICE" class="form-control" />
					<span id="error_SALESPRICE" class="text-danger"></span>
				</div>
				
				<div class="form-group">
					<input type="hidden" name="action" id="action" value="insert" />
					<input type="hidden" name="hidden_PCODE" id="hidden_PCODE" />
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
			url:"fetchproduct.php",
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
		var error_BRAND = '';
		var error_TYPE = '';
		var error_SHADE = '';
		var error_SIZE = '';
		var error_SALESPRICE = '';

		if($('#BRAND').val() == '')
		{
			error_BRAND = 'BRAND is required';
			$('#error_BRAND').text(error_BRAND);
			$('#BRAND').css('border-color', '#cc0000');
		}
		else
		{
			error_BRAND = '';
			$('#error_BRAND').text(error_BRAND);
			$('#BRAND').css('border-color', '');
		}
		if($('#TYPE').val() == '')
		{
			error_TYPE = 'TYPE is required';
			$('#error_TYPE').text(error_TYPE);
			$('#TYPE').css('border-color', '#cc0000');
		}
		else
		{
			error_TYPE = '';
			$('#error_TYPE').text(error_TYPE);
			$('#TYPE').css('border-color', '');
		}
		if($('#SHADE').val() == '')
		{
			error_SHADE = 'SHADEis required';
			$('#error_SHADE').text(error_SHADE);
			$('#SHADE').css('border-color', '#cc0000');
		}
		else
		{
			error_SHADE = '';
			$('#error_SHADE').text(error_SHADE);
			$('#SHADE').css('border-color', '');
		}
		if($('#SIZE').val() == '')
		{
			error_SIZE = 'SIZE is required';
			$('#error_SIZE').text(error_SIZE);
			$('#SIZE').css('border-color', '#cc0000');
		}
		else
		{
			error_SIZE = '';
			$('#error_SIZE').text(error_SIZE);
			$('#SIZE').css('border-color', '');
		}
		if($('#SALESPRICE').val() == '')
		{
			error_SALESPRICE = 'SALESPRICE is required';
			$('#error_SALESPRICE').text(error_SALESPRICE);
			$('#SALESPRICE').css('border-color', '#cc0000');
		}
		else
		{
			error_SALESPRICE = '';
			$('#error_SALESPRICE').text(error_SALESPRICE);
			$('#SALESPRICE').css('border-color', '');
		}
		
		
		
		if(error_BRAND != '' || error_TYPE != '' || error_SHADE != '' || error_SIZE != '' || error_SALESPRICE != '')
		{
			return false;
		}
		else
		{
			$('#form_action').attr('disabled', 'disabled');
			var form_data = $(this).serialize();
			$.ajax({
				url:"actionproduct.php",
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
		var PCODE = $(this).attr('PCODE');
		var action = 'fetch_single';
		$.ajax({
			url:"actionproduct.php",
			method:"POST",
			data:{PCODE:PCODE, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#BRAND').val(data.BRAND);
				$('#TYPE').val(data.TYPE);
				$('#SHADE').val(data.SHADE);
				$('#SIZE').val(data.SIZE);
				$('#SALESPRICE').val(data.SALESPRICE);

				$('#user_dialog').attr('title', 'Edit Data');
				$('#action').val('update');
				$('#hidden_PCODE').val(PCODE);
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
				var PCODE = $(this).data('PCODE');
				var action = 'delete';
				$.ajax({
					url:"actionproduct.php",
					method:"POST",
					data:{PCODE:PCODE, action:action},
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
		var PCODE = $(this).attr("PCODE");
		$('#delete_confirmation').data('PCODE', PCODE).dialog('open');
	});
	
});  
</script>


