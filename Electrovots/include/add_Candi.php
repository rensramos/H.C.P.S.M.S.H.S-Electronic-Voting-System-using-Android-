<?php
include ('connect_DB.php');
include('getYear.php');
$message = 0;
$messageinfo = "..Failed";
if(isset($_POST['cadd'])){
	
	//for sticky forms
	$one = mysql_real_escape_string(stripslashes($_POST['fname']));
	$two = mysql_real_escape_string(str_replace('.','',stripslashes($_POST['mini'])));
	$three = mysql_real_escape_string(stripslashes($_POST['lname']));
	$four = $_POST['posid'];
	$five = $_POST['plid'];
	
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
	
	//for Candidates that does not register as a voter
	$registeredvoter=false;
	$query10="Select * from tblvoter where FirstName='$one' and MidInitial='$two' and LastName='$three'";
	$res10=mysql_query($query10);
	if(mysql_affected_rows()>0){
		$registeredvoter=true;
	}
	else{
		$messageinfo = "Not registered as student!";
	}
	
	//for duplicating position per partylist
	$position = $_POST['posid'];
	$partylist = $_POST['plid'];
	$noduplicate = false;
	$query0="select p.plnameab,group_concat(c.positionid) as col2 from tblpartylist p,tblcandidate c where p.plid=c.partylistid and c.partylistid = '$partylist' group by plname having col2 like '%$position%'";
	$res0=mysql_query($query0);
	if(mysql_affected_rows()==0){
		$noduplicate = true;
	}
	else{
		$messageinfo = "Duplicate of position!";
	}
		 
	if($noduplicate && $registeredvoter){
		
		if (!empty($_FILES["uploadedimage"]["name"])) {
	
			$file_name=$_FILES["uploadedimage"]["name"];
			$temp_name=$_FILES["uploadedimage"]["tmp_name"];
			$imgtype=$_FILES["uploadedimage"]["type"];
			$ext= GetImageExtension($imgtype);
			$imagename=date("d-m-Y")."-".time().$ext;
			$target_path = "../photo/Candidates/".$imagename;
		 
			if(move_uploaded_file($temp_name, $target_path)) {
				
				$fname = mysql_real_escape_string(stripslashes($_POST['fname']));
				$mini = mysql_real_escape_string((str_replace('.','',stripslashes($_POST['mini']))));
				$lname = mysql_real_escape_string(stripslashes($_POST['lname']));
				$posid = mysql_real_escape_string(stripslashes($_POST['posid']));
				$plid = mysql_real_escape_string(stripslashes($_POST['plid']));
				$photo = $target_path;
				$query="INSERT INTO tblcandidate VALUE ('','$fname','$mini','$lname','$posid','$plid','$photo','$year')";
				$res=mysql_query($query) or die(mysql_error());
				if($res){
					$message = 1;
				}
				else{
					echo mysql_error();
				}
			}
			else{
				echo mysql_error();
			}
		}
		else{
			$fname = mysql_real_escape_string(stripslashes($_POST['fname']));
			$mini = mysql_real_escape_string(str_replace('.','',(stripslashes($_POST['mini']))));
			$lname = mysql_real_escape_string(stripslashes($_POST['lname']));
			$posid = mysql_real_escape_string(stripslashes($_POST['posid']));
			$plid = mysql_real_escape_string(stripslashes($_POST['plid']));
			$photo = "../photo/Candidates/Unknown.jpg";
			$query="INSERT INTO tblcandidate VALUE ('','$fname','$mini','$lname','$posid','$plid','$photo','$year')";
			$res=mysql_query($query) or die(mysql_error());
			if($res){
				$message = 1;
			}
			else{
					echo mysql_error();
				}	
		}
	}
}

if(isset($_POST['creset'])){
	$page = $_SERVER['PHP_SELF'];
	header("Refresh: 0; url=$page");
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
			<form action="../pages/candidate_add.php" method="post" novalidate enctype="multipart/form-data">
				<fieldset>
					<div class="item">
                     <p style="float:left; margin-top:7px; color:#737373;">First Name</p>
						<label style="margin-left:18px;">
							<input name="fname" placeholder="First Name" required="required" type="text" 
							<?php if(!empty($_POST) && $noduplicate==false){echo "value='$one'";} ?>/>		
						</label>
					</div>
                    
                    <div class="item">
                     <p style="float:left; margin-top:7px; color:#737373;">Middle Initial</p>
						<label style="margin-left:9px;">
							<input data-validate-length="1,2" name="mini" placeholder="Middle Initial" required="required"
                            type="text" <?php if(!empty($_POST) && $noduplicate==false){echo "value='$two'";} ?> />		
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
						<label style="margin-left:17px;">
							<input name="lname" placeholder="Last Name" required="required" type="text" 
							<?php if(!empty($_POST) && $noduplicate==false){echo "value='$three'";} ?> />		
						</label>
						
					</div>
                     <div class="item">
                      <p style="float:left; margin-top:2px; color:#737373;">Position</p>
						<label style="margin-left:31px;">
							<select class="required" name="posid" >
								<option value="<?php if(!empty($_POST) && $noduplicate==false){echo $four;}else{echo" ";}?>">
								<?php if(!empty($_POST) && $noduplicate==false){
									$query="SELECT PositionName FROM tblposition WHERE PID='$four'";
									$res=mysql_query($query) or die (mysql_error());
										while($r=mysql_fetch_array($res)){
											echo $r[0];
										}
									}
									else{echo"-- Choose Position --";} ?>
                                </option>
                                <?php
								/*
									$query="SELECT * from tblposition order by pid";
									$res=mysql_query($query) or die (mysql_error());
									while($r=mysql_fetch_array($res)){
										echo"<option value=".$r['PID']."> ".$r['PositionName']."</option>";
									}
								*/
								?>
                                <option value="0">President</option>
                                <option value="1">Vice-President</option>
                                <option value="2">Secretary</option>
                                <option value="3">Treasurer</option>
                                <option value="4">Auditor</option>
                                <option value="5">PIO</option>
                                <option value="6">Peace Officer</option>
                                <option value="7">Grade 8 Representative</option>
                                <option value="8">Grade 9 Representative</option>
                                <option value="9">Grade 10 Representative</option>
                                
							</select>
						</label>
                     
						<div class='tooltip help'>
						<span>?</span>
							<div class='content'>
								<b></b>
								
							</div>
						</div>
					</div>
                    
					<div class="item">
                     <p style="float:left; margin-top:2px; color:#737373;">Party List</p>
						<label style="margin-left:22px;">
							<select class="required" name="plid">
								<option value="<?php if(!empty($_POST) && $noduplicate==false){echo $five;}else{echo" ";}?>">
								<?php if(!empty($_POST) && $noduplicate==false){
									$query="SELECT PLNameAb FROM tblpartylist WHERE PLID='$five'";
									$res=mysql_query($query) or die (mysql_error());
										while($r=mysql_fetch_array($res)){
											echo $r[0];
										}
									}
									else{echo"-- Choose Party List --";} 
								?></option>
                                <?php
								
									$query="SELECT * from tblpartylist";
									$res=mysql_query($query) or die (mysql_error());
									while($r=mysql_fetch_array($res)){
										echo"<option value=".$r['PLID']."> ".$r['PLNameAb']."</option>";
									}
								?>
                                <option value=0>NONE</option>
							</select>
						</label>
						<div class='tooltip help'>
							<span>?</span>
							<div class='content'>
								<b></b>
								
							</div>
						</div>
					</div>
                    
                    <div class="item">
                     <p style="float:left; margin-top:7px; color:#737373;">Picture</p>
                     <label style="margin-left:32px;">
                        	<input name="uploadedimage" type="file"  >	
                     </label>
                    </div>
				</fieldset>   
                <div id="buttonalign">
                <input type="image" src="../photo/add.png" name="cadd" value="Add">
               	<!-- <input type="image" src="../photo/reset2.png" name="creset" value="reset" onClick=""> -->
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

