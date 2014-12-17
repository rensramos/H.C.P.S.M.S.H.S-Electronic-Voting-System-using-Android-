<?php
	include('connect_DB.php');
	include ('../function/generated_Password.php');
	$vid=$_GET['vid'];
	$query="select * from tblvoter where VID='" .$vid ."'";
	$res=mysql_query($query) or die (mysql_error());
	if(mysql_num_rows($res)==1){
		while($r=mysql_fetch_array($res)){
			$fname=$r['FirstName'];
			$mini=$r['MidInitial'];
			$lname=$r['LastName'];
			$uname=$r['UserName'];
			$pwd=$r['Password'];
			$year=$r['GradeYear'];
		}
	}
?>

<?php
	$message = 0;
	if(isset($_POST['ssave'])){
		$fname = mysql_real_escape_string(stripslashes($_POST['fname']));
		$mini = mysql_real_escape_string(str_replace('.','',(stripslashes($_POST['mini']))));
		$lname = mysql_real_escape_string(stripslashes($_POST['lname']));
		$uname = mysql_real_escape_string(stripslashes($_POST['uname']));
		$pwd = generateStrongPassword();
		$year = mysql_real_escape_string(stripslashes($_POST['year']));
		$query="UPDATE tblvoter SET FirstName = '$fname', MidInitial = '$mini', LastName = '$lname',
				UserName = '$uname', Password = '$pwd', GradeYear = '$year' where VID=$vid";
		$res=mysql_query($query);
		if($res){
			$message = 1;
		}
		else{
			$messageinfo = "User ID already exist";
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
	<table id="breadcontainer">
    	<tr>
        	<td id="bread1"><a href="student_view.php">VIEWING OF STUDENTS</a></td>
            <td id="bread2"></td>
        <tr>
    </table>
	<section class='form'>
			<form action="<?php echo"student_edit.php?vid=$vid"; ?>" method="post" novalidate>
				<fieldset>
					<div class="item">
           <p style="float:left; margin-top:7px;  color:#737373; clear:left;">First Name</p>
						<label style="margin-left:15px;">
							<input name="fname" placeholder="First Name" required="required" type="text" value="<?php echo"".$fname; ?>" />		
						</label>
					</div>
                    <div class="item">
                     <p style="float:left;  margin-top:7px;  color:#737373; ">Middle Initial</p>
						<label style="margin-left:7px;">
							<input data-validate-length="1,2" name="mini" placeholder="Middle Initial" required="required" type="text" value="<?php echo"".$mini; ?>"/>		
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
						<label  style="margin-left:15px;">
							<input name="lname" placeholder="Last Name" required="required" type="text" value="<?php echo"".$lname; ?>"/>		
						</label>
						
					</div>
                    <div class="item">
                    <p style="float:left; margin-top:7px; color:#737373;">User ID</p>
						<label style="margin-left:32px;">
							<input name="uname" placeholder="User Name" required="required" type="text" value="<?php echo"".$uname; ?>"/>		
						</label>
					</div>
					
				  <div class="item">
                  <p style="float:left; margin-top:2px; color:#737373; ">Grade Year</p>
						<label style="margin-left:10px;">
							<select class="required" name="year">
								<option value="<?php echo"".$year; ?>"><?php echo"Grade ".$year; ?></option>
								<option value="7">Grade 7</option>
								<option value="8">Grade 8</option>
								<option value="9">Grade 9</option>
							</select>
						</label>
						<div class='tooltip help'>
							<span>?</span>
							<div class='content'>
								<b></b>
								<p class="f">Choose something</p>
							</div>
						</div>
					</div>
				</fieldset>
                <div id="buttonalign">
                <input id="send" type="image" name="ssave" value="Save" src="../photo/save.png"/>
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


