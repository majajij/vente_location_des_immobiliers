<?php
session_start();
require "cnx.php";

?>
<!DOCTYPE html>

<!-- Mirrored from www.vasterad.com/themes/findeo/submit-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Apr 2017 16:23:08 GMT -->

<head>

<!-- Basic Page Needs
================================================== -->
<title>Gallery</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/main.css" id="colors">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap-fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
</head>

<body>

<!-- Wrapper -->
<div id="wrapper">


<!-- Header Container
================================================== -->
    <header id="header-container">

        <?php include "header.php"; ?>

    </header>
<div class="clearfix"></div>


<!-- Header Container
================================================== -->
<!-- Titlebar
================================================== -->
<div id="titlebar" class="submit-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2><i class="fa fa-plus-circle"></i> Gallery </h2>
			</div>
		</div>
	</div>
</div>




<!-- Content
================================================== -->



<form name="my-form" method="POST" action="gallery.php">
<div class="container">
<div class="row">
	

	<!-- Submit Page -->

		<div class="submit-section">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		
			<div>
				<input id="upload_input" multiple name="fichier" type="file"  class="file-input" >
	    		<div id="kv-error-1" style="margin-top:10px;display:none"></div>
	    		<div id="kv-success-1" class="alert alert-success fade in" style="margin-top:10px;display:none"></div>
    		</div>
		</div>

			<!--<form action="http://www.vasterad.com/file-upload" class="dropzone" ></form>-->
		</div>
			


</div>
</div>
</form>
<br><br><br>
<div class="container">
<div class="row">
			<a href="terminer_photo.php" class="button preview margin-top-5" >Terminer</a>
		</div></div>
	<br><br><br><br><br><br>	
<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>
<!-- Footer
================================================== -->
<div id="footer">
	<!-- Main -->
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-6" id="contact">
				<img class="footer-logo" src="images/logo-maf.png" alt="">
				<br><br>
				<p>Nous sommes très heureux de vous avoir dans notre Site. Bienvenue dans immobilier.</p>
			</div>

<!--

			<div class="col-md-4 col-sm-6 ">
				<h4>Helpful Links</h4>
				<ul class="footer-links">
					<li><a href="#">Login</a></li>
					<li><a href="#">Sign Up</a></li>
					<li><a href="#">My Account</a></li>
					<li><a href="#">Add Property</a></li>
				</ul>

				<ul class="footer-links">
					
					<li><a href="#">Contact</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>

-->

			<div class="col-md-3  col-sm-12">
				<h4>Contacter nous</h4>
				<div class="text-widget">
					<span> 18 Rue marrakech, Tiznit </span> <br>
					Phone: <span> (212) 675 348 503 </span><br>
					Email: immobilier@gmail.com
					
<!--
					E-Mail:<span> <a href="#"><span class="__cf_email__" data-cfemail="6e010808070d0b2e0b160f031e020b400d0103">[email&#160;protected]</span><script data-cfhash='f9e31' type="text/javascript">/* <![CDATA[ */!function(t,e,r,n,c,a,p){try{t=document.currentScript||function(){for(t=document.getElementsByTagName('script'),e=t.length;e--;)if(t[e].getAttribute('data-cfhash'))return t[e]}();if(t&&(c=t.previousSibling)){p=t.parentNode;if(a=c.getAttribute('data-cfemail')){for(e='',r='0x'+a.substr(0,2)|0,n=2;a.length-n;n+=2)e+='%'+('0'+('0x'+a.substr(n,2)^r).toString(16)).slice(-2);p.replaceChild(document.createTextNode(decodeURIComponent(e)),c)}p.removeChild(t)}}catch(u){}}()/* ]]> */</script></a> </span><br>

					-->
				</div>

				<ul class="social-icons margin-top-20">
					<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
					<li><a class="vimeo" href="#"><i class="icon-vimeo"></i></a></li>
				</ul>

			</div>

		</div>

		
		<!-- Copyright -->


		<div class="row">
			<div class="col-md-12">
			
				<div class="copyrights"><?php
					date_default_timezone_set('GMT');
					setlocale(LC_TIME,'fr');
					
					$d=date("Y-m-d H:i:s");
					echo '<br>'.gmstrftime ("%A %d %b %Y",strtotime("$d"));
				  ?></div>
			</div>
		</div>


	</div>

</div>
<!-- Footer / End -->

<!-- Scripts
================================================== -->
<script type="text/javascript" src="scripts/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="scripts/chosen.min.js"></script>
<script type="text/javascript" src="scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="scripts/owl.carousel.min.js"></script>
<script type="text/javascript" src="scripts/rangeSlider.js"></script>
<script type="text/javascript" src="scripts/sticky-kit.min.js"></script>
<script type="text/javascript" src="scripts/slick.min.js"></script>
<script type="text/javascript" src="scripts/masonry.min.js"></script>
<script type="text/javascript" src="scripts/jquery.jpanelmenu.js"></script>
<script type="text/javascript" src="scripts/tooltips.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>


<!-- DropZone | Documentation: http://dropzonejs.com -->
<script type="text/javascript" src="scripts/dropzone.js"></script>
<script>
	$(".dropzone").dropzone({
		dictDefaultMessage: "<i class='sl sl-icon-plus'></i> Click here or drop files to upload",
	});
</script>



		<!-- photos scripte -->
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="bootstrap-fileinput/js/fileinput.js" type="text/javascript"></script>
        <script src="bootstrap-fileinput/js/fileinput_locale_fr.js" type="text/javascript"></script>
        <script src="bootstrap-fileinput/js/fileinput_locale_es.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
		<script> 
			jQuery(document).ready(function() {
				Main.init();
			});
			
			$("#upload_input").fileinput({
			    uploadUrl: "upload_file.php", // server upload action
			    uploadAsync: true,
			    maxFileCount: 4,
			    language:"fr",
			    elErrorContainer: '#kv-error-1'
			}).on('fileuploaded', function(event, data, id, index) {
				out = '<li>' +data.response['msg'] +'</li>';
				
				if(data.response['success']){

					$('#kv-success-1 ').append(out);
					$('#kv-success-1').fadeIn('slow');
				}
				else{

					$('#kv-error-1 ').append(out);
					$('#kv-error-1').fadeIn('slow');
				}
			});

		</script>


</div>
<!-- Wrapper / End -->


</body>

<!-- Mirrored from www.vasterad.com/themes/findeo/submit-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Apr 2017 16:23:09 GMT -->
</html>