    <!-- Attach necessary scripts -->
    <script type="text/javascript" src="../javascript/jquery.min.js"></script>
    <!-- script for up scroll button -->
    <script>      
	$(document).ready(function(){

	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 200) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 1500);
			return false;
			});
		});

	});
	</script>
     <!-- End of our CSS -->
     
     <!----In Body ---->
    <p id="back-top">
    <a href="#top"><span></span></a>
	</p>