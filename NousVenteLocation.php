<?php
session_start();						
require "cnx.php";
?>
<!DOCTYPE html>

<!-- Mirrored from www.vasterad.com/themes/findeo/listings-grid-standard-with-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Apr 2017 16:22:35 GMT -->
<head>

<!-- Basic Page Needs
================================================== -->
<title>Test Filtre</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/main.css" id="colors">

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
<!-- Header Container / End -->



<!-- Titlebar
================================================== -->
<div class="parallax titlebar"
	data-background="images/listings-parallax.jpg"
	data-color="#333333"
	data-color-opacity="0.7"
	data-img-width="800"
	data-img-height="505">

	<div id="titlebar">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<h2>Listes</h2>
					<span></span>
					
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">accueil</a></li>
							<li>Listes</li>
						</ul>
					</nav>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- Content
================================================== -->
<div class="container">
	<div class="row fullwidth-layout">

		<div class="col-md-12">

			<!-- Sorting / Layout Switcher 
			<div class="row margin-bottom-15">

				<div class="col-md-6">

				</div>

				<div class="col-md-6">-->
					<!-- Layout Switcher 
					<div class="layout-switcher">
						<a href="#" class="list"><i class="fa fa-th-list"></i></a>
						<a href="#" class="grid"><i class="fa fa-th-large"></i></a>
						<a href="#" class="grid-three"><i class="fa fa-th"></i></a>
					</div>
				</div>
			</div>-->

			
			<!-- Listings -->
			<div class="listings-container list-layout">

				<!-- Listing Item -->

				<?php
				//SELECT * from annonces,photos WHERE annonces.id_annonce=photos.id_annonce and annonces.type_bien='villa' and annonces.type_offre='Location' and annonces.ville='tiznit'
				//select * from annonces where type_offre='.$type_offre.' and type_bien='.$type_bien.' and ville='.$ville.'
					$type_offre=$_GET['offre'];
					$type_bien=$_GET['typeBien'];
					

					$query = mysqli_query($success,"SELECT * from annonces WHERE annonces.type_bien='$type_bien' and annonces.type_offre='$type_offre' and valider=1");
					

					while($myrow1 = mysqli_fetch_array($query)) {
				echo '<div class="listing-item">

					<a href="single-property-page-1.html" class="listing-img-container">

						<div class="listing-badges">
							<span class="featured">'.htmlspecialchars($myrow1['type_offre']).'</span>
							
						</div>

						<div class="listing-img-content">
							<span class="listing-price">'.htmlspecialchars($myrow1['prix']).'DHs<i>'.htmlspecialchars($myrow1['surface']).' m2</i></span>
							<span class="like-icon tooltip"></span>
						</div>
						<div class="listing-carousel">';
						$id_annonce=$myrow1['id_annonce'];
						$qry = mysqli_query($success,"select * from photos where id_annonce=$id_annonce");
						
						while($myrow2 = mysqli_fetch_array($qry)){
										# code...
						echo '<div><img src="uploads/'.htmlspecialchars($myrow2['photo']).'" alt=""></div>';
									}

						echo '</div>
					</a>
					
					<div class="listing-content">

						<div class="listing-title">
							<h4><a href="single-property-page-1.html">'.htmlspecialchars($myrow1['titre']).' ,'.htmlspecialchars($myrow1['type_bien']).'</a></h4>
							<a href="">
								<i class="fa fa-map-marker"></i>
								'.htmlspecialchars($myrow1['adresse']).' ,'.htmlspecialchars($myrow1['ville']).'
							</a>

							<a href="detaille.php?id_annonce='.$myrow1['id_annonce'].'" class="details button border">Details</a>
						</div>	

					</div>

				</div>';
				}
				?>
				<!-- Listing Item / End -->

			</div>
			<!-- Listings Container / End -->

			<div class="clearfix"></div>
			<!-- Pagination -->
			<div class="pagination-container margin-top-20">
				<nav class="pagination">
					<ul>
						<li><a href="#" class="current-page">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li class="blank">...</li>
						<li><a href="#">22</a></li>
					</ul>
				</nav>

				<nav class="pagination-next-prev">
					<ul>
						<li><a href="#" class="prev">Previous</a></li>
						<li><a href="#" class="next">Next</a></li>
					</ul>
				</nav>
			</div>
			<!-- Pagination / End -->

		</div>

	</div>
</div>



<!-- Footer
================================================== -->
<div id="footer">
	<!-- Main -->
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-6">
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


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>


<!-- Scripts
================================================== -->
<script type="text/javascript" src="scripts/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="scripts/chosen.min.js"></script>
<script type="text/javascript" src="scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="scripts/owl.carousel.min.js"></script>
<script type="text/javascript" src="scripts/rangeSlider.js"></script>
<script type="text/javascript" src="scripts/sticky-kit.min.js"></script>
<script type="text/javascript" src="scripts/slick.min.js"></script>
<script type="text/javascript" src="scripts/jquery.jpanelmenu.js"></script>
<script type="text/javascript" src="scripts/tooltips.min.js"></script>
<script type="text/javascript" src="scripts/masonry.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>


<!-- Style Switcher
================================================== -->
<script src="scripts/switcher.js"></script>

<div id="style-switcher">
	<h2>Color Switcher <a href="#"><i class="sl sl-icon-settings"></i></a></h2>
	
	<div>
		<ul class="colors" id="color1">
			<li><a href="#" class="blue" title="Blue"></a></li>
			<li><a href="#" class="green" title="Green"></a></li>
			<li><a href="#" class="orange" title="Orange"></a></li>
			<li><a href="#" class="navy" title="Navy"></a></li>
			<li><a href="#" class="yellow" title="Yellow"></a></li>
			<li><a href="#" class="peach" title="Peach"></a></li>
			<li><a href="#" class="beige" title="Beige"></a></li>
			<li><a href="#" class="purple" title="Purple"></a></li>
			<li><a href="#" class="celadon" title="Celadon"></a></li>
			<li><a href="#" class="pink" title="Pink"></a></li>
			<li><a href="#" class="red" title="Red"></a></li>
			<li><a href="#" class="brown" title="Brown"></a></li>
			<li><a href="#" class="cherry" title="Cherry"></a></li>
			<li><a href="#" class="cyan" title="Cyan"></a></li>
			<li><a href="#" class="gray" title="Gray"></a></li>
			<li><a href="#" class="olive" title="Olive"></a></li>
		</ul>
	</div>
		
</div>
<!-- Style Switcher / End -->


</div>
<!-- Wrapper / End -->


</body>

<!-- Mirrored from www.vasterad.com/themes/findeo/listings-grid-standard-with-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Apr 2017 16:22:35 GMT -->
</html>