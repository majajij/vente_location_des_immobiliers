<!--<?php
//require "cnx.php";

?>-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Reservation</title>
</head>
<body>

<a class="word-export" href="javascript:void(0)">Export to Word (.doc)</a>

<div class="word-content">

	<p style="margin-left: 50px;">
		<img src="logo-maf.png" width="200" height="60"><br><br><br>
	</p>
	
<p >
	<h3 style="margin-left: 50px; color:#6495ED; text-decoration: underline; font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;">Information Personelle :</h3>
</p>
	<p style="margin-left: 120px;  color:gray; font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;">
	
	Nom :<br><br>

	Prénom :<br><br>

	Email :<br><br>

	Tel :<br><br>

	ville :<br><br>

	</p>

	<h3 style="margin-left: 50px;  color:#6495ED; text-decoration: underline; font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;">Information Sur l'annonce :</h3>

	<p style="margin-left: 120px;color:gray; font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;">
	Titre :<br><br>

	Type d'ofre :<br><br>

	Type de bien :<br><br>

	Adresse :<br><br>

	Ville :<br><br>

	Surface :<br><br>

	Nombre de chambre :<br><br>

	Prix :<br><br>

	Date d'annonce :<br><br>


	</p>
	<p >
		<center style="color:#02b873; font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;">
			<?php
					date_default_timezone_set('GMT');
					setlocale(LC_TIME,'fr');
					
					$d=date("Y-m-d H:i:s");
					echo '<br>'.gmstrftime ("%A %d %b %Y",strtotime("$d"));
				  ?>
		</center> 
	</p>
</div>

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