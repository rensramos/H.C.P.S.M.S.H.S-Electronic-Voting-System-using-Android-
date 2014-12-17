<?php
	include ('connect_DB.php');
	include ('../function/generated_Password.php');
	$message = 0;
	$messageinfo = "..failed";
	if(isset($_POST['sadd'])){
		$fname = mysql_real_escape_string(stripslashes($_POST['fname']));
		$mini = mysql_real_escape_string(str_replace('.','',(stripslashes($_POST['mini']))));
		$lname = mysql_real_escape_string(stripslashes($_POST['lname']));
		$uname = mysql_real_escape_string(stripslashes($_POST['uname']));
		//$realpwd = generateStrongPassword();
		//$pwd = md5($realpwd);
		$pwd = generateStrongPassword();
		$year = mysql_real_escape_string(stripslashes($_POST['year']));
		$query="insert into tblvoter value ('','$fname','$mini','$lname','$uname','$pwd','$year','0')";
		$res=mysql_query($query); 
		if($res){
			$message = 1;
		}
		else{
			$messageinfo = "User ID already Exist";
		}
	}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Total Form Validation</title>
	<link rel="stylesheet" title="default" style="text/css" href="../css/form.css" />
	<!--[if IE]>
	<style>
		.item .tooltip .content{ display:none; opacity:1; }
		.item .tooltip:hover .content{ display:block; }
	</style>
	<![endif]-->
</head>
<body class="f">
	<div id='wrap'>
		<section class='form'>
			<form action="../pages/student_add.php" method="post" novalidate enctype="multipart/form-data">
				<fieldset>
                
					<div class="item">
                   <p style="float:left; margin-top:7px;  color:#737373;;">First Name</p>
						<label style="margin-left:15px;"> 
            				 <input  name="fname"  placeholder="First Name" required='required'  type="text" />		
						</label>
					</div>
                    <div class="item">
                    <p style="float:left;  margin-top:7px; color:#737373; ">Middle Initial</p>
						<label style="margin-left:7px;">
							<input data-validate-length="1,2" name="mini" placeholder="Middle Initial" required='required' 
                            type="text" />		
						</label>
						<div class='tooltip help'>
						<span>?</span>
                        
							<div class='content'>
								<b></b>
								<p class="f">Middle Initial must be 1 or 2 letters</p>
							</div>
						</div>
					</div>
                    <div class="item">
                    <p style="float:left; margin-top:7px; color:#737373;">Last Name</p>
						<label style="margin-left:15px;">
							<input name="lname" placeholder="Last Name" required='required' type="text" />		
						</label>
						
					</div>
                    <div class="item">
                    <p style="float:left; margin-top:7px; color:#737373;    ">User ID</p>
						<label style="margin-left:32px;">
							<input name="uname" placeholder="User ID" required='required' type="text" />		
						</label>
					</div>
                    
					<div class="item" >
                    <p style="float:left; margin-top:2px;    color:#737373; ">Grade Year</p>
						<label style="margin-left:10px;">
							<select class="required" name="year">
								<option value="">-- Choose Year --</option>
								<option value="7">Grade 7</option>
								<option value="8">Grade 8</option>
								<option value="9">Grade 9</option>
							</select>
						</label>
						<div class='tooltip help'>
							<span>?</span>
							<div class='content'>
								<b></b>
								<p class="f">Choose something.</p>
							</div>
						</div>
					</div>
				</fieldset>
				<!--<button id='send' type='submit' class="btn" name="add"></button>
                <button type='reset' class="btn"></button>-->
                <div id="buttonalign">
                <input type="image" img="" src="../photo/add.png" name="sadd" value="Add">
               	<!-- <input type="image" img="" src="../photo/reset2.png" name="sreset" value="sreset"> -->
                <br/>
                </div>
			</form>	
		</section>
        
	</div>
	<script src="../javascript/forms/form1.js"></script>
    <script src="../javascript/forms/validator.js"></script>
	<script>
		// initialize the validator function
		validator.message['date'] = 'not a real date';
		
		// validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
		$('form')
			.on('blur', 'input[required], input.optional, select.required', validator.checkField)
			.on('change', 'select.required', validator.checkField);
			
		$('.multi.required')
			.on('keyup', 'input', function(){ 
				validator.checkField.apply( $(this).siblings().last()[0] );
			}).on('blur', 'input', function(){ 
				validator.checkField.apply( $(this).siblings().last()[0] );
			});
		
		// bind the validation to the form submit event
		//$('#send').click('submit');//.prop('disabled', true);
		
		$('form').submit(function(e){
			e.preventDefault();
			var submit = true;
			// evaluate the form using generic validaing
			if( !validator.checkAll( $(this) ) ){
				submit = false;
			}

			if( submit )
				this.submit();
			return false;
		});
		
		/* FOR DEMO ONLY */
		$('#vfields').change(function(){
			$('form').toggleClass('mode2');
		}).prop('checked',false);
		
		$('#alerts').change(function(){
			validator.defaults.alerts = (this.checked) ? false : true;
			if( this.checked )
				$('form .alert').remove();
		}).prop('checked',false);
	</script>
</body>
</html>

