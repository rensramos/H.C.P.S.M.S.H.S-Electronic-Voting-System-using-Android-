<?php
include ('connect_DB.php');
include ('../include/getYear.php');
$message = 0;
$messageinfo = "..Failed!";
if(isset($_POST['aadd'])){
	
	
	
	$query2="SELECT * FROM tbladmin WHERE SY='$year'";
	$res2=mysql_query($query2) or die (mysql_error());
	
	if(mysql_num_rows($res2)<1){
		$query1="UPDATE tbladmin set Status=0 WHERE SY<>'0000-0000'";
		$res1=mysql_query($query1) or die (mysql_error());
		
		$name = mysql_real_escape_string(stripslashes($_POST['name']));
		$uname = mysql_real_escape_string(stripslashes($_POST['uname']));
		$pwd = md5(mysql_real_escape_string(stripslashes($_POST['pwd'])));
$query="insert into tbladmin value ('','$name','$uname','$pwd','$year',1)";
		$res=mysql_query($query); 
		
		if($res){
			$message = 1;
		}
		else{
			$messageinfo = "Username already exist!";
		}
	}
	else{
		$messageinfo = "Duplicate of Admin!";
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
			<form action="../pages/admin_add.php" method="post" novalidate enctype="multipart/form-data">
				<fieldset>
					<div class="item" >
                    <p style="float:left; margin-top:7px; color:#737373;">Name</p>
						<label style="margin-left:28px;">
							<input name="name" placeholder="Name" data-validate-words="2" required="required" type="text" />		
						</label>
                        <div class='tooltip help'>
							<span>?</span>
							<div class='content'>
								<b></b>
								<p class="f">Name must be at least 2 words</p>
							</div>
						</div>
					</div>
                    
                    <div class="item">
                    <p style="float:left; margin-top:7px; color:#737373;">Username</p>
						<label style="margin-left:4px;">
							<input name="uname" placeholder="User Name" required="required" type="text" />		
						</label>
					</div>
                    
					<div class="item">
                    <p style="float:left; margin-top:7px; color:#737373;">Password</p>
						<label style="margin-left:6px;">
							<input type="password" name="password" data-validate-length-range="6,15" required='required'
                             placeholder="Password">
						</label>
						<div class='tooltip help'>
							<span>?</span>
							<div class='content'>
								<b></b>
								<p class="f">Should be of length 6 or more characters</p>
							</div>
						</div>
					</div>
                    
					<div class="item">
                    <p style="float:left; margin-top:7px; color:#737373;">Validate</p>
						<label style="margin-left:13px;">
							<input type="password" name="pwd" data-validate-linked='password' required='required' 
                            placeholder="Confirm Password">
						</label>
					</div>
				</fieldset>
                <div id="buttonalignadmin">
                 <input type="image" src="../photo/add.png" name="aadd" value="Add">
                 <!-- <input type="image" src="../photo/reset2.png" name="areset" value="reset"> -->
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

