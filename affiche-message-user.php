<?php						
require "cnx.php";
?>
<!DOCTYPE html>

<!-- Mirrored from www.vasterad.com/themes/findeo/my-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Apr 2017 16:23:08 GMT -->
<head>

<!-- Basic Page Needs
================================================== -->
<title>Message</title>
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
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Message</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Accueil</a></li>
						<li>Message</li>
				    </ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row">


		<!-- Widget -->
		<div class="col-md-4">
			<div class="sidebar left">

				<div class="my-account-nav-container">
					
					<ul class="my-account-nav">
						<li class="sub-nav-title">Gestion des comptes</li>
						<li><a href="my-profile.php" class="current"><i class="sl sl-icon-user"></i> Mon Profil </a></li>
					</ul>
					
					<ul class="my-account-nav">
						<li class="sub-nav-title">Manage Listings</li>
						<li><a href="#"><i class="sl sl-icon-docs"></i> Mes annonces </a></li>
						<li><a href="submit-property.php"><i class="sl sl-icon-action-redo"></i> Ajouter une annonce </a></li>
						<li><a href="modifier_annonce.php"><i class="sl sl-icon-action-undo"></i> Modifier une annonce </a></li>
						<li><a href="supprimer_annonce.php"><i class="sl sl-icon-trash "></i> Supprimer une annonce </a></li>
						<li><a href="message-user.php"><i class="sl sl-icon-envelope-open "></i> Message </a></li>
					</ul>

					<ul class="my-account-nav">
					<li><a href="change-password-user.php"><i class="sl sl-icon-lock"></i> Changer mot de passe </a></li>
						<li><a href="#"><i class="sl sl-icon-power"></i> Log Out</a></li>
					</ul>

				</div>

			</div>
		</div>

		<div class="col-md-8">
			<div class="row">


				<div class="col-md-8 my-profile">
					<h4 class="margin-top-0 margin-bottom-30"> Message </h4>

					<?php
							
							$msg_erreur = "Message ou Sujet non remplie !";
							$msg_envoyer = "Message envoyer !";

							if (isset($_POST['repond-msg'])) {
								if ($_POST['repond']=="" or $_POST['sujet']=="") {
									echo '<span style="color:red">'.$msg_erreur.'</span>';
								}else{

									$user=$_GET['user'];
									$message=$_POST['repond'];
									$sujet=$_POST['sujet'];
									// la requet SQL !
											// hnaya f blasset raaa9m 1 ghadii nbeedlooh b session !
									$id_user=$_SESSION['id_user'];
										$qry=mysqli_query($success,"insert into contact(id_utilisateur,id_distinateur,sujet,message) values($id_user,$user,'$sujet','$message') ") or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
										echo '<span style="color:green">'.$msg_envoyer.'</span>';
								}
							}

							// ################################################################################################""
					
							echo '<form method="POST" >';

			// stocker le id de user !
			$date=$_GET['date'];
			
					// la requet SQL !
						$qry=mysqli_query($success,"select concat(utilisateurs.nom,' ',utilisateurs.prenom) as 'nom complet' , utilisateurs.id_utilisateur , contact.sujet, contact.date_msg , contact.message from utilisateurs,contact where utilisateurs.id_utilisateur=contact.id_distinateur and contact.date_msg='$date'") or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());

							while ($data = mysqli_fetch_array($qry)) {

						echo '
								
								<!-- De -->
								<span style="color:blue">	De : </span> <span style="color:black"> '.$data['nom complet'].' </span>
								<br><br>

								<!-- De -->
								<span style="color:blue">	Sujet : </span> <span style="color:black"> '.$data['sujet'].' </span>
								<br><br>

								<!-- De -->
								<span style="color:blue">	Message : </span> <br><span style="color:black"> '.$data['message'].' </span>
								<br><br>

								<!-- Repond -->
										
									<h5><span style="color:blue"><u> Repond : </u></span></h5>

										Sujet : 
								<br>
								<input type="text" name="sujet">
										Message :
									<textarea name="repond"></textarea>
								
								<br>

								<input type="submit" name="repond-msg" value="Envoyer">
						';
					} // hadi dyaalt while !

							echo '</form><br>';

					?>

				</div>

			</div>
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
<script type="text/javascript" src="scripts/masonry.min.js"></script>
<script type="text/javascript" src="scripts/jquery.jpanelmenu.js"></script>
<script type="text/javascript" src="scripts/tooltips.min.js"></script>
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

<!-- Mirrored from www.vasterad.com/themes/findeo/my-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Apr 2017 16:23:08 GMT -->
</html>