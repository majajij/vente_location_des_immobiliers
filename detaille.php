<?php
ob_start();
session_start();						
require "cnx.php";
?>
<!DOCTYPE html>

<!-- Mirrored from www.vasterad.com/themes/findeo/single-property-page-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Apr 2017 16:22:35 GMT -->
<head>

<!-- Basic Page Needs
================================================== -->
<title>Findeo</title>
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

<?php 	
			      $id=$_GET['id_annonce'];
			      $id_user=$_SESSION['id_user'];
       	$query = mysqli_query($success,"select * from annonces where  id_annonce=$id");
        if (!$query) { 
            echo "Problem with query " . $query . "<br/>"; 
            echo mysqli_error();
            exit(); 
        } 
        while($myrow1 = mysqli_fetch_array($query)) {

echo '<!-- Titlebar
================================================== -->
<div id="titlebar" class="property-titlebar margin-bottom-0">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				
				<div class="property-title">
					<h2>'.htmlspecialchars($myrow1['titre']).' <span class="property-badge">À '.htmlspecialchars($myrow1['type_offre']).'</span></h2>
					<span>
						<a href="" class="listing-address">
							<i class="fa fa-map-marker"></i>
							'.htmlspecialchars($myrow1['adresse']).' ,'.htmlspecialchars($myrow1['ville']).'
						</a>
					</span>
				</div>

				<div class="property-pricing">
					<div>'.htmlspecialchars($myrow1['prix']).'DHs</div>
					<div class="sub-price">'.htmlspecialchars($myrow1['surface']).' m2</div>
				</div>


			</div>
		</div>
	</div>
</div>';
$id_annonce=$myrow1['id_annonce'];

echo '<!-- Content
================================================== -->
<div class="container">
	<div class="row margin-bottom-50">
		<div class="col-md-12">
		<!-- Slider -->
			<div class="property-slider default"> ';

		$qry = mysqli_query($success,"select * from photos where id_annonce=$id_annonce");
		while($myrow2 = mysqli_fetch_array($qry)){
			echo '
				<a href="uploads/'.htmlspecialchars($myrow2['photo']).'" data-background-image="uploads/'.htmlspecialchars($myrow2['photo']).'" class="item mfp-gallery"></a>';
		}		
			echo '</div>
			<!-- Slider Thumbs -->
			<div class="property-slider-nav"> ';
		
		$qry2 = mysqli_query($success,"select * from photos where id_annonce=$id_annonce");
		while($myrow3 = mysqli_fetch_array($qry2)){

		echo '<div class="item"><img src="uploads/'.htmlspecialchars($myrow3['photo']).'" alt=""></div>';

		}

echo '</div>
</div>
	</div>
</div>';


echo '<div class="container">
	<div class="row">

		<!-- Property Description -->
		<div class="col-lg-8 col-md-7">
			<div class="property-description">

				<!-- Main Features -->
				<ul class="property-main-features">
					<li>surface <span>'.htmlspecialchars($myrow1['surface']).' m2</span></li>
					<li>nombre de piéce <span>'.htmlspecialchars($myrow1['nbr_chambre']).'</span></li>
					<li>date d\'annonce <span>'.htmlspecialchars($myrow1['date_annonce']).'</span></li>
				</ul>


				<!-- Description -->
				<h3 class="desc-headline">Description</h3>
				<div class="show-more">

					<p>
						 '.htmlspecialchars($myrow1['discription']).'
					</p>

					<a href="#" class="show-more-button">Afficher plus<i class="fa fa-angle-down"></i></a>
				</div>

				<!-- Details -->


				<!-- Features -->

				<!-- Similar Listings Container -->

				<!-- Similar Listings Container / End -->

			</div>
		</div>
		<!-- Property Description / End -->';
}

    
		
		if (isset($_SESSION['id_user'])) {
			$qry3 = mysqli_query($success,"select concat(nom,' ',prenom) as 'nom complet',tel ,email from utilisateurs where id_utilisateur= $id_user");
			if (!$qry3) { 
            echo "Problem with query " . $qry3 . "<br/>"; 
            echo mysqli_error();
            exit(); 
        }
			while($data = mysqli_fetch_array($qry3)) {

			echo '<!-- Sidebar -->
			<div class="col-lg-4 col-md-5">
			<div class="sidebar sticky right">
			<form method="POST" action="detaille.php?id_annonce='.$id.'">
				<!-- Widget -->
				<div class="widget">
                    <h2>Réservation</h2>
					<!-- Agent Widget -->
					<div class="agent-widget">
						<input type="text"  name="nom_complet" placeholder="Votre nom complet" value="'.$data['nom complet'].'">
						

						<input type="text" name="email" placeholder="Votre email" value="'.$data['email'].'">
						<input type="text" name="tel" placeholder="Votre téléphone" value="'.$data['tel'].'">
						<!--<textarea name="description" placeholder="Commentaire ..."></textarea>-->
						<input type="submit" name="reserve" class="button fullwidth margin-top-5" value="Réserver">
						
					</div>
					<!-- Agent Widget / End -->

				</div>
				<!-- Widget / End -->


				<!-- Widget -->
				</form>
			</div>
		</div>';
}// dyalt while li kat3emeer l'info user 

		}else{
			echo '<div class="col-lg-4 col-md-5">
			<div class="sidebar sticky right">
				<!-- Widget -->
				<div class="widget">
					<!-- Agent Widget -->
					<div class="agent-widget">

					<a href="login-register.php" target="_blank" class="button fullwidth margin-top-5">Réserver</a>	
					</div>
					<!-- Agent Widget / End -->
				</div>	
			</div>
		</div>';

		}

		echo '<!-- Sidebar / End -->';
		if (isset($_POST['reserve'])) {
			//compteur
		$cmp=0;
		// message d'erreur
		
		// message d'enregistrement avec success !
		$msg_success="Enregistrer avec success !";
		// debut de test !
		if ($_POST['nom_complet']=='') {
			
			$cmp=$cmp+1;
		}
		if ($_POST['tel']=='') {
			//echo "type_bien khawii <br>";
			
			$cmp=$cmp+1;
		}
		if ($_POST['email']=='') {
			//echo "type_offre khawii <br>";
			
			$cmp=$cmp+1;
		}
		/*if ($_POST['description']=='') {
			//echo "prix khawii <br>";

			$cmp=$cmp+1;
		}*/
		if ($cmp!=0) {
			echo '<script>
			alert("vous devez remplir tous les champs")</script>';
		}else{
		//echo '<script>
		//	alert("nod ten3ess")</script>';
			//requt insert to reservation
			//$description=$_POST['description'];


			$qry4 = mysqli_query($success,"insert into reservation(id_annonce,id_utilisateur) values('$id','$id_user')");
			if (!$qry4) { 
            echo "Problem with query " . $qry4 . "<br/>"; 
            echo mysqli_error($success);
            exit();
            } 
			//header to fichier word
			header("location: reservation_word.php?id_annonce=$id&id_user=$id_user");
		}
	}
?>
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

<!-- Mirrored from www.vasterad.com/themes/findeo/single-property-page-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Apr 2017 16:23:08 GMT -->
</html>