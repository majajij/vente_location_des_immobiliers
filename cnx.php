<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
//session_start();

//mysql_connect("localhost","root","");
//mysql_select_db('immobilier');
$success = mysqli_connect("127.0.0.1","root","","immobilier");

$qry=mysqli_query($success,"select max(id_annonce) as 'annoce_pr' from annonces") or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
		while ($data = mysqli_fetch_array($qry)) {
			$_SESSION['annoce_pr']=$data['annoce_pr'] ;	
			
		}
?>
