<?php
session_start();			
require "cnx.php";
?>
<!DOCTYPE html>

<!-- Mirrored from www.vasterad.com/themes/findeo/my-properties.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Apr 2017 16:23:08 GMT -->
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



<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<h2>Mon Profile</h2>
			
				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li>Accueil</li>
						<li>Mon Profile</li>
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


        <div class="col-md-4">
            <div class="sidebar left">

                <div class="my-account-nav-container">

                    <ul class="my-account-nav">
                        <li class="sub-nav-title">Gérer mon compte</li>
                        <li><a href="mon-profile-admin.php" class="current"><i class="sl sl-icon-user"></i> Mon Profile </a></li>
                    </ul>

                    <ul class="my-account-nav">
                        <li class="sub-nav-title">Gérer les annonces</li>
                        <!-- my-properties.html -->
                        <li><a href="my-properties_admin.php"><i class="sl sl-icon-docs"></i> Mes annonces </a></li>
                        <li><a href="submit-property.php"><i class="sl sl-icon-action-redo"></i> Ajouter une annonce </a></li>
                        <!--
                        <li><a href="modifier_annonce.php"><i class="sl sl-icon-action-undo"></i> Modifier une annonce </a></li>
                        -->
                        <li><a href="Liste_annonces.php"><i class="sl sl-icon-docs "></i> Liste annonces </a></li>
                        <li><a href="annonces-deposer.php"><i class="sl sl-icon-grid "></i> Annonces deposé </a></li>
                        <li><a href="Liste_user.php"><i class="sl sl-icon-people "></i> Utilisateurs </a></li>
                        <li><a href="Liste_admin.php"><i class="sl sl-icon-people "></i> Administrateurs </a></li>
                        <li><a href="reservation-admin.php"><i class="sl sl-icon-note "></i> Reservation </a></li>
                        <li><a href="message-admin.php"><i class="sl sl-icon-envelope-open "></i> Message </a></li>
                        <li><a href="charts.php"><i class="sl sl-icon-chart "></i> Statistique </a></li>
                    </ul>

                    <ul class="my-account-nav">
                        <li><a href="change-password-admin.php"><i class="sl sl-icon-lock"></i> Changer mot de passe </a></li>
                        <li><a href="log-out.php"><i class="sl sl-icon-power"></i> Se Déconnecter </a></li>
                    </ul>

                </div>

            </div>
        </div>

		<div class="col-md-8">
			<table class="manage-table responsive-table">

				<tr>
					<th><i class="fa fa-file-text"></i> Annonces</th>
					<th class="expire-date"><i class="fa fa-calendar"></i>Date </th>
					<th></th>
				</tr>

				<!-- Item #1 -->
				<?php 	
			      $varr=$_SESSION['id_user'];
			       	$query = mysqli_query($success,"select * from annonces where id_user=$varr");
			        if (!$query) { 
			            echo "Problem with query " . $query . "<br/>"; 
			            echo mysqli_error();
			            exit(); 
			        } 
			        while($myrow1 = mysqli_fetch_assoc($query)) {
			        $id_annonce=$myrow1['id_annonce'];
					$qry = mysqli_query($success,"select * from photos where id_annonce=$id_annonce");
					while($myrow2 = mysqli_fetch_array($qry)){
					
					echo '<tr>
					<td class="title-container">
						<img src="uploads/'.htmlspecialchars($myrow2['photo']).'" alt="">

					 ';
					break;
				}
						echo '<div class="title">
							<h4><a href="#">'.htmlspecialchars($myrow1['titre']).'</a></h4>
							<span>'.htmlspecialchars($myrow1['adresse']).' ,'.htmlspecialchars($myrow1['ville']).'</span>
							<span class="table-property-price">'.htmlspecialchars($myrow1['prix']).'DHs</span>
						</div>
					</td>
					<td class="expire-date">'.htmlspecialchars($myrow1['date_annonce']).'</td>
					<td class="action">
						<a href="modifier_annonce.php?id='.$myrow1['id_annonce'].'"><i class="fa fa-pencil"></i> Modifier</a>
						<a href="supp-annonces-admin.php?date='.$myrow1['date_annonce'].'&menu=my-properties_admin" class="delete"><i class="fa fa-remove"></i>Supprimer</a>
					</td>
				</tr>';
				}
				?>
			</table>
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

<!-- Mirrored from www.vasterad.com/themes/findeo/my-properties.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Apr 2017 16:23:08 GMT -->
</html>