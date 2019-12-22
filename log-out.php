<?php
require "cnx.php";
						//hnayaa ghaadiin diir session unset +  session destroy 3aad mn be3d lheader ndiir fiha page Home !
						//header("Location:index.php");	
session_unset();
    session_destroy();
    header("Location:index.php");

?>