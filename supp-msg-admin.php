<?php
require "cnx.php";

if (isset($_GET['id_cnt'])) {
			// stocker le id de tableau contact !
			$id_contact=$_GET['id_cnt'];
					// la requet SQL !
						$qry=mysqli_query($success,"Delete from contact where id_contact=$id_contact") or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
						header("Location:message-admin.php");	
	}
?>