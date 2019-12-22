<?php
require "cnx.php";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Reservation</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/colors/main.css" id="colors">
</head>
<body>



<div class="word-content">

	<p style="margin-left: 50px;">
		<img src="images/logo-maf.png" width="200" height="60"><br><br><br>
	</p>
	
<p >
	<h3 style="margin-left: 50px; color:#6495ED; text-decoration: underline; font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;">Information Personelle :</h3>
</p>
	<p style="margin-left: 120px;  color:gray; font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;">
	<?php 
	$id_user=$_GET['id_user'];
		$qry = mysqli_query($success,"select * from utilisateurs where id_utilisateur= $id_user");
			if (!$qry) { 
            echo "Problem with query " . $qry . "<br/>"; 
            echo mysqli_error();
            exit(); 
        }
			while($data = mysqli_fetch_array($qry)) {
echo'	Nom :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:black;">'.$data['nom'].'</span><br><br>

	Prénom :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:black;">'.$data['prenom'].'</span><br><br>

	Email :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:black;">'.$data['email'].'</span><br><br>

	Tel :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:black;">'.$data['tel'].'</span><br><br>

	ville :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:black;">'.$data['ville'].'</span><br><br>';
}
?>
	</p>

	<h3 style="margin-left: 50px;  color:#6495ED; text-decoration: underline; font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;">Information Sur l'annonce :</h3>

	<p style="margin-left: 120px;color:gray; font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;">
	<?php 
	$id=$_GET['id_annonce'];
		$qry1 = mysqli_query($success,"select * from annonces where id_annonce= $id");
			if (!$qry1) { 
            echo "Problem with query " . $qry1 . "<br/>"; 
            echo mysqli_error();
            exit(); 
        }
        while($data2 = mysqli_fetch_array($qry1)) {
echo 'Titre :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:black;">'.$data2['titre'].'</span><br><br>

	Type d\'offre :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:black;">'.$data2['type_offre'].'</span><br><br>

	Type de bien :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:black;">'.$data2['type_bien'].'</span><br><br>

	Adresse :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:black;">'.$data2['adresse'].'</span><br><br>

	Ville :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:black;">'.$data2['ville'].'</span><br><br>

	Surface :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:black;">'.$data2['surface'].'</span><br><br>

	Nombre de chambre :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:black;">'.$data2['nbr_chambre'].'</span><br><br>

	Prix :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:black;">'.$data2['prix'].'</span><br><br>

	Date d\'annonce :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:black;">'.$data2['date_annonce'].'</span><br><br>';
}
?>

	</p>

	<p >
		<center style="color:#02b873; font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;">
			<?php
					date_default_timezone_set('GMT');
					setlocale(LC_TIME,'fr');
					
					$d=date("Y-m-d H:i:s");
					echo '<br>Date d\'aujourd\'huit : '.gmstrftime ("%A %d %b %Y",strtotime("$d"));
				  ?>
		</center> 

	</p>
	
</div>
<a class="word-export" href="javascript:void(0)">Téléchager le fichier word (.doc)</a>
	<br><br>
	<script src="scripts/jquery.min.js"></script>
	<script src="scripts/FileSaver.js"></script>
	<script src="scripts/jquery.wordexport.js"></script>
	<script>
	$('.word-export').click(function(events){
		$('.word-content').wordExport();
	});
	</script>

</body>
</html>