<!DOCTYPE html>
<html>
<title>jQuery notiJ Demos</title>
<link href="notiJ.css" rel="stylesheet" type="text/css" />
<script src="notij.min.js"></script>
<script type="text/javascript" src="notiJ.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#btn_clk').click(function(){
		$.notij('jQueryScript.net - Free jQuery Plugins',{'type':'error'});
	});

	$('#btn_clk1').click(function(){
		$.notij('jQuery notiJ Demos',{'type':'info'});

	});

	$('#btn_clk2').click(function(){
		$('p').notij();

	});
});
</script>
<head>

</head>
<body>

<button id="btn_clk1">Error messages</button>
<button id="btn_clk">Information</button>
<button id="btn_clk2">Normal messages</button>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
.

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>