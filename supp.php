<?php
require "cnx.php";
if (isset($_GET['id'])) {
			// stocker le id de user !
			$id_user=$_GET['id'];
					// la requet SQL !
						$qry=mysqli_query($success,"Delete from utilisateurs where id_utilisateur=$id_user") or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
						header("Location:liste_user.php");	
	}
?>