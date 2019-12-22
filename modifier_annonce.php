<?php
ob_start();
session_start();
require "cnx.php";
?>
<!DOCTYPE html>

<!-- Mirrored from www.vasterad.com/themes/findeo/submit-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Apr 2017 16:23:08 GMT -->
<head>

<!-- Basic Page Needs
================================================== -->
<title>Modifier une annonce</title>
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
<div id="titlebar" class="submit-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2><i class="fa fa-plus-circle"></i>Modifier une annonce</h2>
			</div>
		</div>
	</div>
</div>


<!-- Content-->


		<!--######### DEBUT CODE SUBMIT ANNONCE #########-->
<?php

$id=$_GET['id'];
$_SESSION['id_annonce']=$id;


//l'affichage comme formulaire !

		$qry1=mysqli_query($success,"select * from annonces where id_annonce=$id");
        if (!$qry1) {
            echo "Problem with query " . $qry1 . "<br/>";
            echo mysqli_error();
            exit();
        }
	while ($data = mysqli_fetch_array($qry1)) {
		$id_user=$data['id_user'];
		$rqt="select * from utilisateurs where id_utilisateur=$id_user";
			$qry=mysqli_query($success,$rqt);
            if (!$qry) {
                echo "Problem with query " . $qry . "<br/>";
                echo mysqli_error();
                exit();
            }
			 while($data2 = mysqli_fetch_array($qry)) {
			 		$type_user=$data2['type_user'];
	
			 } // sedaa dyaalt while user !
			 
			 	// session 
			 	$_SESSION['type_user']=$type_user;
			 

		//action="modifier_annonce.php"
	echo '<form name="my-form" method="POST" action="modifier.php" >
<div class="container">
<div class="row">


	<!-- Submit Page -->
	<div class="col-md-12">
		<div class="submit-page">


	<!-- Section -->
		<h3>Information de base</h3>

		<div class="submit-section">

			<!-- Title -->
			<div class="form">
				<h5>Titre <i class="tip" data-tip-content="Type title that will also contains an unique feature of your property (e.g. renovated, air contidioned)"></i></h5>
				<input class="search-field" type="text" value="'.$data['titre'].'" name="titre" />
			</div>

			<!-- Row -->
			<div class="row with-forms">

				<!-- Status -->
				<div class="col-md-6">
					<h5>Type d\'offre</h5>
					<select class="chosen-select-no-single" name="type_offre">
						<option label="blank"></option>	
						<option>Vente</option>
						<option>Location</option>
						<option selected="selected">'.$data['type_offre'].'</option>
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
						<option >garage</option>
						<option selected="selected">'.$data['type_bien'].'</option>
					</select>
				</div>

			</div>
			<!-- Row / End -->


			<!-- Row -->
			<div class="row with-forms">

				<!-- Price -->
				<div class="col-md-4">
					<h5>Prix <i class="tip" data-tip-content="Type overall or monthly price if property is for rent"></i></h5>
					<div class="select-input disabled-first-option">
						<input type="text" data-unit="Dhs" name="prix" value="'.$data['prix'].'">
					</div>
				</div>
				
				<!-- Area -->
				<div class="col-md-4">
					<h5>Quartier</h5>
					<div class="select-input disabled-first-option">
						<input type="text" data-unit="Sq Ft" name="quartier" value="'.$data['quartier'].'">
					</div>
				</div>
				

				<!-- Rooms -->			
				<div class="col-md-4">
					<h5>Nombre de Chambre</h5>
					<select class="chosen-select-no-single" name="nbr_chambre" >
						<option label="blank"></option>	
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option selected="selected">'.$data['nbr_chambre'].'</option>
						<option>More than 5</option>
					</select>
				</div>


				<!-- Surface -->
				<div class="col-md-4">
					<h5>Surface <i class="tip" data-tip-content="Type overall or monthly price if property is for rent"></i></h5>
					<div class="select-input disabled-first-option">
						<input type="number" name="surface" value="'.$data['surface'].'">
					</div>
				</div>

			</div>
			<!-- Row / End -->

		</div>
		<!-- Section / End -->

		<!-- Section -->
		<h3>Location</h3>
		<div class="submit-section">

			<!-- Row -->
			<div class="row with-forms">

				<!-- Address -->
				<div class="col-md-6">
					<h5>Adresse</h5>
					<input type="text" name="adresse" value="'.$data['adresse'].'">
				</div>

				<!-- City -->
				<div class="col-md-6">
					<h5>Ville</h5>
					<input type="text" name="ville" value="'.$data['ville'].'">
				</div>

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
				<textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary" spellcheck="true" >'.$data['discription'].'</textarea>
			</div>

		</div>';

//<div class="listing-carousel">
	//$id_annonce=$data['id_annonce'];
	$qry = mysqli_query($success,"select * from photos where id_annonce=$id");
	while($myrow2 = mysqli_fetch_array($qry)){
		# code...
		echo '<img src="uploads/'.htmlspecialchars($myrow2['photo']).'" alt="" height="200" > &nbsp;';
	}//dialt while photos</div>


echo' 

<a href="modifier.php" onclick="document.forms[\'my-form\'].submit();return false;" class="button preview margin-top-5" >Modifier</a>
<a href="mon-profile-user.php" class="button preview margin-top-5" >Anuler</a>
';
//<input type="submit" name="modifier" value="Modifier">
//<input type="submit" name="annuler" value="Annuler">
echo '</div>
	</div>

</div>
</div>

</form>';

}// dyaalt while ! 

		// fin de l'affichage !

//""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""
/*if (isset($_POST['modifier'])) {
	//vérifier si les champs son remplit !

	//compteur
	$cmp=0;
	// message d'erreur
	$msg_erreur="Erreur ! il faut remplir les champs suivants : ";
	// message d'enregistrement avec success !
	$msg_success="Modifier avec success !";
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


	if ($cmp != 0) {
		echo '<span style="color:red">'.$msg_erreur.'</span>';
	}else{
		$msg_erreur="";

	//fin de verification
 	//stocker les valeur de post dans les variables !

 	$titre=$_POST['titre'];
		$type_bien=$_POST['type_bien'];
		$type_offre=$_POST['type_offre'];
		$prix=$_POST['prix'];
		$adresse=$_POST['adresse'];
		$discription=$_POST['description'];
		$quartier=$_POST['quartier'];
		$ville=$_POST['ville'];
		$surface=$_POST['surface'];
		$nbr_chambre=$_POST['nbr_chambre'];

 	//lancer la requet update !
		//$var =$_SESSION['titre'];
	$query=mysql_query("Update annonces Set titre='$titre', discription='$discription', type_bien='$type_bien', type_offre='$type_offre', adresse='$adresse', quartier='$quartier', ville='$ville', surface=$surface, nbr_chambre='$nbr_chambre' where id_annonce=$id") or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

 	//msg de fin !
 	echo '<span style="color:green">'.$msg_success.'</span>';

 }
	
	}
if (isset($_POST['annuler'])) {
	
	header('Location: mon-profile-user.php');
	
}
*/
	?>
	<!--########## FIN affichage de msg d'erreur s'il existe ##########-->



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