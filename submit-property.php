<?php
session_start();
ob_start();
require "cnx.php";

?>
<!DOCTYPE html>

<!-- Mirrored from www.vasterad.com/themes/findeo/submit-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Apr 2017 16:23:08 GMT -->

<head>

<!-- Basic Page Needs
================================================== -->
<title>Ajouter une annonce</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/main.css" id="colors">
<link href="bootstrap-fileinput/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap-fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
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
<div id="titlebar" class="submit-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2><i class="fa fa-plus-circle"></i> Ajouter annonces </h2>
			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->



<form name="my-form" method="POST" >
<div class="container">
<div class="row">


	<!-- Submit Page -->
	<div class="col-md-12">
		<div class="submit-page">

		<!-- Section -->
		<h3>Information de base</h3>
		<!--######### DEBUT CODE SUBMIT ANNONCE #########-->

<?php
if (isset($_POST['Ajouter_annonce'])) {
	//compteur
	$cmp=0;
	// message d'erreur
	$msg_erreur="Erreur ! il faut remplir les champs suivants : ";
	// message d'enregistrement avec success !
	$msg_success="Enregistrer avec success !";
	// debut de test !
	if ($_POST['titre']=='') {
		$msg_erreur= $msg_erreur."titre, ";
		$cmp=$cmp+1;
	}
	if ($_POST['type_bien']=='') {
		//echo "type_bien khawii <br>";
		$msg_erreur= $msg_erreur."type de bien, ";
		$cmp=$cmp+1;
	}
	if ($_POST['type_offre']=='') {
		//echo "type_offre khawii <br>";
		$msg_erreur= $msg_erreur."type d'offre, ";
		$cmp=$cmp+1;
	}
	if ($_POST['prix']=='') {
		//echo "prix khawii <br>";
		$msg_erreur= $msg_erreur."prix, ";
		$cmp=$cmp+1;
	}
	if ($_POST['adresse']=='') {
		//echo "adresse khawii <br>";
		$msg_erreur= $msg_erreur."adresse, ";
		$cmp=$cmp+1;
	}
	if ($_POST['description']=='') {
		//echo "description khawii <br>";
		$msg_erreur= $msg_erreur."descriprion, ";
		$cmp=$cmp+1;
	}
	if ($_POST['quartier']=='') {
		//echo "quartier khawii <br>";
		$msg_erreur= $msg_erreur."quartier, ";
		$cmp=$cmp+1;
	}
	if ($_POST['ville']=='') {
		//echo "ville khawii <br>";
		$msg_erreur= $msg_erreur."ville, ";
		$cmp=$cmp+1;
	}
	if ($_POST['surface']=='') {
		//echo "surface khawii <br>";
		$msg_erreur= $msg_erreur."surface, ";
		$cmp=$cmp+1;
	}
	if ($_POST['nbr_chambre']=='') {
		//echo "nbr_chambre khawii <br>";
		$msg_erreur= $msg_erreur."nombre de chambre, ";
		$cmp=$cmp+1;
	}
	
	



//<!--######### FIN CODE SUBMIT ANNONCE #########-->


		//<!--########## DEBUT affichage de msg d'erreur s'il existe ##########-->
	

	if ($cmp != 0) {
		echo '<div class="container">
		  	<div class="alert alert-danger">
				    '.$msg_erreur.'
				  </div>
				</div>';
	
	}else{
		$msg_erreur="";
		// stocker les valeur retourner par POST dans les variables !
		
		$titre=$_POST['titre'];
		$type_bien=$_POST['type_bien'];
		//ajouter la valeur de id de l'utilisateur !
		$type_offre=$_POST['type_offre'];
		$prix=$_POST['prix'];
		$adresse=$_POST['adresse'];
		$description=$_POST['description'];
		$quartier=$_POST['quartier'];
		$ville=$_POST['ville'];
		$surface=$_POST['surface'];
		$nbr_chambre=$_POST['nbr_chambre'];
		// condition pour la variable valider !
		// f baset hadiik 1 ghadii ndiiro session user !
		$id_user=$_SESSION['id_user'];


		$qry=mysqli_query($success,"select * from utilisateurs where id_utilisateur=$id_user") or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
		while ($data = mysqli_fetch_array($qry)) {
			if ($data['type_user']=='Admin') {
			$valider=1;
		}else{
			$valider=0;
		}	
		}

		//hada id user dial session
		$id_user=$_SESSION['id_user'];

		// la requete !
		// f haad l insert ghaadii tzaad hadiik session dyalt user mansaaach nziido hta f requete
		$rqt="insert into annonces(id_user,titre,discription,type_bien,type_offre,adresse,quartier,ville,surface,nbr_chambre,prix,valider) values('$id_user','$titre','$description','$type_bien','$type_offre','$adresse','$quartier','$ville',$surface,'$nbr_chambre',$prix,$valider) ";
		$qry=mysqli_query($success,$rqt)or die('erreur de sql'.$sql.'<br>'.mysqli_error());

		/*echo '<div class="col-md-12">';
		//echo '<span style="color:green">'.$msg_success.'</span>';
		echo '</div>';

		echo '<div class="container">
				  <div class="alert alert-success alert-dismissible">
				'.$msg_success.'
				  </div>
				</div>';*/
				

					header('Location: gallery.php');
		
	}

}

	?>
	<!--########## FIN affichage de msg d'erreur s'il existe ##########-->

		<div class="submit-section">

			<!-- Title -->
			<div class="form">
				<h5>Titre <i class="tip" data-tip-content="Entrer un Titre de annonce !"></i></h5>
				<input class="search-field" type="text" value="" name="titre" />
			</div>

			<!-- Row -->
			<div class="row with-forms">

				<!-- Status -->
				<div class="col-md-6">
					<h5>Type d'offre</h5>
					<select class="chosen-select-no-single" name="type_offre">
						<option label="blank"></option>	
						<option>Vente</option>
						<option>Location</option>
					</select>
				</div>

				<!-- Type -->
				<div class="col-md-6">
					<h5>Type de bien</h5>
					<select class="chosen-select-no-single" name="type_bien" >
						<option label="blank"></option>
						<option>appartement</option>
						<option>villa</option>
						<option>commercial</option>
						<option>garage</option>
					</select>
				</div>

			</div>
			<!-- Row / End -->


			<!-- Row -->
			<div class="row with-forms">

				<!-- Price -->
				<div class="col-md-4">
					<h5>Prix <i class="tip" data-tip-content="Entrer un prix en Dhs"></i></h5>
					<div class="select-input disabled-first-option">
						<input type="text" data-unit="Dhs" name="prix">
					</div>
				</div>
				
				<!-- Area -->
				<div class="col-md-4">
					<h5>Quartier</h5>
					<div class="select-input disabled-first-option">
						<input type="text" data-unit="Sq Ft" name="quartier">
					</div>
				</div>
				

				<!-- Rooms -->			
				<div class="col-md-4">
					<h5>Nombre de Chambre</h5>
					<select class="chosen-select-no-single" name="nbr_chambre">
						<option label="blank"></option>	
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>More than 5</option>
					</select>
				</div>


				<!-- Surface -->
				<div class="col-md-4">
					<h5>Surface <i class="tip" data-tip-content="Entrer la surface en m²"></i></h5>
					<div class="select-input disabled-first-option">
						<input type="number" name="surface">
					</div>
				</div>

			</div>
			<!-- Row / End -->

		</div>
		<!-- Section / End -->


		<!-- Section -->
		
		<!-- Section / End -->


		<!-- Section -->
		<h3>Location</h3>
		<div class="submit-section">

			<!-- Row -->
			<div class="row with-forms">

				<!-- Address -->
				<div class="col-md-6">
					<h5>Adresse</h5>
					<input type="text" name="adresse">
				</div>

				<!-- City -->
				<div class="col-md-6">
					<h5>Ville</h5>
					<input type="text" name="ville">
				</div>
				<!-- position -->
				
				<!-- City 
				<div class="col-md-6">
					<h5>State</h5>
					<input type="text">
				</div>
				-->

				<!-- Zip-Code 
				<div class="col-md-6">
					<h5>Zip-Code</h5>
					<input type="text">
				</div>
				-->

			</div>
			<!-- Row / End -->

		</div>
		<!-- Section / End -->


		<!-- Section -->
		<h3>Detailed Information</h3>
		<div class="submit-section">

			<!-- Description -->
			<div class="form">
				<h5>Description</h5>
				<textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary" spellcheck="true" ></textarea>
			</div>

			<!-- Row -->
			<div class="row with-forms">

				<!-- Age of Home 
				<div class="col-md-4">
					<h5>Building Age <span>(optional)</span></h5>
					<select class="chosen-select-no-single" >
						<option label="blank"></option>	
						<option>0 - 1 Years</option>
						<option>0 - 5 Years</option>
						<option>0 - 10 Years</option>
						<option>0 - 20 Years</option>
						<option>0 - 50 Years</option>
						<option>50 + Years</option>
					</select>
				</div>
				-->

				<!-- Beds 
				<div class="col-md-4">
					<h5>Bedrooms <span>(optional)</span></h5>
					<select class="chosen-select-no-single" >
						<option label="blank"></option>	
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
				-->

				<!-- Baths 
				<div class="col-md-4">
					<h5>Bathrooms <span>(optional)</span></h5>
					<select class="chosen-select-no-single" >
						<option label="blank"></option>	
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
				-->

			</div>
			<!-- Row / End -->


			<!-- Checkboxes 
			<h5 class="margin-top-30">Other Features <span>(optional)</span></h5>
			<div class="checkboxes in-row margin-bottom-20">
		
				<input id="check-2" type="checkbox" name="check">
				<label for="check-2">Air Conditioning</label>

				<input id="check-3" type="checkbox" name="check">
				<label for="check-3">Swimming Pool</label>

				<input id="check-4" type="checkbox" name="check" >
				<label for="check-4">Central Heating</label>

				<input id="check-5" type="checkbox" name="check">
				<label for="check-5">Laundry Room</label>	


				<input id="check-6" type="checkbox" name="check">
				<label for="check-6">Gym</label>

				<input id="check-7" type="checkbox" name="check">
				<label for="check-7">Alarm</label>

				<input id="check-8" type="checkbox" name="check">
				<label for="check-8">Window Covering</label>
		
			</div>
			-->
			<!-- Checkboxes / End -->

		</div>
		<!-- Section / End -->


		<!-- Section 
		<h3>Contact Details</h3>
		<div class="submit-section">

			<!-- Row 
			<div class="row with-forms">

				<!-- Name 
				<div class="col-md-4">
					<h5>Name</h5>
					<input type="text">
				</div>

				<!-- Email 
				<div class="col-md-4">
					<h5>E-Mail</h5>
					<input type="text">
				</div>

				<!-- Name 
				<div class="col-md-4">
					<h5>Phone <span>(optional)</span></h5>
					<input type="text">
				</div>

			</div>
			<!-- Row / End 

		</div>
		-->
		<!-- Section / End -->

		<div class="divider"></div>
		<input type="submit" name="Ajouter_annonce" value="Ajouter annonce">
		
		<!--<a href="" class="button preview margin-top-5" onclick="document.forms['my-form'].submit();return false;">Ajouter annonce <i class="fa fa-arrow-circle-right"></i></a>-->


		</div>
<br>


	</div>
</div>
</div>
</form>
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

<!-- DropZone | Documentation: http://dropzonejs.com -->
<script type="text/javascript" src="scripts/dropzone.js"></script>
<script>
	$(".dropzone").dropzone({
		dictDefaultMessage: "<i class='sl sl-icon-plus'></i> Click here or drop files to upload",
	});
</script>



	
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

<!-- Mirrored from www.vasterad.com/themes/findeo/submit-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Apr 2017 16:23:09 GMT -->
</html>