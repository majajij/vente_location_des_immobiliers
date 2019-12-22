<?php
session_start();
ob_start();
require "cnx.php";

if (isset($_SESSION['id_user'])) {

	$id_user=$_SESSION['id_user'];

$rqt="select * from utilisateurs where id_utilisateur=$id_user";
			$qry=mysqli_query($success,$rqt)or die('erreur de sql'.$sql.'<br>'.mysqli_error());

			 while($data2 = mysqli_fetch_array($qry)) {
			 		$type_user=$data2['type_user'];
	
			 } 
if ($type_user=='Admin') {
	echo '<script>
	window.location.replace("mon-profile-admin.php");
	</script>';
}else{
	echo '<script>
	window.location.replace("mon-profile-user.php");
	</script>';
}
}

?>
<!DOCTYPE html>

<!-- Mirrored from www.vasterad.com/themes/findeo/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Apr 2017 16:23:23 GMT -->
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

				<h2>mot de passe oublier</h2>
				
				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">se connect</a></li>
						<li>mot de passe oublier</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Contact
================================================== -->

<!-- Container -->
<div class="container">

	<div class="row">
	<div class="col-md-4 col-md-offset-4">

	<!--Tab -->
	<div class="my-account style-1 margin-top-5 margin-bottom-40">

		

		<div class="tabs-container alt">
			<h3><span style="color: blue">mot de passe oublier</span></h3>
			<!-- Register -->
			<div class="tab-content" style="display: none;">
			<!--######### DEBUT CODE SUBMIT REGISTER #########-->


				<form method="post">
					<?php
					if (isset($_POST['register'])) {
						//compteur
						$cmp=0;
						// message d'erreur
						$msg_erreur="Erreur ! il faut remplir les champs suivants : ";
						// message confermer le mot de passe 
						$msg_confpasse="le mot de passe n'est pas le meme";
						// message d'enregistrement avec success !
						$msg_success="Enregistrer avec success !";
						// debut de test !
						if ($_POST['nom']=='') {
							$msg_erreur= $msg_erreur."nom, ";
							$cmp=$cmp+1;
						}
						if ($_POST['prenom']=='') {
							
							$msg_erreur= $msg_erreur."prenom, ";
							$cmp=$cmp+1;
						}
						if ($_POST['telephone']=='') {
							
							$msg_erreur= $msg_erreur."telephone, ";
							$cmp=$cmp+1;
						}
						if ($_POST['email']=='') {
							
							$msg_erreur= $msg_erreur."email, ";
							$cmp=$cmp+1;
						}
						if ($_POST['password1']=='') {
							
							$msg_erreur= $msg_erreur."password1, ";
							$cmp=$cmp+1;
						}
						if ($_POST['password2']!=$_POST['password1']) {
							
							$msg_confpasse="password2, ".$msg_confpasse;
							echo '<span style="color:red">'.$msg_confpasse.'</span>';
						}
						

						if ($cmp != 0) {

							echo '<span style="color:red">'.$msg_erreur.'</span>';
						}else{
							$msg_erreur="";
							// stocker les valeur retourner par POST dans les variables !
							
							$nom=$_POST['nom'];
							$prenom=$_POST['prenom'];
							$telephone=$_POST['telephone'];
							$email=$_POST['email'];
							$password1=$_POST['password1'];
							// condition pour la variable valider !
				
							// la requete !
							// f haad l insert ghaadii tzaad hadiik session dyalt user mansaaach nziido hta f requete
							$rqt="select * from utilisateurs where nom='$nom' and prenom='$prenom'
							and tel='$telephone' and email='$email'";
							$qry=mysqli_query($success,$rqt)or die('erreur de sql'.$sql.'<br>'.mysqli_error());

							
							$verify=0;
							while($data=mysqli_fetch_assoc($qry)) {
								$id_user=$data['id_utilisateur'] ;
								$verify=$verify+1;
							}
							if ($verify!=0) {

							$query=mysqli_query($success,"Update utilisateurs Set passe='$password1' where id_utilisateur=$id_user ") or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
							echo '<script>
									alert("le nouveau mot de passe est bien Enregistrer")
									window.location.replace("login-register.php");
									</script>';
							}else{
								echo 'error ';
							}


							echo '<div class="col-md-12">';
							echo '<span style="color:green">'.$msg_success.'</span>';
							echo '</div>';

						}
					}
					?>
				<p class="form-row form-row-wide">
					<label for="username2">Nom d'utilisateur:
						<i class="im im-icon-Male"></i>
						<input type="text" class="input-text" name="nom" value="" />
					</label>
				</p>

				<p class="form-row form-row-wide">
					<label for="username2">prénom d'utilisateur:
						<i class="im im-icon-Male"></i>
						<input type="text" class="input-text" name="prenom"  value="" />
					</label>
				</p>
					
				<p class="form-row form-row-wide">
					<label for="telephone">telephone :
						<i class="sl sl-icon-phone"></i>
						<input type="text" class="input-text" name="telephone" value="" />
					</label>
				</p>
					
				<p class="form-row form-row-wide">
					<label for="email2">Adresse e-mail:
						<i class="im im-icon-Mail"></i>
						<input type="text" class="input-text" name="email" value="" />
					</label>
				</p>

				<p class="form-row form-row-wide">
					<label for="password1">mot de passe:
						<i class="im im-icon-Lock-2"></i>
						<input class="input-text" type="password" name="password1"/>
					</label>
				</p>

				<p class="form-row form-row-wide">
					<label for="password2">Répéter le mot de passe:
						<i class="im im-icon-Lock-2"></i>
						<input class="input-text" type="password" name="password2"/>
					</label>
				</p>

				<p class="form-row">
					<input type="submit" class="button border fw margin-top-10" name="register" value="ok" />
				</p>

				</form>
			</div>

		</div>
	</div>
	</div>
	</div>

</div>
<!-- Container / End -->



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

<!-- Mirrored from www.vasterad.com/themes/findeo/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Apr 2017 16:23:23 GMT -->
</html>