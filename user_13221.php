
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
  <li><a href="product_13221.php">PRODUCT</a></li>
  
  <li style = "float:right;"><a href="/Login/login.php">LOGOUT</a></li>
  <li style = "float:right;"><a href="home.php">MENU</a></li>
</ul>
 
        <title>USER</title>  
		<link rel="stylesheet" href="jquery-ui.css">
        <link rel="stylesheet" href="bootstrap.min.css" />
		<script src="jquery.min.js"></script>  
		<script src="jquery-ui.js"></script>
		<link rel="stylesheet" type="text/css" href="style1.css">
		<script>

        var ajax_c = new XMLHttpRequest();
				var method_c = "GET";
				var async_c = true;
				var url_c = "sales.php";

				ajax_c.open(method_c, url_c, async_c);
				ajax_c.send();

				ajax_c.onreadystatechange = function(){
				if(this.readyState == 4  && this.status == 200){
					var data = JSON.parse(this.responseText);
					for(var a= 0; a< data.length; a++){
						// alert("dgs");
						
						$('#SName').append('<option SName="' + data[a].SName + '">' + data[a].SName+'</option>');
						// $('#SName').append('<option SPERSONID="' + data[a].SPERSONID + '">' + data[a].SPERSONID+'</option>');
						
					}
					
				}}; </script>

		
    </head>  
    <body>  
        <div class="container">
			<br />
			
			<h3 align="center" style="color: #ef6c00">USER</a></h3><br />
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
					<label>Enter USERNAME</label>
					<input type="text" name="USERNAME" id="USERNAME" class="form-control" />
					<span id="error_USERNAME" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Password</label>
					<input type="text" name="PASSWORD" id="PASSWORD" class="form-control" />
					<span id="error_PASSWORD" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Select if Active</label>
					<!-- <input type="text" name="ACTIVE" id="ACTIVE" class="form-control" /> -->
                    <select name="ACTIVE" id="ACTIVE" class="form-control">
                    <option value="YES">YES</option>  
                    <option value="NO">NO</option>
     
	                </select>
					<span id="error_ACTIVE" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Salesperson</label>
					<!-- <input type="text" name="SName" id="SName" class="form-control" /> -->
					<!-- name= SName is required for $_POST['SName']  to work ZUBO commenting is good, see you learned the use of name, (i too just learned it btw)  -->
                    <td><select name="SName" id="SName" class="form-control"><option></option></select required></td>
					<span id="error_SName" class="text-danger"></span>
				</div>
				
				<div class="form-group">
					<input type="hidden" name="action" id="action" value="insert" />
					<input type="hidden" name="hidden_UserID" id="hidden_UserID" />
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
			url:"fetchuser.php",
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
		var error_USERNAME = '';
		var error_PASSWORD = '';
		var error_ACTIVE = '';
		var error_SName = '';
		if($('#USERNAME').val() == '')
		{
			error_USERNAME = 'USERNAME is required';
			$('#error_USERNAME').text(error_USERNAME);
			$('#USERNAME').css('border-color', '#cc0000');
		}
		else
		{
			error_USERNAME = '';
			$('#error_USERNAME').text(error_USERNAME);
			$('#USERNAME').css('border-color', '');
		}
		if($('#PASSWORD').val() == '')
		{
			error_PASSWORD = 'PASSWORD is required';
			$('#error_PASSWORD').text(error_PASSWORD);
			$('#PASSWORD').css('border-color', '#cc0000');
		}
		else
		{
			error_PASSWORD = '';
			$('#error_PASSWORD').text(error_PASSWORD);
			$('#PASSWORD').css('border-color', '');
		}
		if($('#ACTIVE').val() == '')
		{
			error_ACTIVE = 'ACTIVE STATUS is required';
			$('#error_ACTIVE').text(error_ACTIVE);
			$('#ACTIVE').css('border-color', '#cc0000');
		}
		else
		{
			error_ACTIVE = '';
			$('#error_ACTIVE').text(error_ACTIVE);
			$('#ACTIVE').css('border-color', '');
		}
		if($('#SName').val() == '')
		{
			error_SName = 'SALESPERSON is required';
			$('#error_SName').text(error_SName);
			$('#SName').css('border-color', '#cc0000');
		}
		else
		{
			error_SName = '';
			$('#error_SName').text(error_SName);
			$('#SName').css('border-color', '');
		}
		
		
		if(error_USERNAME != '' || error_PASSWORD != '' || error_ACTIVE != '' || error_SName != '')
		{
			return false;
		}
		else
		{
			$('#form_action').attr('disabled', 'disabled');
			var form_data = $(this).serialize();
			$.ajax({
				url:"actionuser.php",
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
		var UserID = $(this).attr('UserID');
		var action = 'fetch_single';
		$.ajax({
			url:"actionuser.php",
			method:"POST",
			data:{UserID:UserID, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#USERNAME').val(data.USERNAME);
				$('#PASSWORD').val(data.PASSWORD);
				$('#ACTIVE').val(data.ACTIVE);
				$('#SName').val(data.SName);
				$('#user_dialog').attr('title', 'Edit Data');
				$('#action').val('update');
				$('#hidden_UserID').val(UserID);
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
				var UserID = $(this).data('UserID');
				var action = 'delete';
				$.ajax({
					url:"actionuser.php",
					method:"POST",
					data:{UserID:UserID, action:action},
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
		var UserID = $(this).attr("UserID");
		$('#delete_confirmation').data('UserID', UserID).dialog('open');
	});
	
});  
</script>


