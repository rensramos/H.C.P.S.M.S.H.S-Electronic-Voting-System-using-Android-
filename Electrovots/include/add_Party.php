<?php
include ('connect_DB.php');
include('getYear.php');
$message = 0;
$messageinfo = "..Failed!";
if(isset($_POST['pladd'])){
	
	function GetImageExtension($imagetype)
	{
		if(empty($imagetype)) return false;
			switch($imagetype)
			{
			case 'image/bmp': return '.bmp';
			case 'image/gif': return '.gif';
			case 'image/jpeg': return '.jpg';
			case 'image/png': return '.png';
			default: return false;
			}
	}	 
	
	/*if (!empty($_FILES["uploadedimage"]["name"])) {

		$file_name=$_FILES["uploadedimage"]["name"];
		$temp_name=$_FILES["uploadedimage"]["tmp_name"];
		$imgtype=$_FILES["uploadedimage"]["type"];
		$ext= GetImageExtension($imgtype);
		$imagename=date("d-m-Y")."-".time().$ext;
		$target_path = "../photo/PartyList/".$imagename;
	 
		if(move_uploaded_file($temp_name, $target_path)) {
			
			$plname = mysql_real_escape_string(stripslashes($_POST['plname']));
			$plab = mysql_real_escape_string(stripslashes($_POST['plab']));
			$pldesc = mysql_real_escape_string(stripslashes($_POST['pldesc']));
			$photo = $target_path;
			$query="INSERT INTO tblpartylist VALUE ('','$plname','pldesc','$photo','$plab','$year')";
			$res=mysql_query($query);
		}
		else{
			echo mysql_error();
		}
	}
	*/
	$photo = "../photo/PartyList/unknown.png";
	if($_POST['plcolor']=="Red"){
		$photo = "../photo/PartyList/red.png";
	}
	else if($_POST['plcolor']=="Blue"){
		$photo = "../photo/PartyList/blue.png";
	}
	else if($_POST['plcolor']=="Green"){
		$photo = "../photo/PartyList/green.png";
	}
	else if($_POST['plcolor']=="Yellow"){
		$photo = "../photo/PartyList/yellow.png";
	}
	else if($_POST['plcolor']=="Orange"){
		$photo = "../photo/PartyList/orange.png";
	}
	else if($_POST['plcolor']=="Violet"){
		$photo = "../photo/PartyList/violet.png";
	}
	
	$plname = mysql_real_escape_string(stripslashes($_POST['plname']));
	$plab = mysql_real_escape_string(stripslashes($_POST['plab']));
	$pldesc = mysql_real_escape_string(stripslashes($_POST['pldesc']));
	$query="INSERT INTO tblpartylist VALUE ('','$plname','$pldesc','$photo','$plab','$year')";
	$res=mysql_query($query);
	if($res){
		$message = 1;
	}
	else{
		$messageinfo = "PartyList name already exist!";
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
			<form action="../pages/partylist_add.php" method="post" novalidate enctype="multipart/form-data">
				<fieldset>
					<div class="item">
                      <p style="float:left; margin-top:7px;  color:#737373;;">Name</p>
						<label style="margin-left:48px;">
							<input name="plname" placeholder="Party List Name" required="required" type="text" />		
						</label>
					</div>
                    <div class="item">
                      <p style="float:left; margin-top:7px;  color:#737373;;">Abbreviation</p>
						<label style="margin-left:12px;">
							<input name="plab" placeholder="Party List Abbreviation" required="required" type="text" />		
						</label>
					</div>
                    <div class="item" >
                      <p style="float:left; margin-top:7px;  color:#737373;;">Description</p>
						<label style="margin-left:17px;">
							<input name="pldesc" placeholder="Party List Description" required="required" type="text" />		
						</label>
					</div>
                    <div class="item">
                      <p style="float:left; margin-top:5px;  color:#737373;;">Color</p>
						<label style="margin-left:47px;">
							<select class="required" name="plcolor">
								<option value="">-- Choose Party List Color --</option>
                                <option value="Red">Red</option>
                                <option value="Blue">Blue</option>
                                <option value="Green">Green</option>
                                <option value="Yellow">Yellow</option>
                                <option value="Orange">Orange</option>
                                <option value="Violet">Violet</option>
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
                <input type="image" src="../photo/add.png" name="pladd" value="Add">
                <!-- <input type="image" src="../photo/reset2.png" name="plreset" value="reset"> -->
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

