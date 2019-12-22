<?php 
session_start();
require "cnx.php";

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
	//Header('Location: mon-profile-admin.php');

	# code...
}else{
	echo '<script>
	window.location.replace("mon-profile-user.php");
	</script>';
	//Header('Location: mon-profile-user.php');
}

 ?>