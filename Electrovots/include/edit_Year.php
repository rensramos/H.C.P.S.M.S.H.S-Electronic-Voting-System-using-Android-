<?php
	include('connect_DB.php');
	include('../include/getYear.php');
	$query="select * from tblyearselected where SY='" .$year ."'";
	$res=mysql_query($query) or die (mysql_error());
	if(mysql_num_rows($res)==1){
		while($r=mysql_fetch_array($res)){
			$year2=$r['SY'];
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
			<form action="../pages/changeYear.php" method="post" novalidate>
				<fieldset>
					<div class="item" ></
						<label>
							<select class="required" required="required" name="year" style="padding:10px; text-align:center; font-size:25px; margin-top:30px;">
								<!--<option value="<?php echo $year; ?>"><?php echo $year; ?></option>-->
                                <option value="">--choose --</option>
                                <?php  ?>
                                <option value="2013-2014">2013-2014</option>
								<option value="2014-2015">2014-2015</option>
								<option value="2015-2016">2015-2016</option>
								<option value="2016-2017">2016-2017</option>
                                <option value="2017-2018">2017-2018</option>
                                <option value="2018-2019">2018-2019</option>
                                <option value="2019-2020">2019-2020</option>
                                <option value="2020-2021">2020-2021</option>
                                <option value="2021-2022">2021-2022</option>
                                <option value="2022-2023">2022-2023</option>
                                <option value="2023-2024">2023-2024</option>
							</select>
						</label>
						<div class='tooltip help' style="margin-top:45px;">
							<span>?</span>
							<div class='content'>
								<b></b>
								<p class="f">Change the School Year Election</p>
							</div>
						</div>
					</div>
				</fieldset>
                <div id="buttonalign">
                <input id="send" type="image" name="changesave" value="Save" src="../photo/save.png" onClick="myFunction()"/>
                <!--<input type="image" src="../photo/reset2.png" name="scancel" value="cancel">-->
				</div>
			</form>	
		</section>
	</div>
    <script>
	function myFunction() {
		location.reload();
	}
	</script>
    
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