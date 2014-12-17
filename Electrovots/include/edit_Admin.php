<?php
	include('connect_DB.php');
	include ('../function/generated_Password.php');
	include('../include/getYear.php');
	$aid=$_GET['aid'];
	$query="select * from tbladmin where AID='" .$aid ."'";
	$res=mysql_query($query) or die (mysql_error());
	if(mysql_num_rows($res)==1){
		while($r=mysql_fetch_array($res)){
			$name=$r['Name'];
			$uname=$r['UserName'];
			$pwd=$r['Password'];
			$stat=$r['Status'];
		}
	}
?>

<?php
	$message = 0;
	$messageinfo = "..Failed";
	if(isset($_POST['changesave'])){
		$name = mysql_real_escape_string(stripslashes($_POST['name']));
		$uname = mysql_real_escape_string(stripslashes($_POST['uname']));
		$cpwd = md5($_POST['cpwd']);
		$query1="SELECT Password FROM tbladmin where AID=$aid";
		$res1=mysql_query($query1) or die (mysql_error());
		$pass="none";
		while($r=mysql_fetch_array($res1)){
			$pass=$r[0];
		}
		if($pass==$cpwd){
			$query="UPDATE tbladmin SET Name = '$name', UserName = '$uname' where AID=$aid and Password='$cpwd'";
			$res=mysql_query($query);
			if($res){
				$message = 1;
			}
			else{
				$messageinfo = "Username already exist!";
			}
		}
		else{
			$messageinfo = "Invalid password!";
		}
	}
	if(isset($_POST['scancel'])){
		header('location:../pages/student_view.php');
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
	<table id="breadcontainer4">
    	<tr>
        	<td id="bread1"><a href="admin_view.php">VIEWING OF ADMIN</a></td>
            <td id="bread2"></td>
        <tr>
    </table>
	<section class='form'>
			<form action="<?php echo"admin_edit.php?aid=$aid"; ?>" method="post" novalidate>
				<fieldset>
					<div class="item">
        			  <p style="float:left; margin-top:7px; color:#737373;">Name</p>
						<label style="margin-left:35px;">
							<input name="name" placeholder="Name" required="required" type="text" value="<?php echo"".$name; ?>" />		
						</label>
					</div>
                    <div class="item">
                     <p style="float:left; margin-top:7px; color:#737373;">UserName</p>
						<label style="margin-left:10px;">
							<input name="uname" placeholder="User Name" required="required" type="text" value="<?php echo"".$uname; ?>"/>		
						</label>
					</div>
                    
                    <div class="item">
                     <p style="float:left; margin-top:7px; color:#737373;">Password</p>
						<label style="margin-left:15px;">
							<input type="password" name="cpwd"  required='required' placeholder="Current Password">
						</label>
					</div>
					
				</fieldset>
                <div id="buttonalignadmin">
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