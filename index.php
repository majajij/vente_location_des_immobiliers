<?php
session_start();						
require "cnx.php";
?>
<!DOCTYPE html>

<!-- Mirrored from www.vasterad.com/themes/findeo/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Apr 2017 16:22:13 GMT -->
<head>

<!-- Basic Page Needs
================================================== -->
<title>immobilier</title>
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


<!-- Map
================================================== -->
<div id="map-container" class="homepage-map margin-bottom-0">

   
	<!-- Main Search Container -->
	<div class="main-search-container">

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					
					<!-- Trigger Button -->
					<a href="#" class="adv-search-btn button">recherche avancée<i class="fa fa-caret-up"></i></a>

					<!-- Main Search -->
					<form class="main-search-form" method="POST" action="testfilter.php">
						
						<!-- Type -->
						<div class="search-type" style="display: none;">
							<label class="active"><input class="first-tab" name="tab" checked="checked" type="radio">type d'offre</label>
							<label><input name="tab" type="radio">achat</label>
							<label><input name="tab" type="radio">location</label>
							<div class="search-type-arrow"></div>
						</div>

						
						<!-- Box -->
						<div class="main-search-box">
							
						<!-- Row With Forms -->
							<div class="row with-forms">

								<!-- Status -->
								<div class="col-md-3 col-sm-6">
									<select  name="type_offre"  data-placeholder="type d'offre" class="chosen-select-no-single" >
										<option></option>	
										<option>Vente</option>
										<option>Location</option>
									</select>
								</div>

								<!-- Property Type -->
								<div class="col-md-3 col-sm-6">
									<select name="type_bien" data-placeholder="type du bien" class="chosen-select-no-single" >
										<option></option>	
										<option>Appartement</option>
										<option>villa</option>
										<option>Commercial</option>
										<option>Garage</option>
									</select>
								</div>
								<!-- localisation -->
								<div class="col-md-3 col-sm-6">

								</div>
								<!-- Main Search Input -->
								<div class="col-md-6">
									<div class="main-search-input">
									<select name="ville" data-placeholder="ville" class="chosen-select-no-single" >
										<option></option>	
										<option>Rabat</option>
										<option>Ouarzazate</option>
										<option>tiznit</option>
										<option>agadir</option>
										<option>marrakech</option>
									</select>
								<button name="recherche" class="button">rechercher</button>

									</div>
								</div>
							</div>
							<!-- Row With Forms / End -->
						</div>
						<!-- Box / End -->

					</form>
					<!-- Main Search -->

				</div>
			</div>
		</div>
	</div>
	<!-- Main Search Container / End -->

</div>

		
<!-- Content
================================================== -->
<div class="container">
	<div class="row">
	
		<div class="col-md-12" id="achat">
			<h3 class="headline margin-bottom-25 margin-top-60">Achat</h3>
		</div>
		
		<!-- Carousel -->
		<div class="col-md-12">
			<div class="carousel">				
				<!-- Listing Item -->
				<?php 	
			        /*mysql_connect("localhost","root","123456789");
					mysql_select_db('immobilier'); */ 
			      
			       	$query = mysqli_query($success,"select * from annonces where type_offre='vente' and valider=1");
			        if (!$query) { 
			            echo "Problem with query " . $query . "<br/>"; 
			            echo mysqli_error();
			            exit(); 
			        } 
			        while($myrow1 = mysqli_fetch_assoc($query)) {
			        	echo '	
			        	<div class="carousel-item">
							<div class="listing-item">
								<a href="detaille.php?id_annonce='.$myrow1['id_annonce'].'" class="listing-img-container">
									<div class="listing-badges">
										<span class="featured">'.htmlspecialchars($myrow1['type_offre']).'</span>
									</div>
									<div class="listing-img-content">
										<span class="listing-price">'.htmlspecialchars($myrow1['prix']).'DHs<i>'.htmlspecialchars($myrow1['surface']).' m2</i></span>
										<span class="like-icon tooltip"></span>
									</div>
									<div class="listing-carousel">	';
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
										<h4><a href="single-property-page-1.html"> '.htmlspecialchars($myrow1['titre']).' ,'.htmlspecialchars($myrow1['type_bien']).'</a></h4>
										<a href="">
										<i class="fa fa-map-marker"></i>
										'.htmlspecialchars($myrow1['adresse']).' ,'.htmlspecialchars($myrow1['ville']).'
										</a>
									</div>
								</div>
							</div>
						</div>';   
			        } 
			    ?>
				<!-- Listing Item / End -->
			</div>
		</div>
		<!-- Carousel / End -->

	</div>
</div>


<!-- For Rent -->
<section class="fullwidth margin-top-55 padding-top-65 padding-bottom-55" data-background-color="#f9f9f9">
<div class="container">

	<div class="row">
	
		<div class="col-md-12" id="location">
			<h3 class="headline margin-bottom-25 margin-top-0">Location</h3>
		</div>
		
		<!-- Carousel -->
		<div class="col-md-12">
			<div class="carousel">


				<!-- Listing Item -->
				<?php 	
			        /*mysql_connect("localhost","root","123456789");
					mysql_select_db('immobilier');  */
			      
			       	$query = mysqli_query($success,"select * from annonces where type_offre='location' and valider=1");
			        if (!$query) { 
			            echo "Problem with query " . $query . "<br/>"; 
			            echo mysqli_error();
			            exit(); 
			        } 
			        while($myrow1 = mysqli_fetch_assoc($query)) {
			        	echo '	
			        	<div class="carousel-item">
							<div class="listing-item">
								<a href="detaille.php?id_annonce='.$myrow1['id_annonce'].'" class="listing-img-container">
									<div class="listing-badges">
										<span class="featured">'.htmlspecialchars($myrow1['type_offre']).'</span>
									</div>
									<div class="listing-img-content">
										<span class="listing-price">'.htmlspecialchars($myrow1['prix']).'DHs<i>'.htmlspecialchars($myrow1['surface']).' m2</i></span>
										<span class="like-icon tooltip"></span>
									</div>
									<div class="listing-carousel">	';
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
										<h4><a href="single-property-page-1.html"> '.htmlspecialchars($myrow1['titre']).' ,'.htmlspecialchars($myrow1['type_bien']).'</a></h4>
										<a href="">
										<i class="fa fa-map-marker"></i>
										'.htmlspecialchars($myrow1['adresse']).' ,'.htmlspecialchars($myrow1['ville']).'
										</a>
									</div>
								</div>
							</div>
						</div>';   
			        } 
			    ?>
				<!-- Listing Item / End -->
			</div>
		</div>
		<!-- Carousel / End -->

	</div>
</div>
</section>


<!-- Container -->

<!-- Container / End -->
<div class="parallax margin-top-0 margin-bottom-40"
	data-background="images/listings-parallax.jpg"
	data-color="#252529"
	data-color-opacity="0.85"
	data-img-width="800"
	data-img-height="505">

	<!-- Counters -->
	<div id="counters">
		<div class="container">

			<div class="row">

				<div class="counter-boxes-inside-parallax">
				<?php 
			      
			       	$query = mysqli_query($success,"SELECT COUNT(*) as 'nbrannonce' from annonces");
			        if (!$query) { 
			            echo "Problem with query " . $query . "<br/>"; 
			            echo mysqli_error();
			            exit(); 
			        } 
			        while($myrow1 = mysqli_fetch_assoc($query)) {
					 echo '<div class="col-md-3 col-sm-6">
						<div class="counter-box">
							<div class="counter-box-icon">
								<span class="counter">'.htmlspecialchars($myrow1['nbrannonce']).'</span>
								<p>Tous les annonces</p>
							</div>
						</div>
					</div>';
				}
				$query = mysqli_query($success,"SELECT COUNT(*) as 'nbrlocation' from annonces where type_offre='location'");
			        if (!$query) { 
			            echo "Problem with query " . $query . "<br/>"; 
			            echo mysqli_error();
			            exit(); 
			        } 
			         while($myrow1 = mysqli_fetch_assoc($query)) {

					echo '<div class="col-md-3 col-sm-6">
						<div class="counter-box">
							<div class="counter-box-icon">
								<span class="counter">'.htmlspecialchars($myrow1['nbrlocation']).'</span>
								<p>Listes des location</p>
							</div>
						</div>
					</div>';
				}

				$query = mysqli_query($success,"SELECT COUNT(*) as 'nbrvente' from annonces where type_offre='vente'");
			        if (!$query) { 
			            echo "Problem with query " . $query . "<br/>"; 
			            echo mysqli_error();
			            exit(); 
			        } 
			         while($myrow1 = mysqli_fetch_assoc($query)) {
				
					echo '<div class="col-md-3 col-sm-6">
						<div class="counter-box">
							<div class="counter-box-icon">
								<span class="counter">'.htmlspecialchars($myrow1['nbrvente']).'</span>
								<p>listes des ventes</p>
							</div>
						</div>
					</div>';
				}
					//hadchi dial nombre visiteur f wa7ed lfichier

					$fp=fopen("visiteurs.txt","r+");
					$nb_visites=fgets($fp,10);
					$nb_visites=$nb_visites+1;

					fseek($fp,0);
					fputs($fp,$nb_visites);
					fclose($fp);

					echo '<div class="col-md-3 col-sm-6">
						<div class="counter-box last">
							<div class="counter-box-icon">
								<span class="counter">'.$nb_visites.'</span>
								<p>Nombre de visiteurs</p>
							</div>
						</div>
					</div>';
?>
				</div>

			</div>

		</div>
	</div>
	<!-- Counters / End -->

</div>
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
<script type="text/javascript" src="scripts/masonry.min.js"></script>
<script type="text/javascript" src="scripts/jquery.jpanelmenu.js"></script>
<script type="text/javascript" src="scripts/tooltips.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>

<!-- Maps -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdzq308z3YxuUhdAQwRi8LUpgYHYcQnRU&callback=initMap"
  type="text/javascript">
  </script>
<script type="text/javascript" src="scripts/infobox.min.js"></script>
<script type="text/javascript" src="scripts/markerclusterer.js"></script>
<script type="text/javascript" src="scripts/maps.js"></script>

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

<!-- Mirrored from www.vasterad.com/themes/findeo/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Apr 2017 16:22:19 GMT -->
</html>