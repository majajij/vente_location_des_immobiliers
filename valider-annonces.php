<?php
require "cnx.php";
if (isset($_GET['date'])) {
			// stocker le id de user !
			$date=$_GET['date'];
					// la requet SQL !
						$qry=mysqli_query($success,"Update annonces Set valider=1 where date_annonce='$date'") or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
						header("Location:annonces-deposer.php");	
	}
?>