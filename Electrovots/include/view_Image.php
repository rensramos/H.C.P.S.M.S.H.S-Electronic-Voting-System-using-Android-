<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="../css/modal/modal.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" language="javascript" src="../javascript/modal/modal.js"></script>
</head>

<body>
	<section class="modal--show" id="modal-show" tabindex="-1" role="dialog" aria-labelledby="label-show" aria-hidden="true">
		<div class='modal-inner'>
            <div class='modal-content'>
              <img style='margin: 0 auto;' src="<?php $var=$_GET['id']; echo "$var"; ?>" height='300px' />
            </div>
        </div>
		<a href='#!' class='modal-close' title='Close this modal' data-dismiss='modal' data-close='Close' /> 
	</section>
</body>
</html>