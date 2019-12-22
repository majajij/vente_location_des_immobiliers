<?php
require "cnx.php";

if (isset($_GET['date'])) {
			// stocker le id de tableau contact !
			$date=$_GET['date'];
					// la requet SQL !
						$qry=mysqli_query($success,"Delete from reservation where date_reservation='$date'") or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
						header("Location:reservation-user.php");	
	}
?>