<?php
	include('connect_DB.php');
	include('../include/getYear.php');
	$aid = $_SESSION['sess_AID'];
	$name = $_SESSION['sess_name'];
?>

<?php
	$message=0;
	$messageinfo = "..Failed!";
	
	
	if(isset($_POST['changesave'])){
		$query1="select * from tbladmin where AID='$aid'";
		$res1=mysql_query($query1) or die (mysql_error());
		while($r=mysql_fetch_array($res1)){
			$pwd=$r['Password'];
		}
		
		$cpwd=md5(mysql_real_escape_string(stripslashes($_POST['cpwd'])));
		$cpwds=$_POST['cpwd'];
		$npwd=md5(mysql_real_escape_string(stripslashes($_POST['npwd'])));
		$query = "UPDATE tbladmin SET Password='$npwd' WHERE aid='$aid' AND Password='$cpwd'";
		$res=mysql_query($query);
		if($res){
			
			if(mysql_num_rows($res1)==1){
				//echo $pwd." ".$npwd."</br>";
				//echo $cpwd." ".$cpwds;
				if($cpwd<>$pwd){
				$messageinfo = "Wrong current Passsword!" ;
				}
				else{
				$message=1;
				}
			}
			
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
	<!--<table id="breadcontainer4">
    	<tr>
        	<td id="bread1"><a href="admin_view.php">VIEWING OF ADMIN</a></td>
            <td id="bread2"></td>
        <tr>
    </table>-->
    <?php echo"Admin : $name"; ?> 
	<section class='form'>
			<form action="<?php echo"admin_changePassword.php"; ?>" method="post" novalidate>
				<fieldset>
                    
                    <div class="item">
                    <p style="float:left; margin-top:7px; color:#737373;">Current Password</p>
						<label style="margin-left:5px;">
							<input type="password" name="cpwd"  required='required' placeholder="Current Password">
						</label>
					</div>
					
				  	<div class="item">
                    <p style="float:left; margin-top:7px; color:#737373;">New Password</p>
						<label style="margin-left:19px;">
							<input type="password" name="pwd" data-validate-length-range="6,15" required='required' placeholder="New Password">
						</label>
						<div class='tooltip help'>
							<div class='content'>
								<b></b>
								<p class="f">Should be of length 6 OR 8 characters</p>
							</div>
						</div>
					</div>
					<div class="item">
                    <p style="float:left; margin-top:7px; color:#737373;">Validate</p>
						<label style="margin-left:55px;">
                        
							<input type="password" name="npwd" data-validate-linked='pwd' required='required' placeholder="Confirm Password">
						</label>
					</div>
				</fieldset>
                <div id="buttonalign">
                <input id="send" type="image" name="changesave" value="Save" src="../photo/save.png"/>
                <!--<input type="image" src="../photo/reset2.png" name="scancel" value="cancel">-->
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