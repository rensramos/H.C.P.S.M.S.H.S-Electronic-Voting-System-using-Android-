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
			<form action="" method="post" novalidate enctype="multipart/form-data">
				<fieldset>
					<div class="item">
						<label>
							<input data-validate-length-range="6" data-validate-words="2" name="name" placeholder="First Name" required type="text" />		
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
						<label>
							<input type="number" class='number' name="number" data-validate-minmax="10,100" data-validate-pattern="numeric" required='required' placeholder="Number">
						</label>
						<div class='tooltip help'>
							<span>?</span>
							<div class='content'>
								<b></b>
								<p class="f">Number must be between 10 and 100</p>
							</div>
						</div>
					</div>
					<div class="item">
						<label>
							<input class='date' type="date" name="date" required='required' placeholder="Date">
						</label>
					</div>
					<div class="item">
						<label>
							<input type="password" name="password" data-validate-length="6,8" required='required' placeholder="Password">
						</label>
						<div class='tooltip help'>
							<span>?</span>
							<div class='content'>
								<b></b>
								<p class="f">Should be of length 6 OR 8 characters</p>
							</div>
						</div>
					</div>
					<div class="item">
						<label>
							<input type="password" name="password2" data-validate-linked='password' required='required' placeholder="Confirm Password">
						</label>
					</div>
					<div class="item">
						<label>
							<input type="tel" class='tel' name="phone" required='required' data-validate-length-range="8,20" placeholder="Telephone">
						</label>
						<div class='tooltip help'>
							<span>?</span>
							<div class='content'>
								<b></b>
								<p class="f">Notice that for a phone number user can input a '+' sign, a dash '-' or a space ' '</p>
							</div>
						</div>
					</div>
					<div class="item">
						<label>
							<select class="required" name="dropdown">
								<option value="">-- Drop Down Selection --</option>
								<option value="o1">Option 1</option>
								<option value="o2">Option 2</option>
								<option value="o3">Option 3</option>
							</select>
						</label>
						<div class='tooltip help'>
							<span>?</span>
							<div class='content'>
								<b></b>
								<p class="f">Choose something or choose not. what shall it be?</p>
							</div>
						</div>
					</div>
					<div class="item">
						<label>
							<input name="url" placeholder="URL" required type="url" />
						</label>
					</div>
                    <div class="item">
                        	<input name="uploadedimage" type="file"  >	
                    </div>
				</fieldset>
				<button id='send' type='submit' class="btn">Submit</button>
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