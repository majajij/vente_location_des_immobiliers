<?php
require "cnx.php";
if (isset($_GET['date'])) {
			// stocker le id de user !
	$date=$_GET['date'];

	$menu=$_GET['menu'];
			// la requet SQL !
			$qry=mysqli_query($success,"Delete from annonces where date_annonce='$date'") or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
			if ($menu=='Liste_annonces') {
				# code...
				header("Location:Liste_annonces.php");
			}
			if($menu=='my-properties_admin'){
				header("Location:my-properties_admin.php");
			}
			if($menu=='my-properties_user'){
				header("Location:my-properties_user.php");
			}

				
	}
?>