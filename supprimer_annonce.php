<?php
session_start();
require "cnx.php";

?>
<!DOCTYPE html>

<!-- Mirrored from www.vasterad.com/themes/findeo/submit-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Apr 2017 16:23:08 GMT -->
<head>

<!-- Basic Page Needs
================================================== -->
<title>supprimer une annonce</title>
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
				<h2><i class="fa fa-plus-circle"></i> Supprimer Une Annonce </h2>
			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->



<!--DEBUT de Verifier si l'annonce exist !-->
<div class="container">
<div class="row with-forms">
<div class="col-md-3">

	<form method="POST">
		<input type="text" name="titre" placeholder="Titre d'annonce">
		<input type="submit" name="verifier" value="Vérifier">
	</form>
</div>
</div>
</div>


		<!--######### DEBUT CODE SUBMIT ANNONCE #########-->

<?php

if (isset($_POST['verifier'])) {
		//compteur de id annonce !
	$cp=0;
		//stocker la valeur entrer dans input de id annonce !
	$titre=$_POST['titre'];
	$_SESSION['titre']=$_POST['titre'];


	if ($titre=="") {
		echo 'Il faut saisie un titre d\'annonce !';
	}else{

		// la requet pour verifier si l'annonce existe !
	$query=mysqli_query($success,"select * from annonces where titre='$titre'") or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());

	while ($dt = mysqli_fetch_array($query)) {
				// incrementation de compteur si l'annonce existe !
				
				$cp=$cp+1;
			}
			

		if($cp==1){
echo '<div class="container">';	
			echo "Annonce Existe !<br><br>";

			//style de tableau !
			echo "<style>table {
color: #333;
font-family: Helvetica, Arial, sans-serif;
width: 640px;
border-collapse:
collapse; border-spacing: 0;
}

td, th {
border: 1px solid transparent; /* No more visible border */
height: 30px;

transition: all 0.3s; /* Simple transition for hover effect */
}

th {
background: #DFDFDF; /* Darken header a bit */
font-weight: bold;
}

td {
background: #FAFAFA;
text-align: center;
width: 300px;
}

/* Cells in even rows (2,4,6...) are one color */
tr:nth-child(even) td { background: #F1F1F1; }

/* Cells in odd rows (1,3,5...) are another (excludes header cells) */
tr:nth-child(odd) td { background: #FEFEFE; }

tr td:hover { background: #666; color: #FFF; } /* Hover cell effect! */</style>";

			//fin de style de tableau !

			
echo '<table>';

				$qry=mysqli_query($success,"select * from annonces where titre='$titre'") or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
				while ($data = mysqli_fetch_array($qry)) {
				echo '<tr>
						<th colspan="2" style="text-align:center" bgcolor="#274abb" >'.'<span style="color:blue">ID annonce : '.$data['id_annonce'].'</span></th>
				</tr>';
				echo '<tr>
						<td>Titre : </td>
						<td align=center>'.$data['titre'].'</td>
				</tr>';
				echo '<tr>
						<td>Discription : </td>
						<td align=center>'.$data['discription'].'</td>
				</tr>';
				echo '<tr>
						<td>Type de bien : </td>
						<td align=center>'.$data['type_bien'].'</td>
				</tr>';
				echo '<tr>
						<td>Type d\'offre : </td>
						<td align=center>'.$data['type_offre'].'</td>
				</tr>';
				echo '<tr>
						<td>Adresse : </td>
						<td align=center>'.$data['adresse'].'</td>
				</tr>';
				echo '<tr>
						<td>Quartier : </td>
						<td align=center>'.$data['quartier'].'</td>
				</tr>';
				echo '<tr>
						<td>Ville : </td>
						<td align=center>'.$data['ville'].'</td>
				</tr>';
				echo '<tr>
						<td>Surface : </td>
						<td align=center>'.$data['surface'].'</td>
				</tr>';
				echo '<tr>
						<td>Nombre de chambre : </td>
						<td align=center>'.$data['nbr_chambre'].'</td>
				</tr>';
				echo '<tr>
						<td>Prix : </td>
						<td align=center>'.$data['prix'].'</td>
				</tr>';
				echo '<tr>
						<td>Date : </td>
						<td align=center>'.$data['date_annonce'].'</td>
				</tr>';
			}//dyaalt while
echo "</table><br>";	

		echo '<form method="POST" name="form2">';
		echo '<input type="submit" name="annuler" value="Annuler">';
		echo '<input type="submit" name="supprimer" value="Supprimer">';
		echo "</form>";

echo '</div>';

		}else{
				echo "Aucune annonce contien ce titre !";
		}

}
}

if (isset($_POST['supprimer'])) {
	// la requet de suppression !
	$var =$_SESSION['titre'];
	$query=mysqli_query($success,"Delete from annonces where titre='$var'") or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());

	echo '<span style="color:green">Suppression avec succès!</span>';
}
if (isset($_POST['annuler'])) {
	echo '<script>alert("Annuler !")</script>';
}

	?>
	<!--########## FIN affichage de msg d'erreur s'il existe ##########-->


<!--FIN de Verifier si l'annonce exist !-->





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