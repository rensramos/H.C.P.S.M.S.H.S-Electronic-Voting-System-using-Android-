<?php
	include('connect_DB.php');
	$plid=$_GET['plid'];
	$query="SELECT PLName,
			PLNameAb,
			Description,
			Logo
			from tblpartylist c where PLID='" .$plid ."'";
			$res=mysql_query($query) or die (mysql_error());
	if(mysql_num_rows($res)==1){
		while($r=mysql_fetch_array($res)){
			$name=$r['0'];
			$nameab=$r['1'];
			$desc=$r['2'];
			$photo=$r['3'];
		}
	}
?>

<?php
	$message = 0;
	if(isset($_POST['plsave'])){
		
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
			$target_path = "../photo/Candidates/".$imagename;
		 
			if(move_uploaded_file($temp_name, $target_path)) {
			
			$name = mysql_real_escape_string(stripslashes($_POST['plname']));
			$nameab = mysql_real_escape_string(stripslashes($_POST['plab']));
			$desc = mysql_real_escape_string(stripslashes($_POST['pldesc']));
			$photo = $target_path;

			$query="UPDATE tblpartylist SET PLName = '$name', PLNameAb = '$nameab', Description = '$desc', 
					Photo = '$photo' where PLID=$plid";
			$res=mysql_query($query) or die (mysql_error());
			header('location:../pages/partylist_view.php');
			}
			else{
				echo mysql_error();
			}
		}*/

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
		
		$name = mysql_real_escape_string(stripslashes($_POST['plname']));
		$nameab = mysql_real_escape_string(stripslashes($_POST['plab']));
		$desc = mysql_real_escape_string(stripslashes($_POST['pldesc']));
		$query="UPDATE tblpartylist SET PLName = '$name', PLNameAb = '$nameab', Description = '$desc', Logo = '$photo' where PLID=$plid";
		$res=mysql_query($query) or die (mysql_error());
		if($res){
			$message = 1;
		}

	}
	if(isset($_POST['plcancel'])){
		header('location:../pages/partylist_view.php');
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
    	<table id="breadcontainer2">
          <tr>
        	<td id="bread1"><a href="partylist_view.php">VIEWING OF PARTYLIST</a></td>
            <td id="bread2"></td>
         <tr>
        </table>
		<section class='form'>
			<form action="<?php echo"partylist_edit.php?plid=$plid"; ?>" method="post"  novalidate enctype="multipart/form-data">
				<fieldset>
					<div class="item">
                     <p style="float:left; margin-top:7px;  color:#737373;;">Name</p>
						<label style="margin-left:48px;">
							<input name="plname" placeholder="Party List Name" required="requred" type="text" value="<?php echo"".$name; ?>" />		
						</label>
					</div>
                    <div class="item">
                     <p style="float:left; margin-top:7px;  color:#737373;;">Abbreviation</p>
						<label style="margin-left:12px;">
							<input name="plab" placeholder="Party List Abbreviation" required="requred" type="text" value="<?php echo"".$nameab; ?>" />		
						</label>
					</div>
                    <div class="item">
                     <p style="float:left; margin-top:7px;  color:#737373;;">Description</p>
						<label style="margin-left:15px;">
							<input name="pldesc" placeholder="Party List Description" required="requred" type="text" value="<?php echo"".$desc; ?>" />		
						</label>
					</div>
                    <div class="item">
                     <p style="float:left; margin-top:5px;  color:#737373;;">Color</p>
						<label style="margin-left:47px;">
							<select class="required" name="plcolor">
                            	<?php
									$value = "None";
									if($photo=="../photo/PartyList/red.png"){
										$value = "Red";
									}
									else if($photo=="../photo/PartyList/blue.png"){
										$value = "Blue";
									}
									else if($photo=="../photo/PartyList/green.png"){
										$value = "Green";
									}
									else if($photo=="../photo/PartyList/yellow.png"){
										$value = "Yellow";
									}
									else if($photo=="../photo/PartyList/orange.png"){
										$value = "Orange";
									}
									else if($photo=="../photo/PartyList/violet.png"){
										$value = "Violet";
									}
								?>
                                <option value="<?php echo"".$value; ?>"><?php echo"".$value; ?></option>
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
                <input type="image" src="../photo/save.png" name="plsave" value="Save">
                <!-- <input type="image" src="../photo/reset2.png" name="plcancel" value="cancel"> -->
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

