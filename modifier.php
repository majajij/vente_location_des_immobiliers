
<?php 
session_start();
require "cnx.php";
$type_user=$_SESSION['type_user'];
$id=$_SESSION['id_annonce'];

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
		
		$query=mysqli_query($success,"Update annonces Set titre='$titre', discription='$discription', type_bien='$type_bien', type_offre='$type_offre', adresse='$adresse', quartier='$quartier', ville='$ville', surface=$surface, nbr_chambre='$nbr_chambre' where id_annonce=$id") or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());

if ($type_user=='Admin') {
	echo '<script>
	alert("votre annonce est bien modifier");
	window.location.replace("mon-profile-admin.php");
	</script>';
	//Header('Location: mon-profile-admin.php');

	# code...
}else{
	echo '<script>
	alert("votre annonce est bien modifier");
	window.location.replace("mon-profile-user.php");
	</script>';
	//Header('Location: mon-profile-user.php');
}
 ?>